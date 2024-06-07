<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view("guest/_partials/head.php") ?>
</head>

<body>
    <!-- Header Section Begin -->
    <?php $this->load->view("guest/_partials/header.php") ?>
    <!-- Header Section End -->
    <section class="breadcrumb-section set-bg mt-3" data-setbg=" <?php echo base_url('assets/image/header2.jpg') ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Dinas Kesehatan </h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo base_url('home/index/') ?>">Beranda</a>
                            <span>Kontak</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section Begin -->
    <section class=" contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 mb-5 text-center">
                    <h4 style="text-align: center;">Kontak Dinas Kesehatan</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Kontak</h4>
                        <p>0351-462728</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Alamat</h4>
                        <p>Jl. Raya Solo, Kec. Jiwan, Madiun</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>@madiunkab.go.id</p>
                    </div>
                </div>
            </div>
    </section>
    <section class=" contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-3 col-sm-6 mb-5 text-center">
                    <h4 style="text-align: center;">Bekerjasama dengan Tim FiveG</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Kontak</h4>
                        <p>088230361351</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>klp3pbl@gmail.com</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1650613462149!6m8!1m7!1sDbsSW0ai83Gj_kG-wdK76g!2m2!1d-7.625019036415351!2d111.4952883164039!3f5.1131422410716!4f2.484917908723773!5f0.4000000000000002" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Dinas Kesehatan Kabupaten Madiun</h4>
                <ul>
                    <li>0351-462728</li>
                    <li>Jl. Raya Solo, Kec. Jiwan, Madiun</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Map End -->
    <?php $this->load->view("guest/_partials/footer.php") ?>
    <!-- Js Plugins -->
    <?php $this->load->view("guest/_partials/js.php") ?>

</body>

</html>