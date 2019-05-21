<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Student_Model extends CI_Model {

	public $variable;

	public function __construct(){
		parent::__construct();
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

	public function getStudentClassTop1() {

		try {

			$query = $this->db->query("SELECT * FROM SINHVIEN WHERE SINHVIEN.MALOP = (SELECT TOP 1 MALOP FROM LOP) ");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot delete student: ', $e->getMessage() + '\n'; 
		}

		return false;
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
									EXEC	@return_value = [dbo].[sp_KiemTraSinhVienTonTai]
										@MASV = N'".$ClassID."'
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

}
