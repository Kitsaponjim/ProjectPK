
<div class="content-wrapper">
	<section class="content">

		<div class="box">

			<div class="box-body">

				<div class="row">

					<div class="col-sm-12">

						<h3>
							<i class="fa fa-wrench"></i> เพิ่มข้อมูลแจ้งซ่อม
						</h3>
						<hr style="border-color: #ababab;">
						<!-- <hr style="border-color: #82acff;"> -->

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

				

.custom-placeholder {
    border-radius: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
}
.form-control {
    border-radius: 10px; /* ปรับค่าตามที่คุณต้องการให้เหมาะสม */
}




						</style>

						<?php

						$id = $_SESSION['id'];

						?>

						<p style="font-size: 20px; background-color: #f2f2f2; padding: 10px;"><i
								class="fa fa-pencil"></i> ข้อมูลผู้แจ้ง</p>




					<form action="<?= site_url('repair/notify'); ?>" method="post" class="form-horizontal">

							<div class="col-md-4 mb-2">
								<label><strong class="text-danger">*</strong>ชื่อ-นามสกุล </label>

								<input type="text" id="cus_name" name="cus_name"
									class="form-control rounded-0 custom-placeholder"
									value="<?php echo $_SESSION['user_name']; ?>" readonly>
							</div>

							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>เบอร์โทรศัพท์ </label>

								<input type="text" id="cus_tel" name="cus_tel" class="form-control rounded-0"
									placeholder="กรอกเบอร์โทร" maxlength="10" ">

						</div>

						<div class=" col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>อีเมล</label>
								<input type="email" id="cus_email" class="form-control rounded-0"
									placeholder="กรอกอีเมล">
							</div>

							<hr>

							<br>
							<br>
							<br>
							<br>

							<p class="text" style="font-size: 20px; background-color: #f2f2f2; padding: 10px;">
								&nbsp;&nbsp;&nbsp;<i class="fa fa-bell"></i> ข้อมูลปัญหา</p>

							<div class="col-md-3 mb-2">
								<label class="d-inline-block">วันที่แจ้งซ่อม</label>
								<input type="datetime-local" id="time_add" class="form-control rounded-0 d-inline-block"
									placeholder="วันที่และเวลาส่งซ่อม" value="<?= date('Y-m-d\TH:i'); ?>"
									min="<?= date('Y-m-d\TH:i'); ?> " readonly>
							</div>

							<br>
							<br>
							<br>
							<br>

							<div class="col-md-4 mb-2">


								<label><strong class="text-danger">*</strong>ประเภทงานซ่อม </label>

								<select id="cus_type" name="cus_type" required class="form-control">
									<?php
									$i = 1;

									echo '<option value="#">--เลือก---</option>';
									foreach ($query as $key => $rp_case) {
										$rp_name_type = @$rp_case->rp_name_type;

										echo '<option value="' . $i . '">' . $rp_name_type . '</option>';

										$i++;
									}
									?>

								</select>

							</div>

							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>ชื่ออุปกรณ์ </label>

								<input type="text" id="cus_equipment" class="form-control rounded-0"
									placeholder="กรอกอุปกรณ์">

							</div>


							<br>
							<br>
							<br>
							<br>

							<div class="col-md-10 mb-4">
								<label><strong class="text-danger">*</strong>ปัญหา/งานซ่อม</label>
								<textarea id="cus_details" class="form-control rounded-0"></textarea>
							</div>

							<br>
							<br>
							<br>
							<br>
							<br>

							<div class="col-md-4 mb-2">
								<label><strong class="text-danger">*</strong>อาคาร </label>

								<input type="text" id="repair_type" class="form-control rounded-0" placeholder="อาคาร">

							</div>

							<div class="col-md-4 mb-2">

								<label><strong class="text-danger">*</strong>ห้อง </label>

								<input type="text" id="repair_equipment" class="form-control rounded-0"
									placeholder="ห้อง">

							</div>


							<div class="col-md-4 mb-2">
								<label>แนบไฟล์ภาพ</label>
								<input type="file" id="file_upload" class="form-control-file">
							</div>

					


					</div>

				</div>

				<br>

				<div class="col-md-12 mt-2">
					<div class="button-container">


						<input class="btn btn-success" type="submit" name="submit" id="submit" value="แจ้งซ่อม"
							onclick="onSave(<?= $id; ?>)">
					</div>
				</div>

				<br>
				<br>


				</form>

			</div><!-- /.box-body -->

		</div>



	</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<script>

	function clearForm() {

		$('#cus_tel').val('');
		$('#cus_email').val('');
		$('#cus_type').val('');
		$('#cus_equipment').val('');
		$('#cus_details').val('');
		$('#repair_type').val('');
		$('#repair_equipment').val('');

	}

	function onSave(id) {
		var cus_name = $("#cus_name").val();
		var cus_email = $("#cus_email").val();
		var cus_tel = $("#cus_tel").val();
		var cus_type = $("#cus_type option:selected").text();
		var cus_equipment = $("#cus_equipment").val();
		var cus_details = $("#cus_details").val();
		var repair_type = $("#repair_type").val();
		var repair_equipment = $("#repair_equipment").val();
		var time_add = $("#time_add").val();
		var repair_address = repair_type + " " + repair_equipment;

		var file_upload = $("#file_upload")[0].files[0];
		var formData = new FormData();
		formData.append('file_upload', file_upload);

		if (confirm("คุณต้องการแจ้งซ่อมใช่หรือไม่")) {
			if (cus_tel == "") {
				alert("กรอกเบอร์โทรศัพท์");
				$("#cus_tel").focus();
				return false;
			} else if (cus_email == "") {
				alert("กรอกอีเมล");
				$("#cus_email").focus();
				return false;
			} else {
				formData.append('cus_name', cus_name);
				formData.append('cus_email', cus_email);
				formData.append('cus_tel', cus_tel);
				formData.append('cus_type', cus_type);
				formData.append('cus_equipment', cus_equipment);
				formData.append('cus_details', cus_details);
				formData.append('repair_address', repair_address);
				formData.append('time_add', time_add);
				formData.append('id', id);

				$.ajax({
					url: "<?= base_url(); ?>repair_system/repair/repair_add",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function (data) {
						alert(data);
						$("#submit").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/repair/repair_choice";
					}
				});
				return false;
			}
		}
		return false;
	}



</script>

