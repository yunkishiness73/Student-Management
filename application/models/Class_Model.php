<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Class_Model extends CI_Model {

	public $variable;

	public function __construct(){
		parent::__construct();
		if(isset($_SESSION["db"])) {
			$this->db = $this->load->database($_SESSION["db"], TRUE);
		}
	}

	public function getClass() {

		try {

			$query_1 = $this->db->query("
				SELECT SINHVIENLOP.*, LOP.TENLOP FROM LOP, (SELECT MALOP, COUNT(*) AS SOLUONG FROM SINHVIEN GROUP BY MALOP) AS SINHVIENLOP
				WHERE SINHVIENLOP.MALOP = LOP.MALOP
				");
			$query_2 = $this->db->query("SELECT LOP.*, KHOA.TENKH FROM LOP, KHOA WHERE LOP.MAKH = KHOA.MAKH");

			$query_1 = $query_1->result_array();
			$query_2 = $query_2->result_array();


			if(count($query_2) > 0) {

				for($i = 0; $i < count($query_2); $i++) {
					$check = true;
					for($j = 0; $j < count($query_1); $j++) {
						if($query_2[$i]["MALOP"] == $query_1[$j]["MALOP"]) {

							$check = false;
							$query_2[$i]["SOLUONG"] = $query_1[$j]["SOLUONG"];
							break;
						}
					}

					if($check == true) {
						$query_2[$i]["SOLUONG"] = 0;
					}
				}

				return $query_2;

			} 

		}catch(Exception $e) {
			echo 'Cannot get class: ', $e->getMessage() + '\n'; 
		}

		return null;
	}

	public function getClassName($ClassName) {

		try {

			$query = $this->db->query("SELECT * FROM LOP WHERE TENLOP = '".$ClassName."'");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get class (ClassName): ', $e->getMessage() + '\n'; 
		}

		return null;
	}

	public function deleteClass($ClassID) {

		try {

			$query = $this->db->query("DELETE FROM LOP WHERE MALOP = $ClassID");
			return true;

		} catch(Exception $e) {
			echo 'Cannot delete class: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

	public function updateClass($ClassID, $ClassName) {

		try {

			$query = $this->db->query("UPDATE LOP SET TENLOP = '".$ClassName."' WHERE MALOP = $ClassID");
			return true;

		} catch(Exception $e) {
			echo 'Cannot update class: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

	public function insertClass($ClassID, $ClassName, $Facult) {

		try {
			$tmp = $this->db->query("DECLARE	@return_value int
				EXEC	@return_value = [dbo].[sp_KiemTraLopTonTai]
				@MALOP = N'".$ClassID."'
				SELECT	'RV' = @return_value
				");
			if($tmp->result_array()[0]['RV'] == 0){
				$tmp = $this->db->query("DECLARE	@return_value int
					EXEC	@return_value = [dbo].[sp_KiemTraTenLopTonTai]
					@TENLOP = N'".$ClassName."'
					SELECT	'RV' = @return_value");
				if($tmp->result_array()[0]['RV'] == 0){
					$query = $this->db->query("INSERT INTO LOP(MALOP, TENLOP, MAKH) VALUES ('".$ClassID."', '".$ClassName."', '".$Facult."')");
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}

		} catch(Exception $e) {
			echo 'Cannot insert class: ', $e->getMessage() + '\n'; 
		}

		return false;
	}

	public function getClassByID($ClassID) {

		try {

			$query = $this->db->query("SELECT * FROM LOP WHERE MALOP = '".$ClassID."'");
			return $query->result_array();

		} catch(Exception $e) {
			echo 'Cannot get class (ClassName): ', $e->getMessage() + '\n'; 
		}

		return null;
	}




}
