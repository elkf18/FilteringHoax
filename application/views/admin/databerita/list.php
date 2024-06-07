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
						</div>

						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Tabel Data Berita</h4>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<div class="table-responsive">
										<table class="table table-hover text-center" id="dataTable">
											<thead>
												<tr style="background-color: #57B657; color:white;">
													<th>No</th>
													<th>Judul</th>
													<th>Kategori</th>
													<!-- <th>Gambar</th> -->
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($DataBerita as $datberi) : ?>
													<tr>
														<td width="10">
															<?php echo $no++ ?>
														</td>
														<td width="200">
															<?php
																echo strlen($datberi->judul) >= 60 ?
																substr($datberi->judul, 0, 60) :
																$datberi->judul;
															?>
														</td>
														<td width="50">
															<?php
															if ($datberi->id_kategori == 1) {
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
														<!-- <td width="50">
															<img src="<?= base_url() ?>assets/gambarberita/<?= $datberi->gambar ?>" style="min-width:105px; min-height:125px; max-width:115%; max-height:100%;" alt="foto">
														</td> -->
														<td width="150">
															<a href="<?php echo site_url('databerita/detail/' . $datberi->id_berita) ?>" class="btn btn-outline-info btn-fw ml-2 w-50">
																<i class="mdi mdi-format-align-justify"></i> Detail
															</a><br><br>
															<a href="<?php echo site_url('databerita/edit/' . $datberi->id_berita) ?>" class="btn btn-outline-warning btn-fw ml-2 w-50">
																<i class="mdi mdi-lead-pencil"></i> Ubah
															</a><br><br>
															<a onclick="deleteConfirm('<?php echo site_url('databerita/delete/' . $datberi->id_berita) ?>')" href="#!" class="btn btn-inverse-danger btn-fw ml-2 w-50">
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
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>

</body>

</html>
