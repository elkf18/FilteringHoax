<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo2.png') ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(
    	"assets/login7/fonts/icomoon/style.css"
    ); ?>">
    <link rel="stylesheet" href="<?php echo base_url(
    	"assets/login7/css/owl.carousel.min.css"
    ); ?>">
    <link rel="stylesheet" href="<?php echo base_url(
    	"assets/login7/css/bootstrap.min.css"
    ); ?>">
    <link rel="stylesheet" href="<?php echo base_url(
    	"assets/login7/css/style.css"
    ); ?>">

    <title>Login Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/sb/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/sb/') ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-light">    
    <div class="container">
    <div class="col" style="width: 150px; height: 80px; padding-top: 20px; padding-bottom: 110px;">
          <img src="<?php echo base_url(
          	"assets/image/logo1.png"
          ); ?>" alt="Image" class="img-fluid">
        </div>

        <!-- Outer Row -->
        <div class="row">
        <div class="col-md-5" style="margin-right: -35px; margin-left: 110px; border-radius:2%; background-color:#28a745; width:200px;">
          <img src="<?php echo base_url(
          	"assets/image/orang.png"
          ); ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents" style="padding-top: 80px;">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php $this->session->unset_userdata('error') ?>
                <?php endif; ?>
                                        <h1 class="h3 text-gray-900 text-center">LOGIN</h1>
                                        <h5 class="text-center">Silahkan Login untuk mengatur<br>Website Filtering Hoax</h5>
                                    </div>
                                    <form action="<?= site_url('login') ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                        </div>
                                        <div class="form-group" style="padding-bottom: 10px;">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p style="text-align: center; margin-top: 30px;">Copyright © <?php echo Date('Y') . " " . SITE_NAME ?></p>
    
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/sb/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/sb/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/sb/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/sb/') ?>js/sb-admin-2.min.js"></script>
    
</body>

</html>