<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$d = array(
			'name' => 'thiện',
			'age' => 21

		);

		$sv = array(
			'mssv' => '51603170'
		);

		$mang = [
			'data' => $d,
			'sinhvien' => $sv

		];

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die;
		$this->load->view('index', $mang);
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */