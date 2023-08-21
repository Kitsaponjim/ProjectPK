<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-address-book"></i> เพิ่มข้อมูลบุคลากร

		</h1>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">

						<style>
							.custom-placeholder::placeholder {
								color: #0f007d;
								font-weight: bold;
							}

							.text-primary {
								color: #4a89ff;

								font-size: 18px;
							}

							.text-primary .fa {
								color: #07c700;

							}

							.button-container {
								display: flex;
								justify-content: flex-end;

							}

							.btn-primary {
								background-color: green;

								color: white;

								margin-right: 5px;

							}

							.btn-danger {
								background-color: red;

								color: white;

							}
						</style>



						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-6">
									<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
											class="fa fa-pencil"></i> รายละเอียด</p>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>User Login</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0" placeholder="User Login">

										</div>
									</div>
					
									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>Password</label>
										</div>

										<div class="col-sm-7">
											<input type="password" id="password" name="password"
												class="form-control rounded-0" placeholder="Password">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>ชื่อ-นามสกุล</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0" placeholder="กรอกชื่อ-นามสกุล">

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>อีเมล </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_email" name="cus_email"
												class="form-control rounded-0" placeholder="กรอกอีเมล">
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์ </label>
										</div>
										<div class="col-sm-6">
											<input type="text" id="cus_tel" name="cus_tel"
												class="form-control rounded-0" placeholder="กรอกเบอร์โทร"
												maxlength="10">
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label><strong class="text-danger">*</strong>สถานะ </label>
										</div>
										<div class="col-sm-6">
											<select id="n_status" name="n_status" required class="form-control">
												<?php
												$i = 1;

												echo '<option value="#">--เลือก---</option>';
												foreach ($query as $key => $rp_case) {
													$n_status = $rp_case->n_status;

													echo '<option value="' . $i . '">' . $n_status . '</option>';

													$i++;
												}
												?>
											</select>
										</div>
									</div>

								</div>

							</div>
						</form>
					</div>
				</div>

				<br>

				<div class="col-md-12 mt-2">
					<div class="button-container">

						<input class="btn btn-success" type="button" name="btnSave" id="btnSave" value="บันทึกข้อมูล"
							onclick="onSave()">

						&nbsp;&nbsp;

						<button onclick="clearForm()" class="btn btn-danger rounded-0">เคลียร์</button>

					</div>
				</div>

				<br>
				<br>

			</div><!-- /.box-body -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<script>

	function clearForm() {

		// $('#cus_name').val('');
		$('#cus_tel').val('');
		$('#cus_email').val('');
		$('#cus_type').val('');
		$('#cus_equipment').val('');
		$('#cus_details').val('');
		$('#repair_type').val('');
		$('#repair_equipment').val('');

	}

	function onSave() {

		var user_login = $("#user_login").val();
		var password = $("#password").val();
		var cus_name = $("#cus_name").val();
		var cus_email = $("#cus_email").val();
		var cus_tel = $("#cus_tel").val();
		var n_status = $("#n_status").val();

		if (user_login == "") {
			alert("กรอก user_login ");
			$("#user_login").focus();
			return false;
		} else if (password == "") {
			alert("password");
			$("#password").focus();
			return false;
		}
		else if (cus_name == "") {
			alert("กรอก ชื่อ-นามสกุล ");
			$("#cus_name").focus();
			return false;
		}
		else if (cus_email == "") {
			alert("กรอกอีเมล");
			$("#cus_email").focus();
			return false;
		}
		else if (cus_tel == "") {
			alert("กรอกเบอร์โทรศัพท์");
			$("#cus_tel").focus();
			return false;
		}
		else if (n_status == "#") {
			alert("เลือกสถานะ");
			$("#n_status").focus();
			return false;
		}
		else {

			var pmeters = 'cus_name=' + cus_name + '&cus_email=' + cus_email + '&cus_tel=' + cus_tel
				+ '&n_status=' + n_status + '&user_login=' + user_login + '&password=' + password;

			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/add_user",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>repair_system/admin/admin_list_user";
				}
			});
			return false;
		}

	}

</script>
