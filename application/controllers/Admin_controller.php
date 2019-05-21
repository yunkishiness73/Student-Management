<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Subject_Model');
	}

	public function index()
	{
		// $data = $this->Grade->getAllGrade();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die;
		$this->load->view('homepage');

	}


	public function loadSubjectView() {
		
		$subjects = $this->Subject_Model->getSubjects();

		if($subjects != null) {

			$data = array(
				'subject' => $subjects
			);

			$this->load->view('subject_view', $data);

		} else {
			$this->load->view('subject_view');
		}
	}

	public function loadStudentGradeView() {
		$this->load->view('student_grade_view');
	}

	public function loadPrintStudentGradeView() {
		$this->load->view('print_student_grade');
	}

	public function loadPrintFinalGradeView() {
		$this->load->view('print_final_grade');
	}

	public function loadPrintStudentView() {
		$this->load->view('print_student_list');
	}


	public function logIn() {
		$this->load->view('logIn');
	}

	public function logOut() {
		unset($_SESSION['admin']);
		unset($_SESSION['db']);
		unset($_SESSION['MAKH']);
		$this->load->view('login');
	}

	public function checkUserAccount() {

		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$faculty = isset($_POST['faculty']) ? $_POST['faculty'] : '';

		if($username == 'sa' && $password == 'Thaotran17021997') {
			$this->session->set_userdata('admin', $_POST['faculty']);
			if($faculty == 'CNTT') {
				$this->session->set_userdata('db', 'db2');

				// echo "<pre>";
				// var_dump("vao đay 1");
				// var_dump($_SESSION);
				// echo "</pre>";
				// die;
				
			}
			else if($faculty == 'VT') {
				$this->session->set_userdata('db', 'db3');
				// echo "<pre>";
				// var_dump("vao đay 2");
				// var_dump($_SESSION);
				// echo "</pre>";
				// die;
				
			}
			redirect('Admin_controller','refresh');
		} else {
			redirect(site_url('Admin_controller/logIn'),'refresh');
		}

	}

	public function insertSubjectByAjax() {
		
		$subject_id   = isset($_POST['_subject_id']) ? $_POST['_subject_id'] : '';
		$subject_name = isset($_POST['_subject_name']) ? $_POST['_subject_name'] : '';
		
		if($subject_id != '' && $subject_name != '') {
			if($this->Subject_Model->insertSubject($subject_id, $subject_name)) {
				echo 'Insert subject succesfully';
			} else {
				echo 'Insert subject failed';
			}
		}
	}

	public function updateSubjectName() {

		$subject_id   = isset($_POST['_subject_id']) ? $_POST['_subject_id'] : '';
		$subject_name = isset($_POST['_subject_name']) ? $_POST['_subject_name'] : '';
		
		if($subject_id != '' && $subject_name != '') {
			if($this->Subject_Model->updateSubjectNameById($subject_id, $subject_name)) {
				echo 'Update subject succesfully';
			} else {
				echo 'Update subject failed';
			}
		}

		
	}

}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */