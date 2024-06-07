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
						<div class="container-fluid">
							<?php if ($this->session->flashdata('berhasilditambah')) : ?>
								<div class="alert alert-success" role="alert">
									<?php echo $this->session->flashdata('berhasilditambah'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php $this->session->unset_userdata('berhasilditambah') ?>
							<?php endif; ?>

							<?php if ($this->session->flashdata('berhasildiubah')) : ?>
								<div class="alert alert-success" role="alert">
									<?php echo $this->session->flashdata('berhasildiubah'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php $this->session->unset_userdata('berhasildiubah') ?>
							<?php endif; ?>

							<?php if ($this->session->flashdata('berhasildihapus')) : ?>
								<div class="alert alert-success" role="alert">
									<?php echo $this->session->flashdata('berhasildihapus'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php $this->session->unset_userdata('berhasildihapus') ?>
							<?php endif; ?>

							<?php if ($this->session->flashdata('gagaldihapus')) : ?>
								<div class="alert alert-danger" role="alert">
									<?php echo $this->session->flashdata('gagaldihapus'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php $this->session->unset_userdata('gagaldihapus') ?>
							<?php endif; ?>

							<?php if ($this->session->flashdata('tidakdapatdihapus')) : ?>
								<div class="alert alert-danger" role="alert">
									<?php echo $this->session->flashdata('tidakdapatdihapus'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php $this->session->unset_userdata('tidakdapatdihapus') ?>
							<?php endif; ?>
						</div>

						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h2 class="card-title">Tabel Admin</h2>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<div class="table-responsive">
										<div>
											<a class="btn btn-primary float-right ml-3" style="background-color: #f58924; border:black;" href="<?php echo site_url('user/input') ?>"><i class="icon-plus menu-icon"></i>Tambah Admin</a>
										</div>
										<table class="table table-hover text-center" id="dataTable">
											<thead>
												<tr style="background-color: #57B657; color:white;">
													<th>No</th>
													<th>Username</th>
													<th>Dibuat Pada</th>
													<th>Terakhir Login</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($User as $akun) : ?>
													<tr>
														<td width="10">
															<?php echo $no++ ?>
														</td>
														<td width="200">
															<?php echo $akun->username ?>
														</td>
														<td width="50">
															<?php echo dateindo($akun->dibuat) ?>
														</td>
														<td width="50">
															<?php echo dateindo($akun->terakhir_login) ?>
														</td>
														<td width="150">
															<a href="<?php echo site_url('user/edit/' . $akun->id_admin) ?>" class="btn btn-outline-warning btn-fw w-100">
																<i class="mdi mdi-lead-pencil"></i> Ubah
															</a><br><br>
															<a onclick="deleteConfirm('<?php echo site_url('user/delete/' . $akun->id_admin) ?>')" href="#!" class="btn btn-inverse-danger btn-fw w-100">
																<i class="mdi mdi-delete"></i> Hapus
															</a>
														</td>
													</tr>
												<?php endforeach; ?>

											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->

	<!-- partial modal--->
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<!-- partial -->
	<!-- partial js -->
	<?php $this->load->view("admin/_partials/js.php") ?>
	<!-- partial -->

	<script>
		// $(document).ready(function() {
		// 	$('#dataTable').DataTable();
		// });
		$(document).ready(function() {
			$('#dataTable').DataTable( {
				"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
			} );
		} );
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>


</body>

</html>