<?php
defined('BASEPATH') or exit('No direct script access allowed');
class function_model_employee extends CI_Model
{


	// เช็ค login
	public function list_all()
	{



	}

	public function list_repair($id, $status, $year)
	{

		$con = "";
		if(!empty($status)) {
		// $status_list = $status;
			$con .= " AND  rp_case_status = $status";
		}

		if (!empty($year)) {
			$con .= " AND YEAR(rp_add_date) = $year";
		}

		$sql = "SELECT * FROM rp_case JOIN c_status ON rp_case_status = c_id WHERE id_repair = $id" . $con;
		$result = $this->db->query($sql)->result();

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		//     exit;

		return $result;

	}

	public function num_status($id ,$year)
	{

		$con = "";
		if (empty($year)) {
			$year = date('Y'); 
		}

		 if (!empty($year)) {
			$con .= " AND YEAR(rp_add_date) = $year";
    	}

		$sql = "SELECT
			SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
			SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
			SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
			SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel
			FROM
			rp_case
			WHERE id_repair = $id $con";

		$query = $this->db->query($sql)->row();

		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
		//     exit;
		return $query;

	}

	public function rp_list_case($status, $id)
	{

		$con = "";
		if (!empty($status)) {
			// $status_list = $status;
			$con = "WHERE rp_case_status = $status";
		}

		$sql = "SELECT * FROM rp_case
			JOIN c_status ON rp_case.rp_case_status = c_status.c_status $con AND id_repair = $id";
		$query = $this->db->query($sql);
		$result = $query->result();

		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';
		// exit;
		return $result;
	}


	public function user_status($id, $status)
	{

		$sql_status = "SELECT n_status FROM user_info JOIN user_status ON user_status_repair = u_id WHERE id = $id";
		$query = $this->db->query($sql_status)->row();

		return $query;

	}
}
