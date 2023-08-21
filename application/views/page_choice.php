<!-- ############################################ -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Page</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		.body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			background: #cccccc;
			font-family: 'Kanit', sans-serif;
		}

		img {
			width: 340px;
			height: 340px;
		}

		.login-logo {
			text-align: center;
		}

		.wrapper {
			width: 420px;
			background: #ffffff;
			color: #606060;
			padding-left: 30px;
			padding-right: 30px;
			padding-bottom: 20px;
			border-radius: 5px;
		}

		.wrapper h4 {
			font-size: 22px;
			text-align: center;
			color: #000;
		}

		.wrapper .input-box {
			width: 99%;
			height: 50px;
			margin: 30px 0;
		}

		.input-box input {
			width: 99%;
			height: 99%;
			background: #d9d9d9;
			border: none;
			outline: none;
			border: 2px solid rgba(255, 255, 255, .2);
			border-radius: 5px;
			font-size: 16px;
			color: #606060;
			padding: 20px 45px 20px 20px;
		}

		.input-box input::placeholder {
			color: #606060;
		}

		.wrapper .remember-forgot {
			display: flex;
			justify-content: space-between;
			font-size: 14.5px;
			margin: -15px 0 15px;
		}

		.remember-forgot label input {
			accent-color: #5bdb5b;
			margin-right: 4px;
		}

		.remember-forgot a {
			color: #4a9ebb;
			text-decoration: none;
		}

		.wrapper .btn {
			width: 100%;
			height: 45px;
			color: #fff;
			background-color: #0b5ed7;
			border: none;
			outline: none;
			border-radius: 5px;
		}

		.container .card {
			display: flex;
			justify-content: space-between;
		}

		.landing-card {
			display: flex;
		}

		.card {
			display: block;
			margin: 30px;
			text-align: center;
		}

		.card-text {
			color: #535353;
		}
	</style>
</head>

<body class="body">

	<div class="landing-card">
		<div class="card" style="width: 18rem; background-color: #90c8fc;">

			<img src="<?php echo base_url('img'); ?>/repair_1.png" class="card-img-top mt-2" alt="ระบบแจ้งซ่อม"
				style="height: 138px; width: 138px;">
			<div class="card-body">
				<h5 class="card-title">ระบบแจ้งซ่อม</h5>
				<p class="card-text">ระบบที่สามารถแจ้งเกี่ยวกับอุปกรณ์ต่างๆ ที่เสียหายได้เพื่อให้ได้รับการซ่อมแซม</p>
				<a href="<?= site_url('login/ck_choice_repair'); ?>" class="btn btn-primary">เข้าสู่ระบบ</a>
			</div>
		</div>


		<div class="card" style="width: 18rem; background-color: #90fc9b;">

			<img src="<?php echo base_url('img'); ?>/car.png" class="card-img-top mt-2" alt="ระบบจองรถ"
				style="height: 138px; width: 138px;">
			<div class="card-body">
				<h5 class="card-title">ระบบจองรถ</h5>
				<p class="card-text">ระบบที่สามารถใช้จองรถชนิดต่างๆ ภายในบริษัทเพื่อที่จะนำรถไปใช้งานนอกสถานที่ได้</p>
				<a href="<?= site_url('login/ck_choice_repair'); ?>" class="btn btn-primary">เข้าสู่ระบบ</a>
			</div>
		</div>


		<div class="card" style="width: 18rem; background-color: #fc9090;">

			<img src="<?php echo base_url('img'); ?>/meeting.png" class="card-img-top mt-2" alt="ระบบจองห้องประชุม"
				style="height: 138px; width: 138px;">
			<div class="card-body">
				<h5 class="card-title">ระบบจองห้องประชุม</h5>
				<p class="card-text">ระบบที่สามารถจองห้องต่าง ๆ ภายในบริษัทเพื่อที่จะนำห้องนั้น ๆ ไปใช้ประชุมได้</p>
				<a href="#" class="btn btn-primary">เข้าสู่ระบบ</a>
			</div>
		</div>


		<div class="card" style="width: 18rem; background-color: #f3fc90;">
			<img src="<?php echo base_url('img'); ?>/emeeting.png" class="card-img-top mt-2" alt="ระบบเอกสารอิเล็คทรอนิคส์"
				style="height: 130px; width: 130px; text-align: center;">
			<div class="card-body">
				<h5 class="card-title">ระบบเอกสารอิเล็คทรอนิคส์</h5>
				<p class="card-text">ระบบที่สามารถใช้ร่วมกับการประชุม มีหน้าที่เก็บไฟล์
					และดาวโหลดเอกสารที่เกี่ยวข้องกับการประชุมนั้น ๆ ได้</p>
				<a href="#" class="btn btn-primary">เข้าสู่ระบบ</a>
			</div>
		</div>


	</div>
</body>

</html>
