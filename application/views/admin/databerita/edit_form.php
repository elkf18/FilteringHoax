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
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Edit Data Berita</h3>
									<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
									<a href="<?php echo site_url('databerita') ?>" class="btn btn-outline-info btn-fw">Kembali</a>
									<?php foreach ($DataBerita as $datberi) : ?>
										<form class="forms-sample" action="<?php echo site_url('DataBerita/edit'); ?>" method="POST" enctype="multipart/form-data">
											<br>
											<input type="hidden" name="id" value="<?php echo $datberi->id_berita; ?>" />
											<div class="form-group">
												<label for="judul">Judul</label>
												<input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $datberi->judul; ?>" required />
											</div>
											<div class="form-group">
												<label for="tgl_berita">Tgl Berita</label>
												<input type="datetime" class="form-control" name="tgl_berita" id="tgl_berita" placeholder="Tgl Berita" value="<?php echo $datberi->tgl_berita; ?>" readonly />
											</div>
											<div class="form-group">
												<label for="tgl_filtering">Tgl Filtering</label>
												<input type="datetime" class="form-control" name="tgl_filtering" id="tgl_filtering" placeholder="Tgl Filtering" value="<?php echo $datberi->tgl_filtering; ?>" readonly />
											</div>
											<div class="form-group">
												<label for="kategori">Kategori</label>
												<input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $datberi->kategori; ?>" readonly />
											</div>
											<input type="hidden" name="id_kategori" value="<?php echo $datberi->id_kategori; ?>" />
											<div class="form-group">
												<label for="isi">Isi Berita</label>
												<textarea class="form-control <?php echo form_error('isi') ? 'is-invalid':'' ?>"
												name="isi" id="isi" placeholder="Isi Berita"><?php echo $datberi->isi ?></textarea>
												<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
												<script>CKEDITOR.replace( 'isi' );</script>
											</div>
											<div class="form-group">
												<label for="sumber">Sumber</label>
												<input type="text" class="form-control" name="sumber" id="sumber" placeholder="Sumber" value="<?php echo $datberi->sumber; ?>" required />
											</div>
											<div class="form-group">
												<label for="gambar">Gambar Berita</label>
												<div><img src="<?php echo $datberi->gambar ?>" border="0" width="250px" height="250px" /></div>
												<input type="text" class="form-control" name="gambar" id="gambar" placeholder="gambar" style="margin-top: 10px;" value="<?php echo $datberi->gambar; ?>" required />
											</div>
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
