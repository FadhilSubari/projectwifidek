<?php $this->load->view('user/header'); ?>
<!-- banner  -->
<style type="text/css">
  .banner-profile
  {
    background-image: url("<?= base_url('assets/svg/banner1.png') ?>");
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
<div style="height: 70vh;" class="row m-0 banner-profile jumbotron jumbotron-fluid position-relative bg-dsw1 justify-content-between">

  <div style="margin-top: 120px;" class="col-md-12 px-5 text-white" data-aos="fade-up">
   <!--  <h1 class="display-4 font-weight-bold text-dark text-center">Wifi Depok Bersahabat</h1> -->
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
  <div class="header"><h2>Profile Wifi Depok Bersahabat</h2></div>
  <div class="m-3 shadow cs-radius col-md-10 px-5 py-4">
    <p class="text-justify">
Untuk memberikan kemudahan dalam mengakses informasi bagi warganya, Pemerintah Kota Depok melalui Dinas Komunikasi dan Informatika (DISKOMINFO) berupaya untuk mengoptimalkan pemanfaatan Teknologi informasi dan Komunikasi (TIK) secara optimal dengan mengimplementasikan e-Government salah satunya dengan cara pemasangan titik Hotspot (Wi-Fi) gratis di beberapa wilayah yang ada di Kota Depok, Hal ini bertujuan untuk meningkatkan kualitas pelayanan publik sehingga dapat dipastikan bahwa program tersebut selaras dengan tujuan Pemerintahan yang baik (good governance) dengan terselenggaranya pelayanan publik yang baik melalui implementasi e-Government, serta mengoptimalkan peran masyarakat dalam implementasi e-Government Dalam upaya peningkatan pelayanan publik.
    </p>
    <p class="text-justify">
Pemasangan Wifi publik gratis ini akan terfokus pada lokasi-lokasi publik seperti taman, balai warga, posyandu, komunitas, gedung serbaguna dan sebagainya. Dengan pemanfaatan teknologi ini, individu dapat mengakses jaringan internet melalui komputer atau gadget yang mereka miliki di lokasi-lokasi dimana hotspot disediakan. Sebagai salah satu kota penyangga Ibu Kota Jakarta, Kota Depok merupakan wilayah yang sangat strategis dalam pengembangan jaringan Teknologi Informasi dan Komunikasi (TIK). Selain itu, banyaknya perguruan tinggi serta berbagai komunitas yang bergerak di bidang IT, telah membuat Kota Depok menjadi kota yang memiliki jumlah penduduk dengan tingkat penggunaan internet tertinggi se-Jabodetabek.
    </p>
    <p class="text-justify">
Dengan adanya website  pengajuan pemasangan wifi publik secara online hal ini bertujuan agar meningkatkan efektivitas dan efisiensi kinerja dari penerapan e-Government di Dinas Komunikasi dan Informatika Kota Depok, serta mempermudah masyarakat untuk mengetahui informasi yang berkaitan dengan pengajuan pemasangan layanan wifi Publik di Kota Depok.
    </p>
  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>