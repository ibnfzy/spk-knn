<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>SDN Bontoramba</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="<?= base_url() ?>/css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <!-- owl stylesheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
  <!--[if lt IE 9]>
      <script src="<?= base_url('') ?>https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="<?= base_url('') ?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout ">
  <!-- loader  -->
  <!-- <div class="loader_bg">
    <div class="loader"><img src="<?= base_url('') ?>images/loading.gif" alt="#" /></div>
  </div> -->
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header">

      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <h1>SDN Bontoramba</h1>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <div class="menu-area">
              <div class="limit-box">
                <nav class="main-menu">
                  <ul class="menu-area-main">
                    <li class="active"> <a href="<?= base_url(''); ?>">Home</a> </li>
                    <li> <a href="<?= base_url('AdminPanel'); ?>">Admin Panel</a> </li>
                    <li><a href="<?= base_url('GuruPanel/'); ?>">Guru Panel</a></li>
                    <li><a href="<?= base_url('WaliPanel'); ?>">Wali Murid Panel</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-6 offset-md-6">
            <div class="location_icon_bottum">
              <ul>
                <li><img src="<?= base_url('') ?>icon/call.png" />(+71)9876543109</li>
                <li><img src="<?= base_url('') ?>icon/email.png" />demo@gmail.com</li>
                <li><img src="<?= base_url('') ?>icon/loc.png" />Location</li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- end header inner -->
  </header>
  <!-- end header -->
  <section class="slider_section">
    <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $getId = array_rand($corousel);
        $getData = $corousel[$getId];
        ?>
        <?php foreach ($corousel as $item): ?>
          <div class="carousel-item <?= ($getData['id_corousel'] == $item['id_corousel']) ? 'active' : ''; ?>">
            <img class="third-slide" src="<?= base_url('uploads/' . $item['gambar']) ?>" alt="Third slide">
            <div class="container">
              <div class="carousel-caption relative">
                <span>Selamat Datang di website SPK KNN</span>
                <h1>SDN Bontoramba</h1>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <i class='fa fa-angle-left'></i>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <i class='fa fa-angle-right'></i>
      </a>
    </div>
  </section>

  <!-- about -->
  <div class="about">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
          <div class="about_img">
            <!-- <figure><img src="<?= base_url('') ?>images/about.png" alt="img" /></figure> -->
          </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
          <div class="about_box">
            <h3>Tentang Web SPK KNN ini</h3>
            <!-- <span>Our Mobile Shop</span> -->
            <p>Website Sistem Pendukung Keputusan (SPK) dengan algoritma KNN pada Sekolah Dasar Negeri Bontoramba
              memiliki peran penting dalam membantu proses pengambilan keputusan di sekolah tersebut. Melalui website
              ini, para pengambil keputusan di sekolah dapat dengan mudah menganalisis data dan informasi terkait, serta
              mengaplikasikan algoritma KNN untuk membantu menentukan keputusan yang tepat, seperti penempatan siswa
              dalam kelas berdasarkan faktor-faktor tertentu. Dengan demikian, website SPK ini membantu mengoptimalkan
              efisiensi pengambilan keputusan dan penempatan di Sekolah Dasar Negeri Bontoramba.</p>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- end about -->

  <hr>
  <!-- footer -->
  <footer>
    <div id="contact" class="footer">
      <div class="copyright">
        <div class="container">
          <p>JULTDEV</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer -->
  <!-- Javascript files-->
  <script src="<?= base_url('') ?>/js/jquery.min.js"></script>
  <script src="<?= base_url('') ?>/js/popper.min.js"></script>
  <script src="<?= base_url('') ?>/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('') ?>/js/jquery-3.0.0.min.js"></script>
  <script src="<?= base_url('') ?>/js/plugin.js"></script>
  <!-- sidebar -->
  <script src="<?= base_url('') ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?= base_url('') ?>/js/custom.js"></script>
  <!-- javascript -->
  <script src="<?= base_url('') ?>/js/owl.carousel.js"></script>
  <script src="<?= base_url('') ?>https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
      });

      $(".zoom").hover(function () {

        $(this).addClass('transition');
      }, function () {

        $(this).removeClass('transition');
      });
    });
  </script>
</body>

</html>