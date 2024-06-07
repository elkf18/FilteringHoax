<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>
	<div class="container-scroller">
		<!-- partial navbar -->
		<?php $this->load->view("admin/_partials/navbar.php") ?>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial sidebar -->
			<?php $this->load->view("admin/_partials/sidebar.php") ?>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<!-- <div class="container-fluid">
							<?php if (validation_errors()) : ?>
								<div class="alert alert-danger" role="alert">
									<?php echo validation_errors(); ?>
								</div>
							<?php endif; ?>
						</div> -->
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Edit Data Admin</h3>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<a href="<?php echo site_url('user') ?>" class="btn btn-outline-info btn-fw">Kembali</a>
									<?php foreach ($User as $akun) : ?>
										<form class="forms-sample" action="<?php echo site_url('user/edit/'.$akun->id_admin); ?>" method="POST">
											<br>
											<input type="hidden" name="id" value="<?php echo $akun->id_admin; ?>" />
											<div class="form-group">
												<label for="username">Username</label>
												<input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" name="username" id="username" placeholder="Username" value="<?= $this->input->post('username') ?? $akun->username; ?>" required />
												<span style="color: red;"><?php echo form_error('username'); ?></span>
											</div>
											<div class="form-group">
												<input type="hidden" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $akun->password; ?>" required>
											</div>
											<input type="hidden" name="role" value="<?php echo $akun->role; ?>" />
											<button class="btn btn-primary float-right mr-2" style="background-color: #f58924; border:black; type="submit" name="btn"> Simpan </button>
										</form>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
					<!-- partial footer -->
					<?php $this->load->view("admin/_partials/footer.php") ?>
					<!-- partial -->
				</div>
				<!-- content-wrapper ends -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- partial modal-->
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<!-- partial -->
	<!-- partial js -->
	<?php $this->load->view("admin/_partials/js.php") ?>
	<!-- partial -->
</body>

</html>
