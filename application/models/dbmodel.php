<?php

class Dbmodel extends CI_Model 
{
	
	public function __construct(){}
	
	function execute($qry)
	{	
		$result = $this->db->query($qry);
		return $result;
	}
	
	function insert($table,$params)
	{
		$query = array();
		foreach($params as $key => $value)
		{
			if($value=="NOW()")
				$query[] = "`".$key."`=".$value;
			else
				$query[] = "`".$key."`=".$this->db->escape($value);
		}
		
		$query = implode(",",$query);
		$query = "INSERT INTO `".$table."` set ".$query;
		$this->db->query($query);
		return $this->db->insert_id();		
	}
	
	function get($table,$filter,$type = "array",$limit = 1,$select = '*')
	{
		if(trim($limit) == "")
		$result = $this->db->query("select $select from `$table` $filter ");
		else
		$result = $this->db->query("select $select from `$table` $filter limit $limit");
		if($result->num_rows() > 0) {
			if($type == "array")
				return $result->row_array();
			else {
			
				$result = $result->result();
				if($limit == 1)
					return $result[0];
				return $result;
			}
		}
		else {
			return 0;	
		}
	}

	function getpaging($table,$filter,$from,$records,$type = "array",$select = '*')
	{

		$result = $this->db->query("select $select from `$table` $filter limit $from,$records");
		if($result->num_rows() > 0) {			
			$result = $result->result();
			return $result;

		}
		else {
			return 0;	
		}
	}
	
	function getSortedQuery($query,$key,$value)
	{
		$result = $this->db->query($query);
	
	   $rows = array();
	
		if ($result->num_rows() > 0)
		{
		   foreach ($result->result_array() as $row)
		   {
			   $rows[$row[$key]] = $row[$value];
		   }
		}
			   
		return (count($rows)>0)?$rows:false;
	}
	
	function update($table,$params,$where)
	{
		$query = "";
		foreach($params as $k => $v)
		{
			if($v=="NOW()")
				$query[] = "`".$k."`=".$v;
			else
				$query[] = "`".$k."`=".$this->db->escape($v);
		}
		
		$query = "UPDATE `".$table."` set ".implode(",",$query)." WHERE $where";
		$this->db->query($query);
	}
	
	function getRows($query,$type = "array")
	{
		$rows = array();
		
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
		
			if($type == "array")
				$dataSet = $result->result_array();
			else
				$dataSet = $result->result();
			
			foreach ($dataSet as $row) {
			   $rows[] = $row;
		  	}	
		}
			   
		if(count($rows)>0)
			return $rows;
		return false;
	}
	
	
	
}

?>
