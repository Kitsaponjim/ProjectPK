<?php

$count_case_new = $num_status->count_case_new;
$count_case_wait = $num_status->count_case_wait;
$count_case_finish = $num_status->count_case_finish;
$count_case_cancel = $num_status->count_case_cancel;


?>

<div class="content-wrapper">

<style>
		.narrow-select {
			width: 100px;
			/* ปรับค่าเป็นขนาดที่คุณต้องการ */
			padding: 5px 5px;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}

		.narrow-select:focus {
			border-color: #66afe9;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px rgba(102, 175, 233, .5);
		}

		.btn-custom-gray {
			background-color: #ccc;
			/* สีเทา */
			color: #fff;
			/* สีข้อความ */
		}

		.btn-lg {
			padding: 5px 5px;
			/* ปรับขนาดให้ใหญ่ขึ้น */
			font-size: 10px;
			/* ปรับขนาดตัวอักษรให้ใหญ่ขึ้น */
			line-height: 1.3333333;
			/* ปรับความสูง */
			border-radius: 6px;
			/* ปรับขอบมน */
		}
	</style>
	
	<section class="content">
		<div class="box">
			<div class="box-header">

				<h3>
					<i class="fa fa-wrench"></i> รายการแจ้งซ่อมทั้งหมด
				</h3>
				<hr style="border-color: #ababab;">

				<form method="get" action="">
					<label for="year">ข้อมูลการทำงานปี : </label>
					<select id="year" name="year" required class="narrow-select">
						<?php
						$currentYear = date('Y'); // ดึงปีปัจจุบัน
						$sql = "SELECT DISTINCT YEAR(rp_add_date) AS rp_year FROM rp_case WHERE id_repair = $id";
						$query = $this->db->query($sql)->result();


						foreach ($query as $year) {
							if ($year->rp_year != 0) {
								$selected = ($_GET['year'] == $year->rp_year) ? 'selected' : '';
								echo '<option value="' . $year->rp_year . '" ' . $selected . '>' . $year->rp_year . '</option>';
							}
						}
						?>
					</select>
					<button class="btn btn-custom-gray btn-lg" type="submit">ค้นหา</button>
				</form>


				<br>
				<a href="<?= site_url('repair_system/employee/employee_list'); ?>?status=1" class="btn btn-primary">
					งานใหม่
					<span class="badge">
						<?= $count_case_new; ?>
					</span></a>
				<a href="<?= site_url('repair_system/employee/employee_list'); ?>?status=2" class="btn btn-warning">
					กำลังดำเนินงาน <span class="badge">
						<?= $count_case_wait; ?>
					</span></a>
				<a href="<?= site_url('repair_system/employee/employee_list'); ?>?status=3" class="btn btn-success">
					เสร็จสิ้น
					<span class="badge">
						<?= $count_case_finish; ?>
					</span></a>
				<a href="<?= site_url('repair_system/employee/employee_list'); ?>?status=4" class="btn btn-danger">
					ยกเลิก
					<span class="badge">
						<?= $count_case_cancel; ?>
					</span></a>
				<br>

			</div>

			<div class="box-body">
				<div class="row">

					<div class="col-sm-12">
						<table id="example1" class="table table-silver table-bordered table-striped dataTable"
							role="grid" aria-describedby="example1_info style=" text-align: center;">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
										วันที่แจ้งซ่อม</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										ชื่อผู้แจ้ง</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 18%; text-align: center;">
										ประเภทงานซ่อม</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">
										ปัญหา/งานซ่อม</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">สาเหตุ/วิะ๊</th> -->

									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										สถานะ</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 7%; text-align: center;">
										เพิ่มเติม</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;">ภาพ</th> -->
									<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
										จัดการ</th>

								</tr>
							</thead>
							<tbody>
								<?php

								$total_rows = count($data['query']); // นับจำนวนแถวทั้งหมด
								foreach ($data['query'] as $key => $rp_case) {
									$rp_id = @$rp_case->rp_case_id;
									$rp_case_type_name = @$rp_case->rp_case_type;
									$rp_case_name = @$rp_case->rp_case_name;
									$rp_case_detail = @$rp_case->rp_case_detail;


									$rp_case_status = @$rp_case->c_name;
									$rp_add_date = @$rp_case->rp_add_date;
									$formatted_date = date('Y-m-d H:i', strtotime($rp_add_date));
									$rp_update_name = @$rp_case->rp_update_name;

									$rp_case_address = @$rp_case->rp_case_address;

									$rp_update_detail = @$rp_case->rp_update_detail;


									$current_row = $total_rows - $key; // หาลำดับของแถวที่ถูกแสดง
									?>
									<tr role="row">
										<td align="center" style="font-size: 12px;">
											<?= $formatted_date; ?>
										</td>
										<td style="font-size: 12px;">
											<?= $rp_case->rp_case_username; ?>
										</td>
										<td style="font-size: 12px;">
											ประเภทงานซ่อม :
											<span style="font-weight: bold;">
												<?= $rp_case_type_name; ?>
											</span>
											<br>
											<br>
											ชื่ออุปกรณ์ :
											<span style="font-weight: bold; color: #4fa4ff;">
												<?= $rp_case_name; ?>
											</span>

											<br>
										</td>

										<td style="font-size: 12px;">

											ปัญหา/งานซ่อม :
											<span style="font-weight: bold;">
												<?= $rp_case_detail; ?>
											</span>
											<br>
										</td>

										<td align="" style="font-size: 12px;">

											<?php
											$status = $rp_case->c_name;

											echo "สถานะ : ";
											if ($status == 'รอดำเนินการ') {
												echo '<span style="color: #4669e8; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'กำลังดำเนินการ') {
												echo '<span style="color: orange; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'เสร็จสิ้น') {
												echo '<span style="color: #35b000; font-weight: bold;">' . $status . '</span>';
											} elseif ($status == 'ยกเลิก') {
												echo '<span style="color: red; font-weight: bold;">' . $status . '</span>';
											} else {
												echo $status;
											}
											echo "<br>";

											if ($status != 'รอดำเนินการ') {
												echo "ผู้ดำเนินงาน : ";
												echo '<span style="font-weight: ;">' . $rp_update_name . '</span>';
											}
											?>
											<br>
										</td>

										<td align="center">
											<a href="#" class="btn btn-info btn-xs" data-toggle="modal"
												data-target="#popupModal" data-username="<?= $rp_case->rp_case_username; ?>"
												data-type="<?= $rp_case_type_name; ?>"
												data-name_case="<?= $rp_case->rp_case_name; ?>"
												data-detail="<?= $rp_case->rp_case_detail; ?>"
												data-tel="<?= $rp_case->rp_case_usertel; ?>"
												data-email="<?= $rp_case->rp_case_useremail; ?>"
												data-add="<?= $rp_case->rp_add_date; ?>"
												data-edit="<?= $rp_case->rp_edit_date; ?>"
												data-status="<?= $rp_case->c_name; ?>"
												data-image="<?= base64_encode($rp_case->image_data); ?>"
												data-mime="<?= $rp_case->image_mime_type; ?>"
												data-address="<?= $rp_case_address; ?>"
												data-upname="<?= $rp_update_name; ?>"
												data-updetail="<?= $rp_update_detail; ?>">

												เพิ่มเติม
											</a>
										</td>

										<td align="center">
											<a class="btn btn-warning btn-xs" onclick="onEdit(<?= $rp_id ?>, <?= $id ?>)">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
									</tr>
									<?php
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.content -->

	<style>
		.table {
			width: 100%;
			/* ปรับความกว้างตาราง */
			background-color: #fff;
			/* สีพื้นหลังของตาราง */
			color: #333;
			/* สีตัวอักษร */
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #ddd;
			/* ขอบเส้นขอบของเซลล์ */
			padding: 8px;
			/* ระยะห่างของเนื้อหาภายในเซลล์ */
		}

		.table-bordered th {
			background-color: #f2f2f2;
			/* สีพื้นหลังของหัวข้อคอลัมน์ */


		}

		.table-bordered th.text-left {
			text-align: left;
		}

		.small-cell {
			width: 25%;
			max-width: 150px;
			/* หรือค่าที่คุณต้องการ */
		}
	</style>

	<!-- Modal -->
	<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

			<div class="modal-content">
				<div class="modal-header">
					<p style="font-size: 18px; background-color: #f2f2f2; padding: 10px;"><i class="fa fa-pencil"></i>
						รายละเอียดรายการแจ้งซ่อม</p>
				</div>


				<div class="modal-body scrollable">
					<p style="font-size: 15px; background-color: #57a2ff; padding: 3px;"><i class="fa fa-pencil"></i>
						ข้อมูลแจ้งซ่อม</p>

					<table class="table table-bordered">
						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">รายงานแจ้งซ่อม</th>

							<td style="font-size: 15px;">
								<i class="fa fa-wrench"></i>
								ประเภทงานซ่อม : &nbsp;&nbsp;<span id="popupType"></span>
								<br>
								ชื่ออุปกรณ์ : &nbsp;&nbsp;<span id="popupName_case"></span>
								<br>
								ปัญหา/งานซ่อม : &nbsp;&nbsp;<span id="popupDetail"></span>
								<br>

							</td>
						</tr>


						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">วันที่แจ้งซ่อม</th>
							<td style="font-size: 15px;">
								<i class="fa fa-calendar"></i>

								&nbsp;&nbsp;<span id="popupAdd"></span>
								<br>


							</td>
						</tr>


						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ผู้แจ้งซ่อม</th>
							<td style="font-size: 15px;">
								<i class="fa fa-user"></i>


								&nbsp;&nbsp;<span id="popupUsername"></span>
								<br>


							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">สถานที่</th>
							<td style="font-size: 15px;">
								<i class="fa fa-map-marker"></i>


								&nbsp;&nbsp;<span id="popupAddress"></span>
								<br>


							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">สถานะ</th>
							<td style="font-size: 15px;">
								<!-- <i class="fa fa-check-circle"></i> -->


								&nbsp;&nbsp;<span id="popupStatus"></span>
								<br>


							</td>
						</tr>


						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">ช้อมูลติดต่อ</th>
							<td style="font-size: 15px;">

								<i class="fa fa-envelope"></i> &nbsp;&nbsp;<span id="popupEmail"></span>
								<br>
								<i class="fa fa-phone"></i> &nbsp;&nbsp;<span id="popupTel"></span>
								<br>


							</td>
						</tr>

						<tr>
							<th class="text-left small-cell" style="font-size: 15px;">รูปภาพ </th>
							<td style="font-size: 15px;">

								&nbsp;<span id="popupImage"></span>
								<br>


							</td>
						</tr>

					</table>

					<div class="modal-body scrollable">
						<p style="font-size: 22px; background-color: #2aad2a; padding: 3px;"><i
								class="fa fa-pencil"></i>
							ข้อมูลดำเนินการ</p>

						<table class="table table-bordered">
							<tr>
								<th class="text-left small-cell" style="font-size: 15px;">วันที่ดำเนินการ</th>
								<td style="font-size: 15px;">
									<i class="fa fa-map-marker"></i>

									&nbsp;&nbsp;<span id="popupEdit"></span>

								</td>
							</tr>

							<tr>
								<th class="text-left small-cell" style="font-size: 15px;">ผู้ดำเนินการ</th>
								<td style="font-size: 15px;">
									<i class="fa fa-user"></i>

									&nbsp;&nbsp;<span id="popupUpName"></span>
								</td>
							</tr>
							<tr>
								<th class="text-left small-cell" style="font-size: 15px;">สาเหตุ/วิธีการแก้ไข</th>
								<td style="font-size: 15px;">

									&nbsp;&nbsp;<span id="popupUpDetail"></span>
								</td>
							</tr>


						</table>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
					</div>
				</div>
			</div>
		</div>

	</div><!-- /.content-wrapper -->

	<script>
		$(document).ready(function () {
			// Function to set the text color based on the data-status value
			function setStatusColor(status) {
				var spanStatus = $('#popupStatus');
				if (status === 'รอดำเนินการ') {
					spanStatus.text(status).css('color', '#4669e8');
				} else if (status === 'กำลังดำเนินการ') {
					spanStatus.text(status).css('color', 'orange');
				} else if (status === 'เสร็จสิ้น') {
					spanStatus.text(status).css('color', '#35b000');
				}
				else if (status === 'ยกเลิก') {
					spanStatus.text(status).css('color', 'red');
				}
			}

			// Trigger when the modal is about to be shown
			$('#popupModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var username = button.data('username');
				var type = button.data('type');
				var name_case = button.data('name_case');
				var detail = button.data('detail');
				var tel = button.data('tel');
				var email = button.data('email');
				var add = button.data('add');
				var edit = button.data('edit');
				var status = button.data('status');
				var image_data = button.data('image');
				var mime_type = button.data('mime');
				var rp_case_address = button.data('address');
				var rp_update_name = button.data('upname');
				var rp_update_detail = button.data('updetail');


				setStatusColor(status); // Call the function to set the color based on status

				$('#popupUsername').text(username);
				$('#popupType').text(type);
				$('#popupName_case').text(name_case);
				$('#popupDetail').text(detail);
				$('#popupTel').text(tel);
				$('#popupEmail').text(email);
				$('#popupAdd').text(add);
				$('#popupEdit').text(edit);
				$('#popupStatus').text(status);
				$('#popupAddress').text(rp_case_address);
				$('#popupUpName').text(rp_update_name);
				$('#popupUpDetail').text(rp_update_detail);

				var imgTag = '<img src="data:' + mime_type + ';base64,' + image_data + '" class="img-responsive" style="max-width: 50%; height: auto;">';
				$('#popupImage').html(imgTag);

			});
		});

		function onEdit(rp_id, id) {
			window.location = "<?= base_url(); ?>repair_system/employee/manage_data_employee/" + rp_id + "/" + id;
		}

	</script>
