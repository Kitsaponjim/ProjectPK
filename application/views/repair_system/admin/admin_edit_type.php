<?php

$sql = "SELECT * FROM rp_type WHERE id_type ='$id_type'";
$row = $this->db->query($sql)->row();
$id_type = @$row->id_type;
$rp_name_type = @$row->rp_name_type;

?>

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
											class="fa fa-pencil"></i> ข้อมูลรายการประเภทงานแจ้งซ่อม</p>

									<br>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>ประเภทงานแจ้งซ่อม</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="cus_name" name="cus_name"
												class="form-control rounded-0 custom-placeholder"
												placeholder="<?= $rp_name_type ?>" readonly>

										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-4 control-label">
											<label></strong>แก้ไข</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="edit_name_type" name="edit_name_type"
												class="form-control rounded-0" placeholder="กรอกชื่อที่ต้องการแก้ไข"
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
								value="บันทึกข้อมูล" onclick="onSave(<?= $id_type ?>)">

							&nbsp;&nbsp;

							<input type="button" value="กลับ" class="btn btn-danger rounded-0"
								onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list_type'">
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

	function onSave(id_type) {
		var edit_name_type = $('#edit_name_type').val();
		if (confirm('คุณต้องการบันทึกข้อมูลใช่หรือไหม')) {
			if (id_type == '') {
				alert('กรอกข้อมูลประเภทงานซ้อม');
				$("#edit_name_type").focus();
				return false;
			} else {
				var pmeters = 'id_type=' + <?= $id_type ?> + '&edit_name_type=' + edit_name_type;
				pmeters = pmeters.replace("undefined", "");

				$.ajax({
					url: "<?= base_url(); ?>repair_system/admin/admin_update_type",
					type: 'POST',
					data: pmeters,
					async: false,
					success: function (data) {
						alert(data);
						$("#btnSave").attr("disabled", true);
						window.location = "<?= base_url(); ?>repair_system/admin/admin_list_type";
					}
				});
				return false;

			}
		}

	}
</script>
