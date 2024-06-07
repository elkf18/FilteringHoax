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
                            <span>Berita</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-details spad">
        <div class="container" style="margin-top: -70px;">
            <?php foreach ($Home as $ho) : ?>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home/index/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home/index/#section1') ?>">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $ho->judul ?></li>
                    </ol>
                </nav>
                <!-- <a href="<?php echo site_url('home/index/') ?>" class="btn btn-outline-info btn-fw">Kembali</a> -->
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-8 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <i class="fa fa-calendar-o" style="font-size: 18px;"></i> <?php echo $ho->tgl_berita ?>
                            <div class="blog__details__widget" >
                                <ul>
                                    <li><span style="font-size: 18px;">Kategori berita :</span>
                                        <?php
                                        if ($ho->id_kategori == 1) {
                                        ?>
                                            <span class="badge badge-success" style="font-size: 18px;">Fakta</span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="badge badge-warning" style="font-size: 18px;">Hoax</span>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="mt-3" style="text-align: center;"><?php echo $ho->judul ?></h3>
                            <img src="<?= $ho->gambar ?>" style="min-width:70%; min-height:80%; max-width:70%; max: height 80%; display:block; margin: auto; padding-bottom: 30px;" alt="">
                            <p style="text-align: justify; margin-top: -20px;"><?php echo $ho->isi ?></p>
                            <p style="margin-bottom: -5px;"><b>Sumber berita :</b></p>
                            <a href="<?php echo $ho->sumber ?>" target = "_blank" ><p><?php echo $ho->sumber ?></p></a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-lg-4 col-md-5 order-md-1 order-2" style="margin-top: -55px;">
                    <div class="blog__sidebar">
                        <!-- <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div> -->

                        <div class="blog__sidebar__item">
                            <h4>Berita Terbaru</h4>
                            <div class="blog__sidebar__recent">
                                <?php foreach ($Homee as $hoo) : ?>
                                    <a href="<?php echo site_url('home/detail/' . $hoo->id_berita) ?>" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__text">
                                            <img src="<?= $hoo->gambar ?>" style="max-width:50%; max: height 55%; padding-bottom: 5px;" alt="">
                                            <h6><?php echo $hoo->judul ?></h6>
                                            <span><i class="fa fa-calendar-o"></i>  <?php echo $hoo->tgl_berita ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>

    </section>
    <!-- Footer Section Begin -->
    <?php $this->load->view("guest/_partials/footer.php") ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php $this->load->view("guest/_partials/js.php") ?>

</body>

</html>