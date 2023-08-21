<?php
defined('BASEPATH') or exit('No direct script access allowed');

class repair extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('function_model');
	}

	public function index()
	{
		$cus_type['query'] = $this->function_model->list_type();

		// echo "<pre>";
		// print_r($cus_type);
		// echo "</pre>";
		// exit;
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/repair' , $cus_type);
		$this->load->view('template/footer');

	}

	public function repair_choice()
	{
		$user_status_repair = $_SESSION['user_status_repair'];

		if($user_status_repair == 1){ //admin
			redirect('repair_system/Admin','refresh');

		}elseif($user_status_repair == 2){ //พนักงาน
			// redirect('repair_system/employee','refresh');
			redirect('repair_system/employee', 'refresh');

		}elseif($user_status_repair == 3){ //ช่าง
			// redirect('Admin','refresh');
			redirect('repair_system/repairman','refresh');

		}else{
			redirect('login/logout', 'refresh');

		}
	}

	
	public function repair_admin()
	{
		$data['query'] = $this->function_model->list_all();

		$this->load->view('template/header_admin');
		$this->load->view('repair', $data);
		$this->load->view('template/footer');

	}

	public function page_b()
	{

		$this->load->view('page_b');

	}

	public function repair_add() 
	{

		$time_add = date('Y-m-d H:i:s');

			$cus_name = $_POST['cus_name'];
			$cus_email = $_POST['cus_email'];
			$cus_tel = $_POST['cus_tel'];
			$cus_type = $_POST['cus_type'];
			$cus_equipment = $_POST['cus_equipment'];
			$cus_details = $_POST['cus_details'];
			$repair_address = $_POST['repair_address'];
	
	
			$sToken = "a56erNaEP0P6khdIyeHG5TIHHLMdc693ihNl6bVe8aR";
			$sMessage = "มีรายการแจ้งซ่อม \n";
	
			$sMessage .= "ชื่อ-นามสกุล : " . $cus_name . "\n";
			$sMessage .= "อีเมล : " . $cus_email . "\n";
			$sMessage .= "เบอร์โทรศัพท์ : " . $cus_tel . "\n";
			$sMessage .= "ประเภทงานซ่อม : " . $cus_type . "\n";
			$sMessage .= "อุปกรณ์ : " . $cus_equipment . "\n";
			$sMessage .= "ปัญหา/งานซ่อม : " . $cus_details . "\n";
			$sMessage .= "สถนาที่ : " . $repair_address . "\n";
			// $sMessage .= "เวลาแจ้งซ่อม : " . $time_add . "\n";
	

			$chOne = curl_init(); 
			curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt( $chOne, CURLOPT_POST, 1); 
			curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
			$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			$result = curl_exec( $chOne ); 
	

		
		$data = array();

		$id_user = $this->input->post('id');
		$cus_name = $this->input->post('cus_name');
		$cus_tel = $this->input->post('cus_tel');
		$cus_email = $this->input->post('cus_email');
		$cus_type = $this->input->post('cus_type');
		$cus_equipment = $this->input->post('cus_equipment');
		$cus_details = $this->input->post('cus_details');
		$repair_address = $this->input->post('repair_address');
		// $time_add = date('Y-m-d H:i:s');


		// ดึงข้อมูลไฟล์รูปภาพ (ถ้ามีการอัพโหลดไฟล์)
		$cus_image_filename = null;
		$image_mime_type = null;
		$image_data = null;

		if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
			$cus_image_filename = $_FILES['file_upload']['name'];
			$image_mime_type = $_FILES['file_upload']['type'];
			$image_data = file_get_contents($_FILES['file_upload']['tmp_name']);
		}

		$data = array(
			'id_repair' => $id_user,
			'rp_case_username' => $cus_name,
			'rp_case_usertel' => $cus_tel,
			'rp_case_useremail' => $cus_email,
			'rp_case_type' => $cus_type,
			'rp_case_name' => $cus_equipment,
			'rp_case_detail' => $cus_details,
			'rp_case_address' => $repair_address,
			'rp_add_date' => $time_add,
			'rp_case_status' => 1,
			'image_filename' => $cus_image_filename,
			'image_mime_type' => $image_mime_type,
			'image_data' => $image_data
		);

		$this->db->insert('rp_case', $data);

		echo "บันทึกข้อมูลสำเร็จ";
	}


	public function manage_data($rp_id = 0)
	{

		$data['query'] = $this->function_model->list_edit($rp_id);
		$data_status['status'] = $this->function_model->status_type();
		
		$this->load->view('template/footer');
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/manage_data', array_merge($data, $data_status));
	}

	public function manage_update_data()
	{

		$data = array();
		$rp_case_id = $this->input->post('rp_case_id'); // เพิ่มบรรทัดนี้เพื่อรับค่า rp_case_id

		$case_status = $this->input->post('case_status');
		$rp_update_detail = $this->input->post('rp_update_detail');
		$rp_update_name = $this->input->post('rp_update_name');
		$time_edit = $this->input->post('time_edit');

		$data = array(
			'rp_case_status' => $case_status,
			'rp_update_detail' => $rp_update_detail,
			'rp_update_name' => $rp_update_name,
			'rp_edit_date' => $time_edit,

		);

		$this->db->where('rp_case_id', $rp_case_id); // where() เพื่อระบุเงื่อนไขในการอัพเดตข้อมูล เพื่อให้รู้ว่าต้องอัพเดตแถวใดในฐานข้อมูล 
		$this->db->update('rp_case', $data);

		echo "บันทึกข้อมูลสำเร็จ";

	}


	public function edit_password($id_user = 0)
	{
		$data['query'] = $this->function_model->read($id_user);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/edit_password', $data);
		$this->load->view('template/footer');

	}

	public function update_password()
	{

		$id = $this->input->post('id');
		$password_1 = $this->input->post('password_1');
		$hashed_password = sha1($password_1);

		$data = array(
			'user_password' => $hashed_password
		);

		$this->db->where('id', $id);
		$this->db->update('user_info', $data);

		echo "บันทึกข้อมูลสำเร็จ";


	}


	public function notify()
	{
		
		// echo "asx";
		// session_start();

		if(isset($_POST['submit'])){
			echo "asx";
			$email = $_POST['email'];
			$fullname = $_POST['fullname'];
	
	
			$sToken = "wgMocE88rmHxYneSxJwFl9SaeLfLXkV2AeiTD8STG2J";
			$sMessage = "มีรายการแจ้งซ่อม \n";
	
			$sMessage .= "User Name : " . $email . "\n";
			$sMessage .= "Full Name : " . $fullname . "\n";
	
	
			
			$chOne = curl_init(); 
			curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt( $chOne, CURLOPT_POST, 1); 
			curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
			$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
			curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			$result = curl_exec( $chOne ); 
	

		}
	
	}

}
