<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		if(isset($_SESSION["db"])) {
			$this->db = $this->load->database($_SESSION["db"], TRUE);
		}
		
	}

	public function getStudentIdByClass($class_id) {
		try {
			$query = $this->db->query("
				SELECT MASV FROM SINHVIEN WHERE MALOP = '$class_id'
				");
			return $query->result_array();
		} catch(Exception $e) {
			echo 'Cannot get students: ', $e->getMessage() + '\n';
		}
		
		return null;
	}

	public function getStudentsByClass($class_id) {
		
		try {
			$query = $this->db->query("
				SELECT * FROM SINHVIEN WHERE MALOP = '$class_id'
				");
			return $query->result_array();
		} catch(Exception $e) {
			echo 'Cannot get students: ', $e->getMessage() + '\n';
		}
		
		return null;
	}

	public function getStudentMark($class_id="16050301", $subject_id="501043", $times=1) {
		
		try {

			$query_1 = $this->db->query("
				SELECT SV.MASV, SV.HO, SV.TEN, DIEM.DIEM FROM SINHVIEN SV, MONHOC MH, LOP, DIEM
				WHERE MH.MAMH = DIEM.MAMH
				AND SV.MALOP = LOP.MALOP
				AND SV.MASV = DIEM.MASV
				AND LOP.MALOP = '$class_id'
				AND DIEM.LAN = '$times'
				AND MH.MAMH = '$subject_id'
				")->result_array();

			$query_2 = $this->getStudentsByClass($class_id);

			if(count($query_2) > 0) {
				$isCompleted = true;

				for($i = 0; $i < count($query_2); $i++) {
					$flag = true;
					for($j = 0; $j < count($query_1); $j++) {
						if($query_2[$i]["MASV"] == $query_1[$j]["MASV"]) {
							$flag = false;
							break;
						}
					}
					if($flag) {
						$studentsMark["MASV"] = $query_2[$i]["MASV"];
						$studentsMark["HO"] = $query_2[$i]["HO"];
						$studentsMark["TEN"] = $query_2[$i]["TEN"];
						$studentsMark["DIEM"] = '';
						$isCompleted = false;
						// if(!isset($studentsMark["COMPLETED"]))
						// 	$studentsMark["COMPLETED"] = FALSE;
						// else 
						// 	$studentsMark["COMPLETED"] = TRUE;
						// if(!isset($query_1["COMPLETED"])) {
						// 	$query_1["COMPLETED"] = FALSE;
						// }

						array_push($query_1, $studentsMark);
					}
				}

				// $query_1["COMPLETED"] = $isCompleted;

			}

			return $query_1;

		} catch(Exception $e) {
			echo 'Cannot get students: ', $e->getMessage() + '\n';
		}
		
		return null;
	}

	public function checkIfComplete($class_id="16050301", $subject_id="501043", $times=1) {
		try {

			$query_1 = $this->db->query("
				SELECT SV.MASV, SV.HO, SV.TEN, DIEM.DIEM FROM SINHVIEN SV, MONHOC MH, LOP, DIEM
				WHERE MH.MAMH = DIEM.MAMH
				AND SV.MALOP = LOP.MALOP
				AND SV.MASV = DIEM.MASV
				AND LOP.MALOP = '$class_id'
				AND DIEM.LAN = '$times'
				AND MH.MAMH = '$subject_id'
				")->result_array();

			$query_2 = $this->getStudentsByClass($class_id);

			if(count($query_2) > 0) {
	
				for($i = 0; $i < count($query_2); $i++) {
					$flag = true;
					for($j = 0; $j < count($query_1); $j++) {
						if($query_2[$i]["MASV"] == $query_1[$j]["MASV"]) {
							$flag = false;
							break;
						}
					}
					if($flag) {
						return false;
					}
				}

			} else {
				return false;
			}

		} catch(Exception $e) {
			echo 'Cannot get students: ', $e->getMessage() + '\n';
		}
		
		return true;
	}

	public function deleteStudent($StudentID) {

		try {

			$query = $this->db->query("DELETE FROM SINHVIEN WHERE MASV = $StudentID");
			return true;

		} catch(Exception $e) {
			echo 'Cannot delete student: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

	public function updateStudent($StudentID, $FirstName, $LastName, $Sex, $Birthday, $BirthAddress, $HomeAddress, $Status) {

		try {

			$query = $this->db->query("UPDATE SINHVIEN SET HO = '".$FirstName."', TEN = '".$LastName."', PHAI = $Sex, NGAYSINH = '".$Birthday."', NOISINH = '".$BirthAddress."', DIACHI = '".$HomeAddress."', NGHIHOC = $Status WHERE MASV = $StudentID");
			return true;

		} catch(Exception $e) {
			echo 'Cannot update student: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

	public function insertStudent($StudentID, $FirstName, $LastName, $ClassID, $Sex, $Birthday, $BirthAddress, $HomeAddress) {

		try {
			$tmp = $this->db->query("DECLARE	@return_value int
				EXEC	@return_value = [dbo].[PROC_KiemTraSinhVienDaTonTai]
				@MSSV = N'".$StudentID."'
				SELECT	'RV' = @return_value
				");
			if($tmp->result_array()[0]['RV'] == 0){
				$query = $this->db->query("INSERT INTO SINHVIEN(MASV, HO, TEN , MALOP, PHAI, NGAYSINH, NOISINH, DIACHI, NGHIHOC) VALUES ($StudentID, '".$FirstName."', '".$LastName."', $ClassID, $Sex, '".$Birthday."', '".$BirthAddress."', '".$HomeAddress."', 0)");
				return true;
			}

			return false;

		} catch(Exception $e) {
			echo 'Cannot insert student: ', $e->getMessage() + '\n'; 
		}
		return false;
	}

	public function getStudentClass($ClassID) {

		try {

			$query = $this->db->query("SELECT * FROM SINHVIEN WHERE MALOP =  '".$ClassID."'");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot delete student: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

}

/* End of file Student_Model.php */
/* Location: ./application/models/Student_Model.php */