<header class="header">
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="header__top__left">
            <ul>
              <li><i class="fa fa-envelope"></i> @madiunkab.go.id</li>
              <li>Website Filtering Kerjasama UNS dengan Dinas Kesehatan</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header__top__right">
            <div class="header__top__right__social">
              <a href="https://www.instagram.com/dinkeskabmadiun" target = "_blank"><i class="fa fa-instagram"></i></a>
              <a href="https://youtube.com/user/dinkeskabmadiun" target = "_blank"><i class="fa fa-youtube"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-3 ">
      <div class="col-lg-1">
        <div class="header__logo" style="width: 100px; height: 30px;">
          <a href="<?php echo base_url('home/index') ?>"><img src="<?php echo base_url('assets/image/logo3.png') ?>" alt=""></a>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <nav class="header__menu">
          <ul>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'index' ? 'active': '' ?>"><a href="<?php echo base_url('home/index/') ?>">Beranda</a></li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'detail' ? 'active': '' ?>"><a href="<?php echo base_url('home/index/#section1') ?>">Berita</a></li>
            <li class="nav-item <?php echo $this->uri->segment(1) == 'kontak' ? 'active': '' ?>"><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
            <li><a href=" https://dinkes.madiunkab.go.id/" target = "_blank">Website Resmi</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-md-3">
        <div class="hero__search__phone mt-2">
          <div class="hero__search__phone__icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <div class="hero__search__phone__text">
            <h5>Alamat</h5>
            <span>Jl. Raya Solo, Kec. Jiwan,<br> Madiun</span>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="hero__search__phone mt-2 ">
          <div class="hero__search__phone__icon">
            <i class="fa fa-phone"></i>
          </div>
          <div class="hero__search__phone__text">
            <h5>Kontak</h5>
            <span>0351-462728</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>