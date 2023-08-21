<?php
defined('BASEPATH') or exit('No direct script access allowed');

class repairman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('user_status_repair') != 3) {
			redirect('login/logout', 'refresh');
		}

		$this->load->model('function_model');
		$this->load->model('function_model_employee');
		$this->load->model('function_model_repairman');
	}

	public function index()
	{
		$year = $this->input->get('year');

		$data['query'] = $this->function_model->list_all();
		$num_status['num_status'] = $this->function_model->num_status($year);

		$view_data = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);
		// echo '<pre>';
		// print_r($data_total);
		// echo '</pre>';
		// exit;

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/repairman_index', $view_data);

	}


	public function repair()
	{
		$cus_type['query'] = $this->function_model->list_type();

		// echo "<pre>";
		// print_r($cus_type);
		// echo "</pre>";
		// exit;
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repair', $cus_type);
		$this->load->view('template/footer');

	}

	public function repairman_list()
	{
		$year = $this->input->get('year');
		$status = $this->input->get('status');

		$data['query'] = $this->function_model->rp_list_case($status, $year);
		$num_status['num_status'] = $this->function_model->num_status($year); // ส่งค่าปีไปให้ฟังก์ชัน num_status()

		$data_total = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);


		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/repairman_list' , $data_total);

	}

	public function repairman_history()
	{
		$year = $this->input->get('year');
		// $status = $this->input->get('status');
		$status = 3;

		$data['query'] = $this->function_model->rp_list_case($status, $year);
		$num_status['num_status'] = $this->function_model->num_status($year); // ส่งค่าปีไปให้ฟังก์ชัน num_status()

		$data_total = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);


		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/repairman/repairman_history' , $data_total);

	}

	public function employee_list_status()
	{
		$id = $this->input->get('id');
		$status = $this->input->get('status');

		$data['query'] = $this->function_model_employee->rp_list_case($status ,$id);
		$num_status['num_status'] = $this->function_model_employee->num_status($id);

		$data_total = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);

		// echo '<pre>';
		// print_r($data_total);
		// echo '</pre>';
		// exit;

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list', $data_total);

	}


	public function manage_data_repair($rp_id, $id) {

		$data['query'] = $this->function_model->list_edit($rp_id);
		$data_status['status'] = $this->function_model->status_type();

		$this->load->view('template/footer');
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/manage_data_repairman', array_merge($data, $data_status));
	}


	public function manage_update_data()
	{
		$data = array();
		
		$rp_case_id = $this->input->post('rp_case_id'); // เพิ่มบรรทัดนี้เพื่อรับค่า rp_case_id
		$rp_case_usertel = $this->input->post('rp_case_usertel');
		$rp_case_type = $this->input->post('rp_case_type');
		$rp_case_name = $this->input->post('rp_case_name');
		$rp_case_detail = $this->input->post('rp_case_detail');
		$rp_case_address = $this->input->post('rp_case_address');

		$time_edit = date('Y-m-d H:i:s');

			if (!empty($rp_case_id)) {
				if (!empty($rp_case_usertel)) {
					$data['rp_case_usertel'] = $rp_case_usertel;
				}
				if (!empty($rp_case_type)) {
					$data['rp_case_type'] = $rp_case_type;
				}
				if (!empty($rp_case_name)) {
					$data['rp_case_name'] = $rp_case_name;
				}
				if (!empty($rp_case_detail)) {
					$data['rp_case_detail'] = $rp_case_detail;
				}
				if (!empty($rp_case_address)) {
					$data['rp_case_address'] = $rp_case_address;
				}

				if (!empty($data)) {
					$this->db->where('rp_case_id', $rp_case_id);
					$this->db->update('rp_case', $data);

					echo "บันทึกข้อมูลสำเร็จ";
				} else {
					echo "ไม่มีข้อมูลที่จะอัพเดต";
				}
			} else {
				echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีค่า id_user";
			}

	}

	public function profile()
	{

		$id = $_SESSION['id'];
		$status = $_SESSION['user_status_repair'];
	
		$data['query'] = $this->function_model->read($id);
		$user_status['user_status'] = $this->function_model_employee->user_status($id, $status);

		$data_total = array(
			'data' => $data,
			'user_status' => $user_status

		);

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repairman/Profile', $data_total);
		$this->load->view('template/footer');
	}



	public function profile_edit($id = 0)
	{
		$data['query'] = $this->function_model->read($id);

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repairman/Profile_edit', $data);
		$this->load->view('template/footer');

	}

	public function repair_update_user()
	{
		$data = array();
		$id_user = $this->input->post('id_user');
		$edit_cus_name = $this->input->post('edit_cus_name');
		$edit_cus_email = $this->input->post('edit_cus_email');
		$edit_cus_tel = $this->input->post('edit_cus_tel');

		if (!empty($id_user)) {
			if (!empty($edit_cus_name)) {
				$data['user_name'] = $edit_cus_name;
			}
			if (!empty($edit_cus_email)) {
				$data['user_email'] = $edit_cus_email;
			}
			if (!empty($edit_cus_tel)) {
				$data['user_tel'] = $edit_cus_tel;
			}

			if (!empty($data)) {
				$this->db->where('id', $id_user);
				$this->db->update('user_info', $data);

				echo "บันทึกข้อมูลสำเร็จ";
			} else {
				echo "ไม่มีข้อมูลที่จะอัพเดต";
			}
		} else {
			echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีค่า id_user";
		}

	}

	public function employee_edit_password()
	{

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/employee/employee_edit_password');
		$this->load->view('template/footer');


	}
	
	public function employee_update_password()
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


	public function manage_data($rp_id = 0)
	{

		$data['query'] = $this->function_model->list_edit($rp_id);
		$data_status['status'] = $this->function_model->status_type();

		$this->load->view('template/footer');
		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repairman/manage_data_repairman', array_merge($data, $data_status));
	}


	public function repairman_edit_password()
	{

		$this->load->view('template/repair_system/header_repairman');
		$this->load->view('repair_system/repairman/repairman_edit_password');
		$this->load->view('template/footer');


	}


	public function repairman_update_password()
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

}
