<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'tfpdf/tfpdf.php';

class quanly_karaoke extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	public function index()
	{
		// $this->checkUserPermission();
		// echo "<pre>";
		// var_dump($_SESSION);
		// echo "</pre>";
		// die;
		$room = $this->main_model->getAllRoom();
		$typeRoom = $this->main_model->getTableFromDB('loaiphong');

		$room = array(
			'room' => $room,
			'typeRoom' => $typeRoom
			);

		$this->load->view('index', $room);
	}

	public function getAllRoomByAjax() {

		$room = $this->main_model->getAllRoom();
		echo json_encode($room);
	}

	
	public function viewDetail($maphong)
	{

		$this->checkUserPermission();
		$room = $this->main_model->getRoomStatus($maphong);

		// echo "<pre>";
		// var_dump($room);
		// echo "</pre>";

		if($room[0]['trangthai'] == 1) {

			$menu = $this->main_model->getTableFromDB('thucdon');
			$mahoadon = $this->main_model->getBillIdByRoomId($maphong);
			$details = $this->main_model->getBillInfoByBillId($mahoadon);
			$roomDetails = $this->main_model->getRoomNameById($maphong);
			$billDetails = $this->main_model->getBillDetailsByBillId($mahoadon);

			$menu = array(
				'menu' => $menu,
				'maphong' => $maphong,
				'details' => $details,
				'roomDetails' => $roomDetails,
				'billDetails' => $billDetails,
			);

			// echo "<pre>";
			// var_dump($menu);
			// echo "</pre>";
			// die;


			$this->load->view('thongtinphonghat', $menu);
			
		} else if(count($room) == 0 || $room[0]['trangthai'] == 0){

			redirect(site_url('quanly_karaoke'),'refresh');
		}
		
	}

	public function addDish($maphong, $mathucdon) {

		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);
		echo $this->main_model->insertBillInfo($mahoadon, $mathucdon);

	}

	public function checkIn($maphong) {
		$this->checkUserPermission();
		if($this->main_model->orderRoom($maphong))
			redirect(site_url('quanly_karaoke/viewDetail/') . $maphong,'refresh');
		else
			echo 'đặt phòng thất bại';

	}

	public function addDishByAjax() {

		$mathucdon = $this->input->post('mathucdon');
		$soluong = $this->input->post('count');
		$maphong = $this->input->post('maphong');
		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);

		$exist = $this->main_model->checkExistDupBillDetail($mahoadon, $mathucdon);

		if(count($exist) == 0) {

			$result = $this->main_model->insertBillInfo($mahoadon, $mathucdon, $soluong);
			echo $result;
			return 1;

		} else 
			echo 0;
			return 0;
			
	}

	public function editCountDish() {

		$mathucdon = $this->input->post('mathucdon');
		$soluong = $this->input->post('soluong');
		$maphong = $this->input->post('maphong');

		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);
		echo $this->main_model->editCountDishByBillId($mahoadon, $mathucdon, $soluong);


		// echo "<pre>";
		// var_dump($mathucdon);
		// var_dump($soluong);
		// var_dump($maphong);
		// echo "</pre>";

	}


	public function removeDish() {

		$maphong =  $this->input->post('maphong');
		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);

		$mathucdon = $this->input->post('mathucdon');

		if($this->main_model->removeDishById($mahoadon, $mathucdon))
			echo "xóa thực đơn thành công";
		else
			echo "xóa thất bại";
	}

	public function servicePrice() {

		$maphong = $this->input->post('maphong');
		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);
		$dongia = $this->main_model->getServicePrice($mahoadon);
		echo number_format($dongia);
	}

	public function getCurrentTime() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		return date('Y-m-d H:i');
	}

	public function logOut() {
		unset($_SESSION['admin']);
		unset($_SESSION['permission']);
		$this->load->view('login');
	}

	public function checkOut($maphong) {

		$totalPrice = 0;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$checkout = date('Y-m-d H:i:s');


		$surcharge = intval($this->input->post('surcharge'));
		

		$mahoadon = $this->main_model->getBillIdByRoomId($maphong);
		$details = $this->main_model->getBillInfoByBillId($mahoadon);
		$roomDetails = $this->main_model->getRoomNameById($maphong);
		$billDetails = $this->main_model->getBillDetailsByBillId($mahoadon);
		$checkin = $billDetails[0]['checkin'];
		$roomFee = round(abs(strtotime($checkout) - strtotime($checkin))/3600 * $roomDetails[0]['giatien']);
		$dongia = $this->main_model->getServicePrice($mahoadon);
		$totalPrice = $dongia + $roomFee + $surcharge;
		$thoigian = gmdate("H:i", round(abs(strtotime($checkout) - strtotime($checkin))));

		// $totalPrice = number_format($totalPrice);

		$data = array(
			'giovao' => $checkin,
			'giora' => $checkout,
			'tenphong' => $roomDetails[0]['tenphong'],
			'giatien' => $roomDetails[0]['giatien'],
			'tongtien' => $totalPrice,
			'tongtiengio' => $roomFee,
			'chitiet' => $details,
			'thoigian' => $thoigian,
			'tongdichvu' => $dongia,
			'mahoadon' => $mahoadon,
			'maphong' => $maphong,
			'phuthu' => $surcharge
			
		);

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";

		// die();

		$this->session->set_userdata('checkout', $data);



		echo json_encode($data);
	}

	

	public function printBill() {

		$data = $_SESSION['checkout'];

		$tienkhachdua = $this->input->post('tien_khach_dua');

		if($data['giovao'] != null) {

			// $this->load->view('report', $data);
			$ngay = date('d/m/Y', strtotime($data['giora']));
			$giovao = date('H:i', strtotime($data['giovao']));
			$giora = date('H:i', strtotime($data['giora']));

			$pdf = new tFPDF();
			$pdf->AddPage('P','A5');

			$pdf->AddFont('DejaVu','','DejaVuSerif.ttf',true);

			$pdf->SetFont('DejaVu','',23);

			$pdf->Cell(128,10,'Karaoke IDOL', 0, 1, 'C');
			$pdf->SetFont('DejaVu','',18);

			$pdf->Cell(128,10,'HÓA ĐƠN TÍNH TIỀN', 0, 1, 'C');

			$pdf->SetFont('DejaVu','',12);
			$pdf->Cell(32,10,'Ngày:', 0, 0, 'L');
			$pdf->Cell(32,10,$ngay, 0, 0, 'L');
			$pdf->Cell(32,10,'Phòng:', 0, 0, 'L');
			$pdf->Cell(32,10,$data['tenphong'], 0, 1, 'L');

			$pdf->SetFont('DejaVu','',12);
			$pdf->Cell(64,5,'Giờ vào:', 0, 0, 'L');
			$pdf->Cell(64,5,$giovao, 0, 1, 'L');
			$pdf->Cell(64,5,'Giờ ra:', 0, 0, 'L');
			$pdf->Cell(64,5,$giora, 0, 1, 'L');
			$pdf->Cell(64,7,'Số giờ hát:', 0, 0, 'L');
			$pdf->Cell(64,7,$data['thoigian'], 0, 1, 'L');

			$pdf->Cell(30,5,'Tên', 0, 0, 'C');
			$pdf->Cell(30,5,'Số lượng', 0, 0, 'C');
			$pdf->Cell(30,5,'Giá', 0, 0, 'C');
			$pdf->Cell(30,5,'Tổng', 0, 1, 'C');

			$pdf->Cell(128,5,'------------------------------------------------------------------------------------', 0, 1, 'L');

			$chitiet = $data['chitiet'];

			for($i = 0; $i < count($chitiet); $i++) {
				$pdf->Cell(30,7,$chitiet[$i]['tenmonan'], 0, 0, 'C');
				$pdf->Cell(30,7,$chitiet[$i]['soluong'], 0, 0, 'C');
				$pdf->Cell(30,7,$chitiet[$i]['giatien'], 0, 0, 'C');
				$pdf->Cell(30,7,$chitiet[$i]['dongia'], 0, 1, 'C');
			}
			
			$pdf->Cell(128,5,'------------------------------------------------------------------------------------', 0, 1, 'L');

			$pdf->Cell(64,7,'Phụ thu:', 0, 0, 'L');
			$pdf->Cell(64,7,number_format($data['phuthu']), 0, 1, 'L');	

			$pdf->Cell(64,7,'Tổng dịch vụ:', 0, 0, 'L');
			$pdf->Cell(64,7,number_format($data['tongdichvu']), 0, 1, 'L');

			$pdf->Cell(64,7,'Tổng tiền giờ:', 0, 0, 'L');
			$pdf->Cell(64,7,number_format($data['tongtiengio']), 0, 1, 'L');

			$pdf->SetFont('DejaVu','',16);
			$pdf->Cell(64,10,'Tổng hóa đơn:', 0, 0, 'L');
			$pdf->Cell(64,10,number_format($data['tongtien']), 0, 1, 'L');

			$pdf->Cell(128,5,'------------------------------------------------------------------------------------', 0, 1, 'L');

			$pdf->SetFont('DejaVu','',12);
			$pdf->Cell(64,5,'Tiền khách đưa:', 0, 0, 'L');
			$pdf->Cell(64,5,number_format($tienkhachdua), 0, 1, 'L');

			$pdf->SetFont('DejaVu','',12);
			$pdf->Cell(64,5,'Tiền trả khách:', 0, 0, 'L');
			$pdf->Cell(64,5,number_format($tienkhachdua - $data['tongtien']), 0, 1, 'L');

			$pdf->SetFont('DejaVu','',12);
			$pdf->Cell(64,10,'Tiền giờ:', 0, 0, 'L');
			$pdf->Cell(64,10,$data['giatien'].' đồng/giờ', 0, 1, 'L');

			$pdf->SetFont('DejaVu','',18);
			$pdf->Cell(128,10,'Xin cảm ơn và hẹn gặp lại!', 0, 1, 'C');

			// $file = 'C:/Users/KIET NGUYEN/Desktop/cnpm/' . 'report_' .$data['mahoadon'].'.pdf';

			$path = 'hoadon/' . 'report_' .$data['mahoadon'].'.pdf';

			// $chitiethoadon = base_url() . $path;
			// $path = 'hoadon';

			// echo $data['mahoadon'];
			// echo $data['maphong'];
			// echo $data['giora'];
			// echo $data['tongtien'];
			 // die;


			$pdf->Output();
			$pdf->Output($path,'F');

			$this->main_model->updateStatus($data['mahoadon'], $data['maphong'], $data['giora'], $data['tongtien'], $path, $_SESSION['admin'][0]['id']);
			unset($_SESSION['checkout']);

		} else redirect(base_url('quanly_karaoke'),'refresh');	

	}

	public function checkUserAccount() {

		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? md5($_POST['password']) : '';

		$count = $this->main_model->getAccountFromDB($username, $password);

		// unit test
		/*$expected_result = 1;
		$test_name = 'Unit test lấy thông tin tài khoản từ database';
		echo $this->unit->run(count($count), $expected_result, $test_name);*/


		if($count != null) {
			$this->session->set_userdata('admin',$count);
			$permission = $this->main_model->getPermissionByLevel($_SESSION['admin'][0]['level']);
			$this->session->set_userdata('permission',$permission);

			redirect(site_url('quanly_karaoke'),'refresh');
		} else {
			redirect(site_url('quanly_karaoke/logIn'),'refresh');
		}

	}

	public function logIn() {

		$this->load->view('logIn');
	}

	public function menuMangement() {

		$this->checkUserPermission();
		$menu = $this->main_model->getTableFromDB('thucdon');
		$data = array('menu' => $menu);
		$this->load->view('Menu_Management', $data);

	}

	public function editProductByAjax() {

		$mathucdon = $this->input->post('mathucdon');
		$tenmonan = $this->input->post('tenmonan');
		$donvitinh = $this->input->post('donvitinh');
		$giatien = $this->input->post('giatien');
		
		if($this->main_model->editProductById($mathucdon, $tenmonan, $donvitinh, $giatien)) 
			echo "cập nhật thành công";
		else
			echo "thất bại";
	}


	public function removeProductByAjax() {
		$mathucdon = $this->input->post('mathucdon');
		if($this->main_model->removeProductById($mathucdon))
			echo "xóa thành công";
		else
			echo "xóa thất bại";
	} 

	public function addProductByAjax() {
		$tenmonan = $this->input->post('tenmonan');
		$donvitinh = $this->input->post('donvitinh');
		$giatien = $this->input->post('giatien');

		$mathucdon = $this->main_model->addProduct($tenmonan, $donvitinh, $giatien);
		
		if($mathucdon)
			echo $mathucdon;
		else
			echo "thêm thực đơn thất bại";
	}

	public function preBooking() {

		$permission = 'quanly_karaoke/preBooking';

		if(in_array($permission, $_SESSION['permission']) == false)
		{
			echo json_encode('Bạn không đủ quyền đặt phòng!');
			redirect('quanly_karaoke','refresh');
			die;
		}

		$maphong = $this->input->post('maphong');	
		$checkin = $this->input->post('checkin');
		$dat_truoc = $this->input->post('dat_truoc');

		// echo "<pre>";
		// var_dump($maphong);
		// var_dump($checkin);
		// var_dump($dat_truoc);
		// echo "</pre>";

		// die;

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		if(strtotime($checkin) - strtotime(date('Y-m-d H:i')) <= 0 ) {
			echo json_encode('Thời gian đặt phòng không hợp lệ !');
			die;
		}

		$data = $this->main_model->preBookingById($maphong, $checkin, $dat_truoc);

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";

	}

	public function cancelReservation($maphong) {
		if($this->main_model->updateRoomStatusById($maphong)) {
			echo "<script>alert('Hủy thành công')</script>";
			redirect(site_url(quanly_karaoke),'refresh');
		}
	}

	public function createNewRoom() {

		$permission = 'quanly_karaoke/createNewRoom';

		if(in_array($permission, $_SESSION['permission']) == false)
		{
			echo 'Bạn không đủ quyền tạo phòng!';
			redirect('quanly_karaoke','refresh');
			die;
		}

		$maloai = $this->input->post('maloai');
		$lastId = $this->main_model->getTypeRoomByTypeId($maloai) + 1;

		$tenphong = NULL;
		if($maloai == 1) {
			if($lastId < 10)
				$tenphong = 'N00'.$lastId;
			else 
				$tenphong = 'N0'.$lastId;
		} elseif($maloai == 2) {
			if($lastId < 10)
				$tenphong = 'L00'.$lastId;
			else 
				$tenphong = 'L0'.$lastId;
		} elseif($maloai == 3) {
			if($lastId < 10)
				$tenphong = 'V00'.$lastId;
			else 
				$tenphong = 'V0'.$lastId;
		}

		$id = $this->main_model->insertIntoRoom($tenphong, $maloai);
		if($id == 0)
			echo 'Thiết lập phòng mới thất bại!';



	}

	public function removeRoom() {

		$permission = 'quanly_karaoke/removeRoom';

		if(in_array($permission, $_SESSION['permission']) == false)
		{
			echo 'Bạn không đủ quyền xóa phòng!';
			redirect('quanly_karaoke','refresh');
			die;
		}

		$maphong = $this->input->post('maphong');
		$this->main_model->removeRoomById($maphong);

	}

	public function checkUserPermission() {

		if(isset($_SESSION['admin']) == true) {
			$name = $_SESSION['admin'][0]['name'];
			$uri = $_SERVER['REQUEST_URI'];
			$uri = explode("/", $uri);
			$permission = null;
			if(isset($uri[4])) {
				$permission = $uri[3]."/".$uri[4];
				if(in_array($permission, $_SESSION['permission']) == false) {
					echo "<script>alert('Bạn không đủ quyền truy cập!');</script>";
					redirect('quanly_karaoke','refresh'); 
				}
			} else {
				$permission = $uri[3];
				if(in_array($permission, $_SESSION['permission']) == false) {
					echo "<script>alert('Bạn không đủ quyền truy cập!');</script>";
					redirect('quanly_karaoke','refresh'); 
				}

			}
		}
		else 
			redirect('quanly_karaoke/logIn','refresh'); 

	}

	public function loadBillManagementView() {

		// $item = $this->input->post('item');
		$this->checkUserPermission();
		$data = $this->main_model->getAllBillFromDB();

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";

		// die;

		$data = array('bill' => $data);

		$this->load->view('Bill_Management', $data);
	}

	public function getCurrentDate() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		return date('Y-m-d');
	}

	public function viewMode($item) {

		$data = $this->main_model->getBillByViewMode($item);

		$data = array('bill' => $data);

		$this->load->view('Bill_Management', $data);
	}





}
