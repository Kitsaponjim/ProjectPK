<div class="content-wrapper">

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
							.form-control {
    border-radius: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
}
						</style>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-6">

									<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
											class="fa fa-user"></i> แก้ไขรหัสผ่าน
										<?= $_SESSION['user_name']; ?>
									</p>

									<br>
									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ผู้ใช้ระบบ : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="user_login" name="user_login"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $_SESSION['user_name']; ?>" readonly>

										</div>
									</div>



									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>รหัสผ่านใหม่ : </label>
										</div>

										<div class="col-sm-7">
											<input type="password" id="password_1" name="password_1"
												class="form-control rounded-0" placeholder="กรอกรหัสผ่านใหม่" value="">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ยืนยันรหัสผ่าน : </label>
										</div>

										<div class="col-sm-7">
											<input type="password" id="password_2" name="password_2"
												class="form-control rounded-0" placeholder="กรอกเพื่อยืนยันรหัสผ่าน"
												value="">

										</div>
									</div>


								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"
								value="บันทึกข้อมูล" onclick="onSave(<?= $_SESSION['id']; ?>)">
						</div>
					</div>

				</div>
			</div>
			<br>
		</div><!-- /.box-body -->

</div>
</section>
</div><!-- /.content-wrapper -->


<script>
	function onSave(id) {
		var password_1 = $('#password_1').val();
		var password_2 = $('#password_2').val();

		if (confirm('คุณต้องการแก้ไขรหัสผ่านใช่หรือไม่')) {
			if (password_1 === '') {
				alert('กรุณากรอกรหัวผ่านใหม่');
				$('#password_1').focus();
				return false;
			} else if (password_2 === '') {
				alert('กรุณายืนยันรหัวผ่านใหม่');
				$('#password_2').focus();
				return false;
			} else if (password_2 != password_1) {
				alert('รหัสผ่านไม่ตรงกัน');
				$('#password_2').focus();
				return false;

			} else {
				var pmeters = 'id=' + <?= $_SESSION['id'] ?> + '&password_1=' + password_1 + '&password_2=' + password_2;
				pmeters = pmeters.replace("undefined", "");

				// alert(pmeters);

				$.ajax({
					url: "<?= base_url(); ?>repair_system/repairman/repairman_update_password",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/repairman/repairman_edit_password";
					}
				});

				return false;
			}
		}
	}
</script>
