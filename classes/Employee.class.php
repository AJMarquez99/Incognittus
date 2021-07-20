<?php
require_once('../../public_html/defaults/connecter_db.php');
class Employee {

	//Send Username and Password
	function getEmployee( $username, $password ){
		$user_data = $conn->query("SELECT f_name, l_name, eid FROM employees WHERE u_name LIKE '$username' AND p_key = '$password'");
		return array();
	}
}
?>
