<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-wrench"></i> รายการสมาชิก
		</h1>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6 d-flex justify-content-between">
						<a class="btn btn-success" href="<?= site_url('repair_system/admin/admin_add_user'); ?>"
							role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มรายการสมาชิก</a>

						<br>
					</div>
					<div class="col-sm-12">
						<br>
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 5%; text-align: center;">ID
									</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 25%; text-align: center;">
										ชื่อ-นามสกุล</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 15%; text-align: center;">
										ข้อมูลติดต่อ</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 5%; ">เบอร์โทรศัพท์</th> -->

									<th tabindex="0" rowspan="1" colspan="1" style="width: 10%; text-align: center;">
										สถานะ</th>
									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;">เพิ่มเติม</th> -->
									<th tabindex="0" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
										แก้ไขรหัสผ่าน</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">
										แก้ไข</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">ลบ
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($query as $value) {
									$id = $value->id;
									$user_login = $value->user_login;
									$user_name = $value->user_name;

									$user_email = $value->user_email;
									$user_tel = $value->user_tel;
									$user_status_repair = $value->user_status_repair;
									$n_status = $value->n_status;

									?>

									<tr role="row">
										<td style="font-size: 12px;">
											<?= $i; ?>
										</td>

										<td style="font-size: 12px;">
											<?= $user_name; ?>
										</td>


										<td style="font-size: 12px;">
											อีเมล :
											<span style="font-weight: bold;">
												<?= $user_email; ?>
											</span>
											<br>

											เบอร์โทรศัพท์ :
											<span style="font-weight: bold; color: #4fa4ff;">
												<?= $user_tel; ?>
											</span>

											<br>
										</td>

										<td style="font-size: 12px;">
											<?= $n_status; ?>
										</td>


										<td align="center" style="font-size: 12px;">
											<a class="btn btn-primary btn-xs" onclick="onEdit_pass(<?= $id ?>)">
												<i class="fa fa-key"></i>
											</a>
										</td>

										<td align="center" style="font-size: 12px;">
											<a class="btn btn-warning btn-xs" onclick="onEdit(<?= $id ?>)">
												<i class="fa fa-edit"></i>
											</a>
										</td>


										<td align="center" style="font-size: 12px;">
											<a class="btn btn-danger btn-xs" onclick="onDel(<?= $id ?>)">
												<i class="fa fa-trash"></i>
											</a>
										</td>

									</tr>

									<?php $i++;
								} ?>



							</tbody>
						</table>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>

	function onEdit(id) {
		window.location = "<?= base_url(); ?>repair_system/admin/admin_edit_user/" + id;
	}


	function onDel(id) {
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>repair_system/admin/admin_del_user/" + id;
		}

	}
	function onEdit_pass(id) {

		window.location = "<?= base_url(); ?>repair_system/repair/edit_password/" + id;

	}


</script>
