<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();

	}

	public function getAllGrade() {
		$query = $this->db->query("
			SELECT TOP 1000 [MASV]
			      ,[MAMH]
			      ,[LAN]
			      ,[DIEM]
			      ,[rowguid]
			FROM [QLDSV].[dbo].[DIEM]

		");
		return $query->result_array();
	}

}

/* End of file  */
/* Location: ./application/models/ */