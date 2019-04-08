<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}


	public function loadStudentView() {
		$this->load->view('student_view');
	}

	public function loadSubjectView() {
		$this->load->view('subject_view');
	}

	public function loadStudentGradeView() {
		$this->load->view('student_grade_view');
	}








	public function logIn() {
		$this->load->view('logIn');
	}

	public function logOut() {
		unset($_SESSION['admin']);
		unset($_SESSION['permission']);
		$this->load->view('login');
	}

	public function checkUserAccount() {

		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';


		if($username == 'admin' && $password == 'admin') {
			$this->session->set_userdata('admin', $username);
			redirect('Admin_controller','refresh');
		} else {
			redirect(site_url('Admin_controller/logIn'),'refresh');
		}

	}

}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */