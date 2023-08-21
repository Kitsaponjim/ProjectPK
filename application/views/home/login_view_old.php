<!-- ############################################ -->

<section class="vh-100">  <!-- ความสูงเท่ากับความสูงของหน้าจอ -->
	<div class="container-fluid">

		<div class="row d-flex justify-content-center align-items-center">

			<div class="col-md-9 col-lg-6 col-xl-5">

				<!-- <img src="repair.png"
					class="img-fluid" alt="Sample image"> -->

				<img src="<?php echo base_url('img'); ?>/repair.png" alt="" width="100%">

			</div>

			<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
				<h3>Login</h3>

				<form action="<?= site_url('login/ck_login_choice'); ?>" method="post" class="form-horizontal">

					<!-- Email input -->
					<div class="form-outline mb-4">
						<label>Username</label>
						
						<input type="email" name="user_login" class="form-control" required minlength="3"
							placeholder="Email" value="<?= set_value('user_login'); ?>">
						<span class="fr">
							<?= form_error('user_login'); ?>
						</span>

					</div>

					<!-- Password input -->
					<div class="form-outline mb-3">
						<!-- <input type="password" id="form3Example4" name="password" required class="form-control form-control-lg"
							placeholder="Enter password" />
						<label class="form-label" for="form3Example4">Password</label> -->
						<label>Password</label>
						<input type="password" name="user_password" class="form-control" required
							placeholder="Password" value="<?= set_value('user_password'); ?>">
						<span class="fr">
							<?= form_error('user_password'); ?>
						</span>




					</div>

					<!-- Checkbox -->
					<div class="form-check mb-0">
						<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
						<!-- <label class="form-check-label" for="form2Example3">
							Remember me
						</label> -->

						<a href="#!" class="text-body">Forgot password?</a>

					</div>


					<br>

					<div class="form-group col col-md-5">
						<button type="submit" class="btn btn-primary" style="width: 100%">Login</button>
					</div>

			</div>

			<!-- <div class="form-group col col-md-5">
					<button type="submit" class="btn btn-primary"  style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
				</div>
				 -->
			</form>

		</div>
	</div>

	<div
		class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
		<!-- Copyright -->
		<div class="text-white mb-3 mb-md-0">
			ระบบแจ้งซ่อม
		</div>
		<!-- Copyright -->
	</div>
</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
