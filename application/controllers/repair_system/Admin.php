<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_status_repair') != 1) {
			redirect('login/logout', 'refresh');
		}
		$this->load->model('function_model');
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
		// print_r($view_data);
		// echo '</pre>';
		// exit;

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_index', $view_data);

	}

	// แสดงหน้าเลือกว่าต้องการเข้าระบบไหน
	public function page_choice()
	{

		$this->load->view('page_choice');

	}

	// ดึงข้อมูลรายการซ่อมทั้งหมด
	public function admin_list()
	{

		$year = $this->input->get('year');
		$status = $this->input->get('status');

		$data['query'] = $this->function_model->rp_list_case($status, $year);
		$num_status['num_status'] = $this->function_model->num_status($year); // ส่งค่าปีไปให้ฟังก์ชัน num_status()

		$data_total = array(
			'data' => $data,
			'num_status' => $num_status['num_status']
		);

		// echo '<pre>';
		// print_r($data_total);
		// echo '</pre>';
		// exit;

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list', $data_total);

	}

	// strat admin_list_user
	public function admin_list_user()
	{
		$data['query'] = $this->function_model->list_user();

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list_user', $data);


	}

	public function admin_del_user($id = 0)
	{
		$this->function_model->del_user($id);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/admin/admin_list_user', 'refresh');


	}

	// ดึงข้อมูลผู้ใช้งานระบบทั้งหมด
	public function admin_add_user()
	{

		$list_status_user['query'] = $this->function_model->list_status_user();

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/admin_add_user', $list_status_user);
		$this->load->view('template/footer');

	}

	//เพิ่มรายการ user
	public function add_user()
	{
		$data = array();

		$user_login = $this->input->post('user_login');
		$password = $this->input->post('password');
		$cus_name = $this->input->post('cus_name');
		$cus_tel = $this->input->post('cus_tel');
		$cus_email = $this->input->post('cus_email');
		$n_status = $this->input->post('n_status');

		$time_add = date('Y-m-d H:i:s');

		$data = array(
			'user_login' => $user_login,
			'user_password' => sha1($password),
			'user_name' => $cus_name,
			'user_email' => $cus_email,
			'user_tel' => $cus_tel,

			'user_status_repair' => $n_status,

			'user_adddate' => $time_add,

		);

		$this->db->insert('user_info', $data);
		echo "บันทึกข้อมูลสำเร็จ";

	}


	public function admin_list_type()
	{

		$data['query'] = $this->function_model->admin_list_type();

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('template/footer');
		$this->load->view('repair_system/admin/admin_list_type', $data);

	}

	public function admin_add_type()
	{

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/admin_add_type');
		$this->load->view('template/footer');

	}

	public function add_type()
	{
		$data = array();
		$rp_type = $this->input->post('rp_type');

		$data = array(
			'rp_name_type' => $rp_type,

		);

		$this->db->insert('rp_type', $data);

		echo "บันทึกข้อมูลสำเร็จ";

	}

	public function admin_del_type($id_type = 0)
	{

		$this->function_model->del_type($id_type);

		$this->session->set_flashdata('del_success', TRUE);
		redirect('repair_system/admin/admin_list_type', 'refresh');


	}


	public function admin_edit_user($id_user = 0)
	{
		$data = array(
			'id_user' => $id_user
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/admin_edit_user', $data);
		$this->load->view('template/footer');


	}
	public function admin_edit_type($id_type = 0)
	{

		$data = array(
			'id_type' => $id_type
		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/admin_edit_type', $data);
		$this->load->view('template/footer');


	}


	public function admin_edit_password()
	{
		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/admin/admin_edit_password');
		$this->load->view('template/footer');

	}

	public function admin_update_user()
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

	public function admin_update_type()
	{

		$data = array();
		$id_type = $this->input->post('id_type');
		$edit_name_type = $this->input->post('edit_name_type');

		if (!empty($id_type)) {
			if (!empty($edit_name_type)) {
				$data['rp_name_type'] = $edit_name_type;
			}

			if (!empty($data)) {
				$this->db->where('id_type', $id_type);
				$this->db->update('rp_type', $data);

				echo "บันทึกข้อมูลสำเร็จ";
			} else {
				echo "ไม่มีข้อมูลที่จะอัพเดต";
			}
		} else {
			echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากไม่มีข้อมูลในตาราง";

		}
	}

	public function admin_update_password()
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

	public function profile()
	{
		$data['query'] = $this->function_model->read($_SESSION['id']);
		$user_status['user_status'] = $this->function_model->user_status($_SESSION['user_status_repair']);

		$data_total = array(
			'data' => $data,
			'user_status' => $user_status

		);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/Profile', $data_total);
		$this->load->view('template/footer');
	}


	public function profile_edit($id = 0)
	{
		$data['query'] = $this->function_model->read($id);

		$this->load->view('template/repair_system/header_admin');
		$this->load->view('repair_system/Profile_edit', $data);
		$this->load->view('template/footer');

	}

}
