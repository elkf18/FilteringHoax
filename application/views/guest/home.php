<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php $this->load->view("guest/_partials/head.php") ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script>
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <!-- Humberger Begin -->
  <!-- Humberger End -->

  <!-- Header Section Begin -->
  <?php $this->load->view("guest/_partials/header.php") ?>
  <!-- Header Section End -->

  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
      <div class="row mt-4">
        <div class="col-lg-12">
          <div class="jumbotron " style="border: 1px solid #3DD880">
            <div class="row">
              <div class="col-md-7 ml-5">
                <div class="hero__text">
                  <span>FILTERING HOAX</span>
                  <h2>Dinas Kesehatan<br />Kabupaten Madiun</h2>
                  <p>Pusat informasi seputar kesehatan masyarakat Kabupaten Madiun</p>
                  <a href="#section1" class="primary-btn">BACA SELENGKAPNYA</a>
                </div>
              </div>
              <div class="col-md-4 my-3" style="max-height:0;">
                <img src=" <?php echo base_url('assets/image/dokter.png') ?>" style="margin-top: 35px;" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->
  <!-- Featured Section Begin -->
  <section class="featured spad" id="section1">
    <div class="container" style="margin-top: -100px;">
      <div class="row">
        <div class="col-lg-12 mt-5">
          <div class="section-title">
            <h2>Berita Terkini</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <li class="active" data-filter="*">All</li>
              <li data-filter=".fakta">Fakta</li>
              <li data-filter=".hoax">Hoax</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
        <?php foreach ($Home as $ho) : ?>
          <?php
          if ($ho->id_kategori == 1) {
          ?>
            <div class="col col-md-4 mix fakta">
              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="<?= $ho->gambar ?>" style="min-width:105px; min-height:125px; max-width:115%; max-height:100%;" alt="foto">
                  <div class="featured__item__pic__hover">
                    <div>
                      <a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><i class="fa fa-bars"></i></a>
                    </div>
                  </div>
                  <!-- <ul class="featured__item__pic__hover">
                  <li><a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><i class="fa fa-bars"></i></a></li>
                </ul> -->
                </div>
                <div class="blog__item__text">
                  <ul>
                    <li><i class="fa fa-calendar-o"></i>
                      <?php echo $ho->tgl_berita ?></li>
                  </ul>
                  <h5><a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><?php echo $ho->judul ?></a></h5>
                  <p><?php
                      echo strlen($ho->isi) >= 80 ?
                        substr($ho->isi, 0, 80) :
                        $ho->isi; ?>
                    <a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>">
                      </i> [Read More]
                  </p>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="col col-md-4 mix hoax">
              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="<?= $ho->gambar ?>" style="min-width:105px; min-height:125px; max-width:115%; max-height:100%;" alt="foto">
                  <div class="featured__item__pic__hover">
                    <div>
                      <a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><i class="fa fa-bars"></i></a>
                    </div>
                  </div>
                  <!-- <ul class="featured__item__pic__hover">
                  <li><a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><i class="fa fa-bars"></i></a></li>
                </ul> -->
                </div>
                <div class="blog__item__text">
                  <ul>
                    <li><i class="fa fa-calendar-o"></i>
                      <?php echo $ho->tgl_berita ?></li>
                  </ul>
                  <h5><a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>"><?php echo $ho->judul ?></a></h5>
                  <p><?php
                      echo strlen($ho->isi) >= 80 ?
                        substr($ho->isi, 0, 80) :
                        $ho->isi; ?>
                    <a href="<?php echo site_url('home/detail/' . $ho->id_berita) ?>">
                      </i> [Read More]
                  </p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
  <!-- Featured Section End -->
  <!-- Banner End -->

  <!-- Footer Section Begin -->
  <?php $this->load->view("guest/_partials/footer.php") ?>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <?php $this->load->view("guest/_partials/js.php") ?>

</body>

</html>