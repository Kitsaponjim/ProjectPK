<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class function_model extends CI_Model {


	// เช็ค login
        public function check_login($username,$password)
        {

			$this->db->where('user_login',$username);
			$this->db->where('user_password',$password);
			$query = $this->db->get('user_info');
			$result = $query->row();
			
			// print_r($result);
			// exit;
			return $result;

        }

         public function list_all()
        {   
            $query = $this->db->get('user_info');
			$result = $query->result();

            return $result;
        }



	public function rp_list_case($status, $year)
     {   

			$con = "";
			if(!empty($status)) {
			// $status_list = $status;
				$con = "WHERE rp_case_status = $status";
			}

			if (!empty($year)) {
				$con .= " AND YEAR(rp_add_date) = $year";
				
			} else {
				// $con .= " AND YEAR(rp_add_date) = " . date('Y');
				$latestYearQuery = $this->db->query("SELECT MAX(YEAR(rp_add_date)) as latest_year FROM rp_case");
				$latestYearResult = $latestYearQuery->row();
				$latestYear = $latestYearResult->latest_year;
				if ($latestYear !== null) {
					$con .= " AND YEAR(rp_add_date) = $latestYear";
				}
			}


			$sql = "SELECT * FROM rp_case
			JOIN c_status ON rp_case.rp_case_status = c_status.c_status $con";
			$query = $this->db->query($sql);
			
			$result = $query->result();
			// echo '<pre>';
			// print_r($result);
			// echo '</pre>';
			
			// exit;
                return $result;
        }

		// เพิ่ม user
	public function insert_admin()
	{
		$data = array(
                'user_name' => $this->input->post('user_name'),
                'user_login' => $this->input->post('user_login'),
                'user_password' => sha1($this->input->post('user_password'))
                );

				// print_r($data);
				// exit;

        $query=$this->db->insert('user_info',$data);
	}

	//show form edit
	public function read($id){
        $this->db->where('id',$id);
        $query = $this->db->get('user_info');


        if($query->num_rows() > 0){
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }

		//ลบข้อมูล user
	public function del_user($id)
    {
        $this->db->delete('user_info',array('id'=>$id));

    }


	public function list_edit($rp_id = 0)
	{
		$sql = "SELECT * FROM rp_case WHERE rp_case_id = $rp_id";
		$row = $this->db->query($sql)->row();
		return $row;
	}

	public function list_type(){

		$sql = "SELECT * FROM rp_type";
		$cus_type = $this->db->query($sql)->result();

		return $cus_type;

	}

	public function status_type(){
		
		$sql_status = "SELECT * FROM c_status";
		$status_type = $this->db->query($sql_status)->result();

		return $status_type;
	}


	// 
	public function list_user(){

		$sql_user = "SELECT id,user_login,user_password,user_name,user_email,user_tel,user_status_repair,n_status FROM user_info JOIN user_status ON user_status_repair = u_id";
		$result_user = $this->db->query($sql_user)->result();

		return $result_user;
	}


	public function list_status_user(){

		$sql = "SELECT * FROM user_status";
		$list_status_user = $this->db->query($sql)->result();

		return $list_status_user;

	}

	//  admin_list_type
	public function admin_list_type(){
		$sql = "SELECT * FROM rp_type";
		$rp_type = $this->db->query($sql)->result();

		return $rp_type;
	}

	
	public function del_type($id_type)
    {
        $this->db->delete('rp_type',array('id_type'=>$id_type));

    }

	// num_status

	public function num_status($year)
	{
		$con = "";

		if (empty($year)) {
			$year = date('Y'); 
		}

		 if (!empty($year)) {
        $con = " WHERE YEAR(rp_add_date) = $year";
    	}
		$sql = "SELECT
		SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new,
		SUM(CASE WHEN rp_case_status = 2 THEN 1 ELSE 0 END) AS count_case_wait,
		SUM(CASE WHEN rp_case_status = 3 THEN 1 ELSE 0 END) AS count_case_finish,
		SUM(CASE WHEN rp_case_status = 4 THEN 1 ELSE 0 END) AS count_case_cancel
		FROM
		rp_case $con";
	
		$query = $this->db->query($sql)->row();
	
		// print_r($query);
		// exit;
		
		return $query;
	}
	
	public function user_status($status){

		$sql_status = "SELECT n_status FROM user_info JOIN user_status ON user_status_repair = u_id";
		$query = $this->db->query($sql_status)->row();

		return $query;


	}

	public function list_repair()
        {   
		echo "list_repair";
        //   echo $id;
		  exit;
        }



		


		
}
