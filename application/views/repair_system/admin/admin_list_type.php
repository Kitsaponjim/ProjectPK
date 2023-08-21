<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-wrench"></i> รายการประเภทงานแจ้งซ่อมทั้งหมด
		</h1>
	</section>

	<section class="content">


		<div class="box">
			<div class="box-body">
				<div class="row">

					<div class="col-sm-6 d-flex justify-content-between">
						<a class="btn btn-success" href="<?= site_url('repair_system/admin/admin_add_type'); ?>"
							role="button"><i class="fa fa-fw fa-plus-circle"></i> เพิ่มประเภทงานซ่อม</a>

						<br>
					</div>
					<div class="col-sm-12">
						<br>
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid"
							aria-describedby="example1_info">
							<thead>
								<tr role="row" class="info">
									<th tabindex="0" rowspan="1" colspan="1" style="width: 3%; text-align: center;">ID
									</th>
									<th tabindex="0" rowspan="1" colspan="1" style="width: 45%; ">
										รายการประเภทงานแจ้งซ่อม</th>

									<!-- <th tabindex="0" rowspan="1" colspan="1" style="width: 7%;">เพิ่มเติม</th> -->
									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">
										แก้ไข</th>

									<th tabindex="0" rowspan="1" colspan="1" style="width: 4%; text-align: center;">ลบ
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($query as $value) {
									$id_type = $value->id_type;
									$rp_type = $value->rp_type;

									$rp_name_type = $value->rp_name_type;
									?>

									<tr role="row">
										<td align="center" style="font-size: 12px;">
											<?= $i; ?>
										</td>

										<td align="" style="font-size: 12px;">
											<?= $rp_name_type; ?>
										</td>


										<td align="center" style="font-size: 12px;">
											<a class="btn btn-warning btn-xs" onclick="onEdit(<?= $id_type ?>)">
												<i class="fa fa-edit"></i>
											</a>
										</td>
										<td align="center" style="font-size: 12px;">
											<a class="btn btn-danger btn-xs" onclick="onDel(<?= $id_type ?>)">
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

	function onEdit(id_type) {
		window.location = "<?= base_url(); ?>repair_system/admin/admin_edit_type/" + id_type;
	}

	function onDel(id_type) {
		// alert(id_type);
		if (confirm("คุณต้องการ ลบ ใช่หรือไม่")) {
			window.location = "<?= base_url(); ?>repair_system/admin/admin_del_type/" + id_type;
		}
	}


</script>
