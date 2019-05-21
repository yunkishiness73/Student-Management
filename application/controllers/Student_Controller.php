<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require 'W2Ex/PHPExcel.php';
class Student_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_Model');
		$this->load->model('Mark_Model');
		$this->load->model('Class_Model');

	}

	public function index()
	{

		$classes = $this->Class_Model->getClass();
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($classes[0]["MALOP"]);
			$data = array(
				'classes' => $classes,
				'students' => $students,
				'currClassId' => $classes[0]["MALOP"],
				);

			$this->load->view('student_view', $data);
		} else {
			$this->load->view('student_view');

		}

	}

	public function filterByClassId($class_id) {
		$classes = $this->Class_Model->getClass();
		$currClassId = $class_id;
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($class_id);
			$data = array(
				'classes' => $classes,
				'students' => $students,
				'currClassId' => $currClassId
				);

			$this->load->view('student_view', $data);
		} else {
			$this->load->view('student_view');
		}
	}

	public function insetStudentByAjax(){

		$studentInfo = $this->input->post('studentInfo');
		$insertedStatus = $this->Student_Model->insertStudent($studentInfo[0], $studentInfo[1], $studentInfo[2], $studentInfo[3], $studentInfo[4], $studentInfo[5], $studentInfo[6], $studentInfo[7]);
		if($insertedStatus) {
			echo 'true';
			die;
		}

		echo 'false';
	}

	public function updateStudentByAjax() {
		$studentInfo = $this->input->post('studentInfo');
		if($this->Student_Model->updateStudent($studentInfo[0], $studentInfo[1], $studentInfo[2], $studentInfo[3], $studentInfo[4], $studentInfo[5], $studentInfo[6], $studentInfo[7], $studentInfo[8])) {
			echo 'true';
			die;
		}
		echo 'true';
	}

	public function loadPrintStudentView() {
		$classes = $this->Class_Model->getClass();
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($classes[0]["MALOP"]);
			if($students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $classes[0]["MALOP"]
					);
			} else {
				$data = array(
					'classes' => $classes,
					'currClassId' => $classes[0]["MALOP"]
					);
			}
			

			$this->load->view('print_student_list', $data);
		} else {
			$this->load->view('print_student_list');
		}
	}

	public function filterByClassIdStudent($class_id) {
		$classes = $this->Class_Model->getClass();
		$currClassId = $class_id;
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($class_id);
			if($students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $class_id
					);
				$this->load->view('print_student_list', $data);
			// 	echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			// die;
			} else {
				$data = array(
					'classes' => $classes,
					'currClassId' => $class_id
					);
				$this->load->view('print_student_list', $data);
			// 	echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			}

			// echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			// die;

			


		} else {
			$this->load->view('print_student_list');
		}
	}

	public function printListStudent($ClassID)
	{
		if(isset($ClassID)) {

			$this->load->model('Class_Model');
			$data['query1'] = $this->Class_Model->getClassByID($ClassID);

			$this->load->model('Student_Model');
			$data['query3'] = $this->Student_Model->getStudentClass($ClassID);

			$inf = array(
				0 => 'Khoa: '.$_SESSION['admin'], 
				1 => 'Lớp: '.$data['query1'][0]['TENLOP'], 
				2 => 'Mã Lớp :'.$data['query1'][0]['MALOP'] 
				);
			$title = array(
				0 => 'STT',
				1 => 'MSSV', 
				2 => 'Ho', 
				3 => 'Tên', 
				4 => 'Giới tính', 
				5 => 'Ngày sinh', 
				6 => 'Nơi sinh', 
				7 => 'Địa chỉ', 
				);
			$dt = array();

			for($i = 0; $i < count($data['query3']); $i++){
				$dttmp = array(
					0 => $i+1,
					1 => $data['query3'][$i]['MASV'],
					2 => $data['query3'][$i]['HO'],
					3 => $data['query3'][$i]['TEN'],
					4 => $data['query3'][$i]['PHAI'] == '1' ? 'Nam' : 'Nữ',
					5 => $data['query3'][$i]['NGAYSINH'],
					6 => $data['query3'][$i]['NOISINH'],
					7 => $data['query3'][$i]['DIACHI'],
					);
				array_push($dt, $dttmp);
			}

			$inforExecl = array(
				'inf' => $inf,
				'title' => $title,
				'data' => $dt 
				);

			$_SESSION['data'] = $inforExecl;

			$this->write2Excel();

		}else{
			redirect(base_url().'Student_Controller/loadPrintStudentView','refresh');
		}
		
	}

	public function write2Excel(){

		if(isset($_SESSION['data'])){
			$data = $_SESSION['data'];
			//Khởi tạo đối tượng
			$excel = new PHPExcel();
			//Chọn trang cần ghi (là số từ 0->n)
			$excel->setActiveSheetIndex(0);
			//Tạo tiêu đề cho trang. (có thể không cần)
			
			//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
			$alphaArr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
			$numCol = count($data['title']);

			for($i = 0; $i < $numCol; $i++){
				if($i <= 25){
					$excel->getActiveSheet()->getColumnDimension($alphaArr[$i])->setWidth(10);
				}else{
					// $excel->getActiveSheet()->getColumnDimension($alphaArr[($i/26)-1]+$alphaArr[($i%26)])->setWidth(10);
				}
			}

			for($i = 1; $i <= count($data['inf']); $i++){

				$excel->getActiveSheet()->mergeCells($alphaArr[0].$i.':'.$alphaArr[$numCol-1].$i);
				$excel->getActiveSheet()->getStyle($alphaArr[0].$i)->getFont()->setBold(true);
				$excel->getActiveSheet()->setCellValue($alphaArr[0].$i, $data['inf'][$i-1]);
			}
			

			//Xét in đậm cho khoảng cột
			$excel->getActiveSheet()->getStyle($alphaArr[0].(count($data['inf'])+1).':'.$alphaArr[$numCol-1].(count($data['inf'])+1))->getFont()->setBold(true);
			//Tạo tiêu đề cho từng cột
			//Vị trí có dạng như sau:
			/**
			 * |A1|B1|C1|..|n1|
			 * |A2|B2|C2|..|n1|
			 * |..|..|..|..|..|
			 * |An|Bn|Cn|..|nn|
			 */
			for($i = 0; $i < $numCol; $i++){
				if($i <= 25){
					$excel->getActiveSheet()->setCellValue($alphaArr[$i].(count($data['inf'])+1) , $data['title'][$i]);
				}else{
					// $excel->getActiveSheet()->getColumnDimension($alphaArr[($i/26)-1]+$alphaArr[($i%26)])->setWidth(10);
				}
			}
			// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
			// dòng bắt đầu = 2
			$numRow = count($data['inf'])+2;
			for($j = 0; $j < count($data['data']); $j++) {

				for($i = 0; $i < $numCol; $i++){
					if($i <= 25){
						$excel->getActiveSheet()->setCellValue($alphaArr[$i] . $numRow, $data['data'][$j][$i]);
					}else{
						// $excel->getActiveSheet()->getColumnDimension($alphaArr[($i/26)-1]+$alphaArr[($i%26)])->setWidth(10);
					}
				}
				$numRow++;
			}
			// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
			// ở đây mình lưu file dưới dạng excel2007
			// $_SESSION['tenfile'] = (date('d_m_Y_H_m'));
			// PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save((date('d_m_Y_H_m')).'.xlsx');
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.date('d_m_Y_H_m').'.xls"');
			PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
			sleep(3);
			unset($_SESSION['data']);
		}

	}

	public function printStudentMark($StudentID, $ClassID) {

		if(isset($StudentID) && isset($ClassID)) {

			$data['query'] = $this->Mark_Model->transcript($StudentID, $ClassID);

			if($data['query'] != null) {
				$inf = array(
					0 => 'Khoa: '.$data['query'][0]["MAKH"], 
					1 => 'Lớp: '.$data['query'][0]['TENLOP'], 
					2 => 'Mã Lớp: '.$data['query'][0]['MALOP'], 
					3 => 'Họ và Tên: '.$data['query'][0]['HO']." ".$data['query'][0]['TEN'] , 
					4 => 'Mã Số Sinh Siên: '.$data['query'][0]['MASV'], 
					);
				$title = array(
					0 => 'STT', 
					1 => 'Môn Học', 
					2 => 'Điểm', 
					);
				$dt = array();

				for($i = 0; $i < count($data['query']); $i++){
					$dttmp = array(
						0 => $i + 1,
						1 => $data['query'][$i]['TENMH'],
						2 => $data['query'][$i]['DIEM'],
						);
					array_push($dt, $dttmp);
				}

				$inforExecl = array(
					'inf' => $inf,
					'title' => $title,
					'data' => $dt 
					);

			// var_dump($inforExecl);

				$_SESSION['data'] = $inforExecl;
				$this->write2Excel();
			}

			

		}else{
			redirect(base_url().'Student_Controller/loadPrintStudentGradeView','refresh');

		}
	}


	public function loadPrintStudentGradeView() {
		$classes = $this->Class_Model->getClass();
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($classes[0]["MALOP"]);
			$studentId = $this->Student_Model->getStudentIdByClass($classes[0]["MALOP"]);
			if($students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $classes[0]["MALOP"],
					'studentId' => $studentId
					);
			} else {
				$data = array(
					'classes' => $classes,
					'currClassId' => $classes[0]["MALOP"],
					);
			}
			

			$this->load->view('print_student_grade', $data);
		} else {
			$this->load->view('print_student_grade');
		}
	}

	public function filterByClassIdStudentGrade($class_id) {
		$classes = $this->Class_Model->getClass();
		$currClassId = $class_id;
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($class_id);
			$studentId = $this->Student_Model->getStudentIdByClass($class_id);
			if($students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $class_id,
					'studentId' => $studentId
					);
			} else {
				$data = array(
					'classes' => $classes,
					'currClassId' => $class_id,
					);
			}

			$this->load->view('print_student_grade', $data);
		} else {
			$this->load->view('print_student_grade');
		}
	}

	public function studentTranscript($StudentID, $ClassID) {
		$transcript = $this->Mark_Model->transcript($StudentID, $ClassID);
		$classes = $this->Class_Model->getClass();
		$students = $this->Student_Model->getStudentsByClass($ClassID);
		$studentId = $this->Student_Model->getStudentIdByClass($ClassID);
		
		if($transcript != null) {
			if($studentId != null && $students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $ClassID,
					'transcript' => $transcript,
					'studentId' => $studentId
					);
			} else {
				$data = array(
					'classes' => $classes,
					'currClassId' => $ClassID,
					'transcript' => $transcript
					);
			}

			$this->load->view('print_student_grade', $data);
		} else {

			if($studentId != null && $students != null) {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $ClassID,
					'studentId' => $studentId
					);
			} else {
				$data = array(
					'classes' => $classes,
					'students' => $students,
					'currClassId' => $ClassID
					);
			}

			$this->load->view('print_student_grade',$data);
		}



	}


}

/* End of file Student_Controller */
/* Location: ./application/controllers/Student_Controller */