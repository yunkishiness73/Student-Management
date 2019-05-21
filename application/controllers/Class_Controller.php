<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Class_Model');
	}

	public function index()
	{
	
		$classes = $this->Class_Model->getClass();
		if($classes != null) {
			$data = array('classes' => $classes);
			$this->load->view('index', $data);
		} else {
			$this->load->view('index');
		}

	}

	public function addClassByAjax() {
		if(isset($_POST['class_id']) && isset($_POST['class_name'])) {
			$insertedStatus = $this->Class_Model->insertClass($_POST['class_id'], $_POST['class_name'], $_SESSION['admin']);
			if($insertedStatus) {
				echo "true";
			} else {
				echo "false";
			}
		}
		
	}

	public function updateClassName() {
		if(isset($_GET['classId']) && isset($_GET['className'])) {
			$updatedStatus = $this->Class_Model->updateClass($_GET['classId'], $_GET['className']);
			if($updatedStatus) {
				redirect(site_url("Class_Controller/index"));
			}
			// echo "<pre>";
			// var_dump("Vao day");
			// echo "</pre>";
		}
	}

}

/* End of file Class_Controller.php */
/* Location: ./application/controllers/Class_Controller.php */