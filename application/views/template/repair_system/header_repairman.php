<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>ระบบแจ้งซ่อม</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<?php echo link_tag('asset/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>

	<?php echo link_tag('asset/bower_components/font-awesome/css/font-awesome.min.css'); ?>

	<?php echo link_tag('asset/bower_components/Ionicons/css/ionicons.min.css'); ?>

	<?php echo link_tag('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>

	<?php echo link_tag('asset/dist/css/AdminLTE.min.css'); ?>

	<?php echo link_tag('asset/dist/css/skins/_all-skins.min.css'); ?>

	<script src="<?php echo base_url(); ?>asset/dist/js/app.min.js" type="text/javascript">

	</script>

	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<!-- ckeditor-->
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style type="text/css">
		.fr {
			color: red;
		}
	</style>


</head>

<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php //echo $mylink;?>" class="logo" style="background-color: #1E90FF;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<!-- <span class="logo-mini" ><b>My</b>Backend</span> -->
				<!-- logo for regular state and mobile devices -->
				<!-- <span class="logo-lg"><b>My</b>Backend</span> -->
			</a>

			<nav class="navbar navbar-static-top" style="background-color: #43A2FF;">
				<!-- Sidebar button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>


				<div class="navbar-custom-menu">

					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span>
								<span class="hidden-xs">
									<?php echo $_SESSION['user_name']; ?>
								</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->

								<!-- <li class="user-header" style="background-color: #43A2FF;">
									<span class="glyphicon glyphicon-user"></span>

									<p>
										<?php echo $_SESSION['user_name']; ?>
									</p>
								</li> -->
								<!-- Menu Footer-->
								<li class="user-footer">

									<div class="pull-right">
										<a href="<?php echo site_url('repair_system/repairman/profile'); ?>"
											class="btn btn-primary btn-flat">โปรไฟล์</a>

										<a href="<?php echo site_url('login/logout'); ?>"
											onclick="return confirm('คุณต้องการออกจากระบบหรือไม่!!!');"
											class="btn btn-danger btn-flat">
											ออกจากระบบ</a>
									</div>
								</li>

							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- <br> -->


		<?php 

$sql = "SELECT
SUM(CASE WHEN rp_case_status = 1 THEN 1 ELSE 0 END) AS count_case_new
FROM
rp_case
WHERE
rp_case_status = 1 AND YEAR(rp_add_date) = YEAR(CURRENT_DATE())"; 

$query = $this->db->query($sql)->row();

$count_case_new = $query->count_case_new;

// echo $count_case_new;
// print_r($query);
// exit;


?>
<style>

.badge-blue {
    background-color: #5c9dff; /* สีพื้นหลังเป็นสีฟ้า */
    color: white; /* สีตัวอักษรเป็นสีขาว */
    /* อื่น ๆ ตามต้องการ */
}

.user-panel {
    display: flex;
    align-items: flex-start;
}
.pull-left.image, .pull-left.info {
    margin-left: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
}



</style>

		<aside class="main-sidebar">
			<section class="sidebar">



				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">เมนู</li>
					<li><a href="<?= site_url('repair_system/repairman'); ?>"><i class="fa fa-home"></i>
							<span>หน้าหลัก</span></a></li>

					<li><a href="<?= site_url('repair_system/repairman/repair'); ?>"><i
								class="fa fa-wrench"></i><span>แจ้งซ่อม</span></a></li>

					<li><a href="<?= site_url('repair_system/repairman/repairman_list'); ?>"><i
								class="fa fa-check-square"></i> <span>รายการแจ้งซ่อม

								<span class="badge badge-blue ml-auto">
    <?= $count_case_new; ?>
</span>

								</span></a></li>
								

					<li><a href="<?= site_url('repair_system/repairman/repairman_history'); ?>"><i
								class="fa fa-history"></i> <span>ประวัติการซ่อม</span></a></li>


					<li class="header">ตั้งค่า</li>
					<li><a href="<?= site_url('repair_system/repairman/profile'); ?>"><i class="fa fa-user"></i>
							<span>โปรไฟล์</span></a></li>

					<li><a href="<?= site_url('repair_system/repairman/repairman_edit_password'); ?>"><i
								class="fa fa-code"></i> <span>เปลี่ยนรหัสผ่าน</span></a></li>

					<li><a href="<?= site_url('login/logout'); ?>"
							onclick="return confirm('คุณต้องการออกจากระบบใช่ไหรือมั้ย');"><i class="fa fa-edit"></i>
							<span>ออกจากระบบ</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
