<?php
class loginmodel extends CI_Model
{
	function userlogin($username,$password)
	{
		$where = array
				(
				'email' => $username,
				'password' => md5($password)
				);
				
				
		$this -> db -> select () -> from('user') -> where($where);
		$query = $this -> db -> get();
		return $query -> first_row('array');
	}
	
}
?>