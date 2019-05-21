<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mark_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Class_Model');
		$this->load->model('Mark_Model');
		$this->load->model('Student_Model');
		$this->load->model('Subject_Model');
	}

	public function index()
	{
		$classes = $this->Class_Model->getClass();
		$subjects = $this->Subject_Model->getSubjects();
		// getStudentMark($class_id="16050301", $subject_id="501043", $times=1)
		if($classes != null) {
			$students = $this->Student_Model->getStudentsByClass($classes[0]["MALOP"]);
			$data = array(
				'classes' => $classes,
				'subjects' => $subjects,
				'currClassId' => $classes[0]["MALOP"],
				);

			$this->load->view('student_grade_view', $data);
		} else {
			$this->load->view('student_grade_view');
		}

	}

	public function getStudentsMark() {
		if($_GET["class"] && $_GET["subject"] && $_GET["time"]) {

			// $students = $this->Student_Model->getStudentsByClass($_GET["class"]);
			$students = $this->Student_Model->getStudentMark($_GET["class"], $_GET["subject"], $_GET["time"]);
			$subjects = $this->Subject_Model->getSubjects();
			$classes = $this->Class_Model->getClass();
			$isCompleted = $this->Student_Model->checkIfComplete($_GET["class"], $_GET["subject"], $times=1);

			// echo "<pre>";
			// var_dump($isCompleted);
			// var_dump($students == null);
			// echo "</pre>";


			if($students != null) {

				if($_GET["time"] == 1 || ($isCompleted == true && $_GET["time"] == 2))  {
					$data = array(
					'classes' => $classes,
					'subjects' => $subjects,
					'currClassId' => $_GET["class"],
					'currentSuject' => $_GET["subject"],
					'currentTime' => $_GET["time"],
					'students' => 	$students
					);
					$this->load->view('student_grade_view', $data);
				} else {
					$data = array(
					'classes' => $classes,
					'subjects' => $subjects,
					'currClassId' => $_GET["class"],
					'currentSuject' => $_GET["subject"],
					'currentTime' => $_GET["time"],
					);
					$this->load->view('student_grade_view', $data);
				}
				
			} else {

				$data = array(
					'classes' => $classes,
					'subjects' => $subjects,
					'currClassId' => $_GET["class"],
					'currentSuject' => $_GET["subject"],
					'currentTime' => $_GET["time"],
					);
				// echo "<pre>";
				// var_dump($data);
				// echo "</pre>";
				// die;
				$this->load->view('student_grade_view', $data);
			}

		}


	}

	public function insertStudentsMarkByAjax() {
		if(isset($_POST["studentsId"]) && isset($_POST["studentMarks"]) && isset($_POST["subjectId"]) && isset($_POST["times"])) {
			$insertedStatus = $this->Mark_Model->insertStudentMark($_POST["studentsId"], $_POST["subjectId"], $_POST["times"], $_POST["studentMarks"]);
			if($insertedStatus) {
				echo 'true';
			} else {
				echo 'false';
			}
		}
		
	}

}

/* End of file Mark_Controller.php */
/* Location: ./application/controllers/Mark_Controller.php */