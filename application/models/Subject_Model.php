<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		if(isset($_SESSION["db"])) {
			$this->db = $this->load->database($_SESSION["db"], TRUE);
		}
		
	}

	public function getSubjects() {

		try {

			$query = $this->db->query("SELECT * FROM MONHOC");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get subject: ', $e->getMessage() + '\n';
		}

		return null;
	}

	public function getSubjectById($subject_id) {

		try {

			$query = $this->db->query("SELECT * FROM MONHOC WHERE MAMH='$subject_id'");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get subject: ', $e->getMessage() + '\n';
		}

	}

	
	public function insertSubject($subject_id, $subject_name) {
		try {

			$query = $this->db->query("INSERT INTO MONHOC(MAMH, TENMH) VALUES('$subject_id', '$subject_name') ");
			return true;

		} catch(Exception $e ) {
			echo 'Cannot insert subject: ', $e->getMessage() + '\n';
		}

		return false;
	}

	public function updateSubjectNameById($subject_id, $subject_name) {
		try {

			$query = $this->db->query("UPDATE MONHOC SET TENMH = '$subject_name' WHERE MAMH = '$subject_id' ");
			return true;

		} catch(Exception $e ) {
			echo 'Cannot update subject: ', $e->getMessage() + '\n';
		}

		return false;
	}



}

/* End of file  */
/* Location: ./application/models/ */