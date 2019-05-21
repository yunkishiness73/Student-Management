<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mark_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		if(isset($_SESSION["db"])) {
			$this->db = $this->load->database($_SESSION["db"], TRUE);
		}
		
	}

	public function insertStudentMark($student_id, $subject_id, $times, $mark) {

		$studentsMark = [];
		$temp = [];

		try {
			for($i = 0; $i < count($student_id); $i++) {
				$this->db->query("DELETE FROM DIEM WHERE MASV='$student_id[$i]' AND MAMH = '$subject_id' AND LAN = '$times'");
				$temp = array(
					'MASV' => $student_id[$i],
					'MAMH' => $subject_id,
					'LAN' => $times,
					'DIEM' => $mark[$i],
				);
				array_push($studentsMark, $temp);
			}

			return $this->db->insert_batch("DIEM", $studentsMark);

		} catch(Exception $e) {
			echo 'Cannot insert mark: ', $e->getMessage() + '\n';
		}
		
		return false;
	}

	public function updateStudentMark($student_id, $subject_id, $times, $mark) {
		
		try {
			$query = $this->db->query("
				UPDATE DIEM SET DIEM = '$mark' WHERE MASV = '$student_id' AND MAMH = '$subject_id' AND LAN = '$times'
				");
			return true;
		} catch(Exception $e) {
			echo 'Cannot update mark: ', $e->getMessage() + '\n';
		}
		
		return false;
	}


	public function transcript($student_id, $class_id) {
		try {
			$query = $this->db->query("
				SELECT SV.MASV, SV.HO, SV.TEN, SV.MALOP, LOP.TENLOP, KHOA.MAKH, KHOA.TENKH, MH.TENMH, DIEM.DIEM FROM KHOA, MONHOC MH, (SELECT MASV, MAMH, MAX(DIEM) AS DIEM FROM DIEM GROUP BY MAMH, MASV) AS DIEM, SINHVIEN SV, LOP 
				WHERE LOP.MAKH = KHOA.MAKH
				AND DIEM.MAMH = MH.MAMH
				AND SV.MASV = DIEM.MASV
				AND SV.MASV = '$student_id'
				AND LOP.MALOP = '$class_id'
				");
			return $query->result_array();
		} catch(Exception $e) {
			echo 'Cannot get students: ', $e->getMessage() + '\n';
		}
		
		return null;
	}

}

/* End of file Mark_Model.php */
/* Location: ./application/models/Mark_Model.php */