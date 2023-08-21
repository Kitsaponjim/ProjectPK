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


						<?php
						$n_status = $user_status['user_status']->n_status;
						$id = $data['query']->id;
						$user_login = $data['query']->user_login;
						$user_password = $data['query']->user_password;
						$user_name = $data['query']->user_name;
						$user_email = $data['query']->user_email;
						$user_tel = $data['query']->user_tel;
						$user_status_repair = $data['query']->user_status_repair;
						?>

						<form class="form-horizontal">

							<div class="box-body">

								<div class="col-sm-6">
									<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
											class="fa fa-user"></i> ข้อมูล
										<?= $user_name ?>
									</p>

									<br>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>user_login : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $user_login ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $user_name ?>" readonly>

										</div>
									</div>



									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>อีเมล : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="cus_tel" name="cus_tel"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $user_email ?>" readonly>

										</div>
									</div>

									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="cus_tel" name="cus_tel"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $user_tel ?>" readonly>

										</div>
									</div>

									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>สถานะ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="cus_tel" name="cus_tel"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $n_status ?>" readonly>

										</div>
									</div>
								</div>
							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave" value="แก้ไขข้อมูล"
								onclick="onEdit('<?php echo $id; ?>')">
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
	function onEdit(id) {

		window.location = "<?= base_url(); ?>repair_system/employee/profile_edit/" + id;
		
	}
</script>
