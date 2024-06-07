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
									<?php foreach ($Validasi as $vali) : ?>
										<a href="<?php echo site_url('validasi') ?>" class="btn btn-outline-info btn-fw ">Kembali</a>
										<a onclick="validasiConfirm('<?php echo site_url('validasi/validasi/' . $vali->id_berita) ?>')" href="#!" class="btn btn-inverse-secondary btn-fw float-right ml-2">
											<i class="mdi mdi-clipboard-check" style="font-size:12px;"></i> Validasi
										</a>
										<div class="mt-4">
											<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
										</div>
										<h6>
											<span class="badge badge-info float-right ml-2">Difiltering pada <?php echo dateindo($vali->tgl_filtering) ?></span>
										</h6>
										<h6>
											<span class="badge badge-primary float-right" style="">Tanggal berita <?php echo $vali->tgl_berita ?></span>
										</h6>
										<h6>
											Kategori berita : 
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
										</h6>
										<h3 style="text-align: center; margin-top: 20px;"><?php echo $vali->judul ?></h3>
										<img src="<?=$vali->gambar?>" style="width: 400px; height: 280px; display:block; margin:auto; padding-top:15px;" alt="foto" >
										<p style="text-align: justify; padding-top:20px;"><?php echo $vali->isi ?></p>
										<p style="padding-top:20px;">Sumber berita :</p>
										<a href="<?php echo $vali->sumber ?>" target = "_blank"><p><?php echo $vali->sumber ?></p></a>
									<?php endforeach; ?>
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
		$(document).ready(function() {
			$('#dataTable').DataTable();
		});
		function validasiConfirm(url) {
			$('#btn-validasi').attr('href', url);
			$('#validasiModal').modal();
		}
	</script>

</body>

</html>
