<div class="content-wrapper">
	<section class="content">

		<p style="font-size: 20px; background-color: #ffffff; padding: 10px;"><i class="fa fa-refresh"></i>
			ฟอร์มแก้ไขงานซ่อม</p>

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


						$rp_case_id = $query->rp_case_id;
						$rp_case_name = $query->rp_case_name;
						$rp_case_type = $query->rp_case_type;
						$rp_case_detail = $query->rp_case_detail;
						$rp_case_username_id = $query->rp_case_username;
						$rp_case_usertel = $query->rp_case_usertel;
						$rp_case_useremail = $query->rp_case_useremail;
						$rp_case_address = $query->rp_case_address;
						$rp_case_status = $query->rp_case_status;
						$rp_add_date = $query->rp_add_date;
						$rp_edit_date = $query->rp_edit_date;

						$rp_update_detail = $query->rp_update_detail;
						$rp_update_name = $query->rp_update_name;

						?>

						<!-- <form role="" action="<?= site_url('repair_system/repair/edit_data'); ?>" method="post" class="form-horizontal"> -->
						<form class="form-horizontal">

							<div class="box-body">
								<div class="col-sm-6">

									<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
											class="fa fa-pencil"></i> ข้อมูลแจ้งซ่อม</p>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label></strong>ชื่อ-นามสกุล : </label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="rp_case_username_id" name="rp_case_username_id"
												class="form-control rounded-0 custom-placeholder"
												value="<?= $rp_case_username_id; ?>" readonly>

										</div>
									</div>

									<div class="form-group">

										<div class="col-sm-3 control-label">
											<label></strong>เบอร์โทรศัพท์ : </label>
										</div>

										<div class="col-sm-6">
											<input type="text" id="rp_case_usertel" name="rp_case_usertel"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_usertel; ?>">

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>ประเภทงานซ่อม : </label>
										</div>
										<div class="col-sm-5">
											<input type="text" id="rp_case_type" name="rp_case_type"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_type; ?>">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>อุปกรณ์ : </label>
										</div>
										<div class="col-sm-8">
											<input type="text" id="rp_case_name" name="rp_case_name"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_name; ?>">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>รายละเอียด : </label>
										</div>


										<div class="col-sm-7">

											<textarea id="rp_case_detail" name="rp_case_detail"
												placeholder="<?= $rp_case_detail; ?>" class="form-control"></textarea>

										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>สถานที่แจ้งซ่อม : </label>
										</div>
										<div class="col-sm-8">
											<input type="text" id="rp_case_address" name="rp_case_address"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_address; ?>">

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3 control-label">
											<label>สถานะแจ้งซ่อม : </label>
										</div>
										<div class="col-sm-8">
											<input type="text" id="rp_case_status" name="rp_case_status"
												class="form-control rounded-0" value=""
												placeholder="<?= $rp_case_status; ?>">

										</div>
									</div>

								</div>

							</div>
						</form>

					</div>

					<div class="col-md-12 mt-2">
						<div class="button-container">
							<input class="btn btn-success" type="submit" name="btnSave" id="btnSave"
								value="บันทึกข้อมูล" onclick="onSave('<?php echo $rp_case_id; ?>')">

							&nbsp;&nbsp;

							<input type="button" value="กลับ" class="btn btn-danger rounded-0"
								onclick="window.location='<?= base_url(); ?>repair_system/employee/employee_list'">
							<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
						</div>
					</div>
				</div>
			</div>
			<br>
		</div><!-- /.box-body -->

</div>
</section>
</div>

<script>
	function onSave(rp_case_id) {

		var rp_case_usertel = $("#rp_case_usertel").val();
		var rp_case_type = $("#rp_case_type").val();
		var rp_case_name = $("#rp_case_name").val();
		var rp_case_detail = $("#rp_case_detail").val();
		var rp_case_address = $("#rp_case_address").val();

		if (confirm("คุณต้องการบันทึกข้อมูลใช่ไหม")) {


			var pmeters = 'rp_case_id=' + <?= $rp_case_id ?> + '&rp_case_usertel=' + rp_case_usertel + '&rp_case_type=' + rp_case_type
				+ '&rp_case_name=' + rp_case_name + '&rp_case_detail=' + rp_case_detail + '&rp_case_address=' + rp_case_address;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/employee/manage_update_data",
				type: 'POST',
				data: pmeters,
				async: false,
				success: function (data) {
					alert(data);
					$("#btnSave").attr("disabled", true);
					window.location = "<?= base_url(); ?>repair_system/employee/employee_list";
				}
			});
			return false;

		}
		return false;

	}
</script>
