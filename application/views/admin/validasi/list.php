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
							<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success" role="alert">
									<?php echo $this->session->flashdata('success'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
										<span aria-hidden="true">&times;</span> 
									</button>
								</div>
								<?php $this->session->unset_userdata('success') ?>
							<?php endif; ?>
						</div>
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tabel Validasi Berita</h4>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<div class="table-responsive">
										<table class="table table-hover text-center" id="dataTable">
											<thead>
												<tr style="background-color: #57B657; color:white;">
													<th>No</th>
													<th>Judul</th>
													<th>Kategori</th>
													<th>Tgl Filtering</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($Validasi as $vali) : ?>
													<tr>
														<td width="10">
															<?php echo $no++ ?>
														</td>
														<td width="150">
															<?php
																echo strlen($vali->judul) >= 60 ?
																substr($vali->judul, 0, 60) :
																$vali->judul;
															?>
														</td>
														<td width="50">
															<?php
															if ($vali->id_kategori == 1) {
															?>
																<span class="badge badge-success">Fakta</span>
															<?php
															} else {
															?>
																<span class="badge badge-warning">Hoax</span>
															<?php 
															}
															?>
														</td>
														<td width="50">
															<?php echo dateindo($vali->tgl_filtering) ?>
														</td>
														<td width="150">
															<a href="<?php echo site_url('validasi/detail/' . $vali->id_berita) ?>" class="btn btn-outline-info btn-fw w-100">
																<i class="mdi mdi-format-align-justify" ></i> Detail
															</a><br><br>
															<a onclick="validasiConfirm('<?php echo site_url('validasi/validasi/' . $vali->id_berita) ?>')" href="#!" class="btn btn-inverse-secondary btn-fw w-100">
																<i class="mdi mdi-clipboard-check" ></i> Validasi
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

	<!-- partial modal->
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
		function validasiConfirm(url) {
			$('#btn-validasi').attr('href', url);
			$('#validasiModal').modal();
		}
	</script>

</body>

</html>
