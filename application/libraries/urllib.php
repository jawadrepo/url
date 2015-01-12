<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UrlLib {
	
	public function __construct() {
		 $this->ci = get_instance();
		 $this->ci->load->model('dbmodel');
	}
	
	public function saveurl($url){
		$uid = uniqid();
		$this->ci->dbmodel->insert("urlmap",array('unique'=>$uid,'url'=>$url));
		return $uid; 
	}
	
	public function get(){
		$result = $this->ci->dbmodel->get("urlmap","","object",'');
		return $result; 
	}
	
	public function getone($key){
		$result = $this->ci->dbmodel->get("urlmap","where `unique`='".$key."'","array",1);
		return $result;
	}
	
	public function remove($key){
		$this->ci->dbmodel->execute("DELETE FROM urlmap WHERE `unique`='".$key."'");
	}
	
	
}
?>