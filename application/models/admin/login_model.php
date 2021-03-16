<?php
defined('BASEPATH') OR exit('No direct scipt access allowes');
/**
 * 
 */
class Login_model extends CI_Model
{

	// get data login
	function getDataLogin( $username ) {
		$where = ['username' => $username];
		return $this->db->get_where( 'profile', $where );
	}

	// information employee
	function getDataEmployeeBy_IdLogin( $id_profile ) {
		$where = ['id_profile' => $id_profile];
		return $this->db->get_where('information_employee', $where);
	}
}
