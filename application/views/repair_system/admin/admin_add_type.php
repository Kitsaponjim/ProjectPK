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
						</style>

						<form class="form-horizontal">

							<div class="box-body">
								<div class="col-sm-6">
									<p style="font-size: 17px; background-color: #f2f2f2; padding: 4px;"><i
											class="fa fa-pencil"></i> เพิ่มประเภทงานแจ้งซ่อม</p>

									<br>
									<div class="form-group">
										<div class="col-sm-5 control-label">
											<label><strong class="text-danger">*</strong>เพิ่มประเภทงานแจ้งซ่อม
												:</label>
										</div>

										<div class="col-sm-7">
											<input type="text" id="rp_type" name="rp_type"
												class="form-control rounded-0" placeholder="ประเภทงาน">

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
						<input type="button" value="กลับ" class="btn btn-danger rounded-0"
							onclick="window.location='<?= base_url(); ?>repair_system/admin/admin_list_type'">

					</div>
				</div>

				<br>
				<br>

			</div><!-- /.box-body -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
	function onSave() {
		var rp_type = $("#rp_type").val();
		// alert(rp_type);
		if (rp_type == "") {
			alert("กรอก ประเภทงานแจ้งซ่อม ");
			$("#rp_type").focus();
			return false;
		}
		else {
			var pmeters = 'rp_type=' + rp_type;
			pmeters = pmeters.replace("undefined", "");

			$.ajax({
				url: "<?= base_url(); ?>repair_system/admin/add_type",
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

</script>
