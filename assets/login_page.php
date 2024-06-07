<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo2.png') ?>" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/login7/fonts/icomoon/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login7/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login7/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login7/css/style.css') ?>">
    <title>Login Admin</title>
  </head>
  <body>
    <div class="content" style="padding-top: 38px;">
    <div class="container">
        <div class="col" style="width: 150px; height: 80px; padding-bottom: 100px;">
          <img src="<?php echo base_url('assets/image/logo1.png') ?>" alt="Image" class="img-fluid">
        </div>
      <div class="row">
        <div class="col-md-5" style="margin-right: -35px; margin-left: 110px; border-radius:2%; background-color:#28a745; width:200px;">
          <img src="<?php echo base_url('assets/image/orang.png') ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents" style="padding-top: 40px;">
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
              <h3>LOGIN</h3>
              <p class="mb-4">Silahkan Login Untuk Mengatur Website Filtering Hoax</p>
            </div>
            <form action="<?= site_url('login') ?>" method="POST">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="form-group last mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="mt-4">
                <input type="submit" value="Login" class="btn btn-block btn-success">
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  <p style="text-align: center; margin-top: -50px;">Copyright © <?php echo Date('Y') . " " . SITE_NAME ?></p>
  
    <script src="<?php echo base_url('assets/login7/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/login7/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/login7/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/login7/js/main.js') ?>"></script>
  </body>
</html>