<?php $this->load->view('user/header'); ?>
<!-- banner  -->
<style type="text/css">
  .banner-profile
  {
    background-image: url("<?= base_url('assets/svg/bannermanual.png') ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
.custom-shape-divider-bottom-1607480490 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.custom-shape-divider-bottom-1607480490 svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 169px;
    transform: rotateY(180deg);
}

.custom-shape-divider-bottom-1607480490 .shape-fill {
    fill: #FFFFFF;
}

/** For tablet devices **/
@media (min-width: 768px) and (max-width: 1023px) {
    .custom-shape-divider-bottom-1607480490 svg {
        width: calc(100% + 1.3px);
        height: 83px;
    }
}

/** For mobile devices **/
@media (max-width: 767px) {
    .custom-shape-divider-bottom-1607480490 svg {
        width: calc(100% + 1.3px);
        height: 73px;
    }
}
</style>
<div style="height: 100vh;" class="row m-0 banner-profile jumbotron jumbotron-fluid position-relative bg-dsw1 justify-content-between">

  <div style="margin-top: -10px;" class="col-md-12 px-5 text-white" data-aos="fade-up">
    <h1 class="display-4 font-weight-bold text-danger text-center">Manual Book</h1>
<!--     <p class="lead my-5 text-dark bg-danger">Pengajuan Wifi Publik untuk fasilitas masyarakat Kota Depok seperti Posyandu, Rumah Ibadah,
     Balai Warga.</p> -->
  </div>
<!--   <div class="col-md-5 m-5 mt-3" data-aos="fade-up">
    <img src="<?= base_url('assets/svg/banner.svg') ?>" class="w-100 h-100" alt="">
  </div> -->
<!-- <div class="custom-shape-divider-bottom-1607480490">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
    </svg>
</div> -->
</div>
</div>

<div class="row justify-content-center m-0 mt-5 mb-5" data-aos="fade-up">
  <div class="m-3 shadow cs-radius col-md-4 px-5 py-4">
    <img src="<?= base_url('assets/svg/book1.jpg') ?>" class="card-img-top" alt="...">
    <p class="text-center">
    </p>
    
  </div>
  <div class="m-3 shadow cs-radius col-md-4 px-5 py-4">
    <img src="<?= base_url('assets/svg/book2.jpg') ?>" class="card-img-top" alt="...">
    <p class="text-center">
    </p>
    
  </div>  <div class="m-3 shadow cs-radius col-md-4 px-5 py-4">
    <img src="<?= base_url('assets/svg/book3.jpg') ?>" class="card-img-top" alt="...">
    <p class="text-center">
    </p>
    
  </div>  <div class="m-3 shadow cs-radius col-md-4 px-5 py-4">
    <img src="<?= base_url('assets/svg/book4.jpg') ?>" class="card-img-top" alt="...">
    <p class="text-center">
    </p>
    
  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>