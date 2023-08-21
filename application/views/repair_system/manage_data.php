<div class="content-wrapper">
	<section class="content">

		<p style="font-size: 20px; background-color: #ffffff; padding: 10px;"><i class="fa fa-refresh"></i>
			ฟอร์มอัพเดทงานซ่อม</p>

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

						
						if ($rp_case_status == 1) {
							$rp_case_status = 'รอดำเนินการ';
						} elseif ($rp_case_status == 2) {
							$rp_case_status = 'กำลังดำเนินการ';
						} elseif ($rp_case_status == 3) {
							$rp_case_status = 'สำเร็จ';
						} elseif ($rp_case_status == 4) {
							$rp_case_status = 'ยกลเลิก';
						}

						?>

						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<form class="">

									<div class="box-body">
										<div class="col-sm-6">

											<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
													class="fa fa-pencil"></i> ข้อมูลผู้แจ้ง</p>


											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px; font-weight: normal;">ชื่อ-นามสกุล :&nbsp;
												&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;"
												value="<?= $rp_case_username_id; ?>" readonly>


											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px;  font-weight: normal;">เบอร์โทรศัพท์ :&nbsp;
												&nbsp; &nbsp; &nbsp;&nbsp;</label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;"
												value="<?= $rp_case_usertel; ?>" readonly>
											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px;  font-weight: normal;">อีเมล :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp; &nbsp; &nbsp;&nbsp;</label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;"
												value="<?= $rp_case_useremail; ?>" readonly>




											<!-- ################################################################## -->
											<br>

											<br>
											<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
													class="fa fa-exclamation-circle"></i> ข้อมูลปัญหา</p>


											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px; font-weight: normal;">ประเภทงานซ่อม :&nbsp;
												&nbsp; &nbsp; </label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;" value="<?= $rp_case_type; ?>"
												readonly>


											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px;  font-weight: normal;">ชื่ออุปกรณ์ :&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
												&nbsp;&nbsp;</label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;" value="<?= $rp_case_name; ?>"
												readonly>
											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px; margin-right: 10px; font-weight: normal;">ปัญหา/งานซ่อม
												:&nbsp;&nbsp; </label>
											<textarea name="case_update_log" placeholder="<?= $rp_case_detail; ?>"
												class="form-control" style="height: 70px; width: 380px;"
												readonly></textarea>

											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px;  font-weight: normal;">สถานที่แจ้งซ่อม
												:&nbsp; &nbsp;&nbsp;&nbsp;</label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 70%; padding-right: 30px;"
												value="<?= $rp_case_address; ?>" readonly>

											<br>
											<br>

											&nbsp; &nbsp; &nbsp; <label
												style="margin-bottom: 5px;  font-weight: normal;">สถานที่แจ้งซ่อม
												:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												style="width: 50%; padding-right: 10px;" value="<?= $rp_add_date; ?>"
												readonly>
											<br>
											<br>
										</div>
								</form>

								<div class=" col-sm-6">
									<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
											class="fa fa-refresh"></i> ดำเนินการ</p>


									&nbsp; &nbsp; &nbsp; &nbsp; <label
										style="margin-bottom: 5px;  font-weight: normal;">สถานะปัจจุบัน
										:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" id="cus_name" name="cus_name"
										class="form-control rounded-0 custom-placeholder"
										style="width: 50%; padding-right: 10px;" value="<?= $rp_case_status; ?>"
										readonly>


									<br>
									<br>
									&nbsp; &nbsp; &nbsp; <label
										style="margin-bottom: 5px;  font-weight: normal;">วันที่ดำเนินการ
										:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

									<input type="datetime-local" id="time_edit" name="time_edit"
										class="form-control rounded-0 custom-placeholder"
										style="width: 50%; padding-right: 10px;" placeholder="วันที่และเวลาส่งซ่อม"
										value="<?= date('Y-m-d\TH:i'); ?>" min="<?= date('Y-m-d\TH:i'); ?> " readonly>



									<br>
									<br>
									&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; <label
										style="margin-bottom: 5px;  font-weight: normal;">อัพเดตสถานะ
										:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<select id="case_status" name="case_status" class="form-control">
										<?php
										$i = 1;

										echo '<option value="#">--เลือก---</option>';
										foreach ($status as $key => $status_type) {
											$status_type_name = @$status_type->c_name;

											echo '<option value="' . $i . '">' . $status_type_name . '</option>';
											$i++;

										}
										?>
									</select>

									<br>
									<br>
									
									&nbsp; &nbsp; &nbsp; <label
										style="margin-bottom: 5px; margin-right: 10px; font-weight: normal;">บันทึกการอัพเดทงานซ่อม
										:</label><br>

									&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<textarea id="rp_update_detail"
										name="rp_update_detail" placeholder="<?= $rp_case_detail; ?>"
										class="form-control" style="height: 70px; width: 380px;"></textarea>

									<br>
									<br>

									&nbsp; &nbsp; &nbsp; <label
										style="margin-bottom: 5px; font-weight: normal;">ลงชื่อผู้บันทึก :&nbsp; &nbsp;
										&nbsp; &nbsp; </label>
									<input type="text" id="rp_update_name" name="rp_update_name"
										class="form-control rounded-0 custom-placeholder"
										style="width: 70%; padding-right: 30px;" value="">

								</div>
							</div>
						</div>

					</div>

				</div>

				<div class="col-md-12 mt-2">
					<div class="button-container">
						<input class="btn btn-success" type="submit" name="btnSave" id="btnSave" value="บันทึกข้อมูล"
							onclick="onSave('<?php echo $rp_case_id; ?>')">


						&nbsp;&nbsp;

						<input type="button" value="กลับ" class="btn btn-danger rounded-0"
							onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list'">
						<!-- <button onclick="back()" class="btn btn-danger rounded-0">กลับ</button> -->
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
	function onSave(rp_case_id) {

		var case_status = $("#case_status").val();
		var rp_update_detail = $("#rp_update_detail").val();
		var rp_update_name = $("#rp_update_name").val();
		var time_edit = $("#time_edit").val();

		if (confirm("คุณต้องการบันทึกข้อมูลใช่ไหม")) {
			if (case_status == "") {
				alert("เลือกรายการอัพเดทสถานะ ");
				$("#case_status").focus();
				return false;
			} else if (rp_update_detail == "") {
				alert("กรอกรายละเอียด");
				$("#rp_update_detail").focus();
				return false;
			} else if (rp_update_name == "") {
				alert("กรอกชื่อ");
				$("#rp_update_name").focus();
				return false;
			}
			else {

				var pmeters = 'rp_case_id=' + <?= $rp_case_id ?> + '&case_status=' + case_status
					+ '&rp_update_detail=' + rp_update_detail + '&rp_update_name=' + rp_update_name
					+ '&time_edit=' + time_edit;

				pmeters = pmeters.replace("undefined", "");

				$.ajax({
					url: "<?= base_url(); ?>repair_system/repair/manage_update_data",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/admin/admin_list";
					}
				});
				return false;
			}
		}
		return false;

	}
</script>
