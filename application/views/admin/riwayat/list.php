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
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tabel Riwayat Validasi</h4>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<div class="table-responsive">
										<table class="table table-hover text-center" id="dataTable">
											<thead>
												<tr style="background-color: #57B657; color:white;">
													<th>No</th>
													<th>Admin</th>
													<th>Judul</th>
													<th>Kategori</th>
													<th>Tgl Validasi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($Riwayat as $riwa) : ?>
													<tr>
														<td width="10">
															<?php echo $no++ ?>
														</td>
														<td width="50">
															<?php echo $riwa->username ?>
														</td>
														<td width="200">
															<?php
																echo strlen($riwa->judul) >= 60 ?
																substr($riwa->judul, 0, 60) :
																$riwa->judul;
															?>
														</td>
														<td width="50">
															<?php
															if ($riwa->id_kategori == 1) {
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
															<?php echo dateindo($riwa->tgl_validasi) ?>
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

	<!-- partial modal-->
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
	</script>

</body>

</html>
