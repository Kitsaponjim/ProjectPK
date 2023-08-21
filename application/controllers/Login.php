<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('function_model');
	}

	public function index()
	{
		$this->load->view('home/header');
		$this->load->view('home/login_view' , array('error' => ' ' ));
		$this->load->view('home/footer');
	}


	public function ck_login_choice(){
		
		if($this->input->post('user_login')==''){
			redirect('login','refresh');

		}else {

			$result = $this->function_model->check_login(
				$this->input->post('user_login'),
				sha1($this->input->post('user_password'))
				// $this->input->post('user_password')
			);

			
			if(!empty($result)){
				
				$arrsess = array(
					'id' => $result->id,
					'user_name'		=> $result->user_name,
					'user_login' => $result->user_login,
					'user_password' => $result->user_password,
					'user_email' => $result->user_email,
					'user_status_repair' => $result->user_status_repair
				);

				// print_r($arrsess);
				// exit;
				$this->session->set_userdata($arrsess);

				// $user_status_repair = $_SESSION['user_status_repair'];
				// $user_login = $_SESSION['user_login'];
				// $user_password = $_SESSION['user_password'];
				// $user_email = $_SESSION['user_email'];

				// echo $user_status_repair;
				// echo $user_password;
				// echo $user_email;
				// exit;

				
					redirect('login/page_choice','refresh');

			}
			else{
				$this->session->set_flashdata('login_error', TRUE);
				$this->session->unset_userdata(array('id','user_status','user_name'));
				redirect('login', 'refresh');
			}
		}
	}


	public function ck_login(){

		if($this->input->post('user_login')==''){
			redirect('login','refresh');

		}else {

			$result = $this->function_model->check_login(
				$this->input->post('user_login'),
				sha1($this->input->post('user_password'))
				// $this->input->post('user_password')
			);

	// print_r($result);
	// 			exit;

			if(!empty($result)){
				// $arrsess = array(
				// 	'id' => $result->id,
				// 	'user_status_repair'    	=> $result->user_status_repair,
				// 	'user_name'		=> $result->user_name
				// );

				// print_r($arrsess);
				// exit;
				// $this->session->set_userdata($arrsess);

				$user_status_repair = $_SESSION['user_status_repair'];
				$id = $_SESSION['id'];
				// $id = $_SESSION['id'];

				// echo $user_status;
				echo "id";
				echo $id;
				exit;

				if($user_status_repair == 1){
					redirect('repair_system/Admin','refresh');
					

				}elseif($user_status_repair == 2){

						redirect('repair_system/employee','refresh');
						// redirect('repair_system/employee?id=' . $id, 'refresh');
						
				}elseif($user_status_repair == 3){

					redirect('repair_system/repairman','refresh');
				}else{
					$this->session->set_flashdata('login_error', TRUE);
					$this->session->unset_userdata(array('id','user_status','user_name'));
					// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
					redirect('login', 'refresh');

				}

			}
			else{
				$this->session->set_flashdata('login_error', TRUE);
				$this->session->unset_userdata(array('id','user_status','user_name'));
				redirect('login', 'refresh');
			}
		}
	}

	// 
	public function ck_choice_repair(){ //เช็ค status ระบบแจ้งซ่อม

				$user_status_repair = $_SESSION['user_status_repair'];


				// $id = $_SESSION['id'];
				// $id = $_SESSION['id'];

				// echo $user_status;
				// echo "id";
				// echo $id;
				// exit;

				if($user_status_repair == 1){ //admin
					redirect('repair_system/Admin','refresh');

				}elseif($user_status_repair == 2){ //พนักงาน
					// redirect('repair_system/employee','refresh');
					redirect('repair_system/employee', 'refresh');

				}elseif($user_status_repair == 3){ //ช่าง
					// redirect('Admin','refresh');
					redirect('repair_system/repairman','refresh');

				}else{
					$this->session->set_flashdata('login_error', TRUE);
					$this->session->unset_userdata(array('id','user_status','user_name'));
					// ลบข้อมูล session ของตัวแปรที่ชื่อ "id", "user_level", และ "user_name" ออกจาก session ทั้งหมด เมื่อเกิดความผิดพลาดในการเข้าสู่ระบบ ทำให้การล็อกเอาท์ผู้ใช้จากระบบเกิดขึ้น
					redirect('login', 'refresh');

				}

			}
			



public function logout()
{
	$this->session->set_flashdata('logout_success', TRUE);
	$this->session->unset_userdata(array('id','user_level','user_name'));
	redirect('', 'refresh');
}



// 


	public function page_choice()
	{

		$this->load->view('page_choice');

	}

	public function forgot_password()
	{

		// $this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('forgot_password');

	}


}
