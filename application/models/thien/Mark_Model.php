<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Mark_Model extends CI_Model {

	public $variable;

	public function __construct(){
		parent::__construct();
	}

	public function getMarkInfor($StudentID, $Times) {

		try {

			$query = $this->db->query("SELECT * FROM SINHVIEN, LOP, MONHOC, DIEM WHERE SINHVIEN.MALOP = LOP.MALOP AND SINHVIEN.MASV = $StudentID AND DIEM.MASV = SINHVIEN.MASV AND DIEM.LAN = $Times AND MONHOC.MAMH = DIEM.MAMH");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get mark(StudentID, Times): ', $e->getMessage() + '\n'; 
		}

		return null;
	}

	// public function getMarkClass($ClassID) {

	// 	try {

	// 		$query = $this->db->query("SELECT * FROM LOP WHERE TENLOP = $ClassName");
	// 		return $query->result_array();

	// 	} catch(Exception $e) {
	// 		echo 'Cannot get class (ClassID): ', $e->getMessage() + '\n'; 
	// 	}

	// 	return null;
	// }

	public function getMarkSubject($SubjectID, $ClassID) {

		try {

			$query = $this->db->query("SELECT * FROM SINHVIEN, MONHOC, LOP, DIEM WHERE MONHOC.MAMH = '".$SubjectID."' AND LOP.MALOP = $ClassID AND SINHVIEN.MALOP = LOP.MALOP AND DIEM.MASV = SINHVIEN.MASV AND MONHOC.MAMH = DIEM.MAMH");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get class (SubjectID, ClassID): ', $e->getMessage() + '\n'; 
		}

		return null;
	}

}
