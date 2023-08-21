<?php
if (!function_exists('__header_admin')) {
	function __header_admin()
	{
		// exit;
		$ci = &get_instance();
		$ci->load->model('Admin_model');
		$data['query'] = $ci->Admin_model->list_all();
		$ci->load->view('template/footer');
		return $ci->load->view('template/header_admin', $data);
	}
}

if (!function_exists('__header_employee')) {
	function __header_employee()
	{
		// exit;
		$ci = &get_instance();
		$ci->load->model('Admin_model');
		$data['query'] = $ci->Admin_model->list_all();
		return $ci->load->view('template/header_employee', $data);
	}
}

if (!function_exists('__header_repair')) {
	function __header_repair()
	{
		// exit;
		$ci = &get_instance();
		$ci->load->model('Admin_model');
		$data['query'] = $ci->Admin_model->list_all();
		return $ci->load->view('template/header_repair', $data);
	}
	// application/helpers/custom_helper.php
if (!function_exists('__header_admin_view')) {
    function __header_admin_view()
    {
        $CI = &get_instance();
        $CI->load->view('template/header_admin');
    }
}

}

?>
