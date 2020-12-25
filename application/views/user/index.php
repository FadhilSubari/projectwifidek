<?php $this->load->view('user/header'); ?>
<!-- banner  -->
<div class="row m-0 jumbotron jumbotron-fluid position-relative justify-content-between"
style="background-image: url(<?= base_url('assets/svg/banner4.png'); ?>); background-size: cover; background-position: center;" 
>

<div class="col-md-12 p-5 mt-3 text-white" style="height: 50vh;" data-aos="fade-up">
  <h1 style="margin-top: 100px;" class="display-4 font-weight-bold text-danger text-center">Wifi Depok Bersahabat</h1>
  <p style="font-size: 15px; font-weight: bold;" class="text-center text-danger">Pengajuan pemasangan Wifi Publik Kota Depok</p>
</div>
<!--   <div class="col-md-5 m-5 mt-3" data-aos="fade-up">
    <img src="<?= base_url('assets/svg/banner.svg') ?>" class="w-100 h-100" alt="">
  </div> -->
<!--   <div class="custom-shape-divider-bottom-1600586814">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z" class="shape-fill"></path>
    </svg>
  </div> -->
</div>

<div class="row justify-content-center m-0 mt-5 mb-5" data-aos="fade-up">
  <div class="col-md-12 text-center"><h2>Tahapan Pemasangan Wifi Depok Bersahabat</h2></div>
  <div class="m-3 shadow cs-radius card-cs px-5 py-4">
    <img src="<?= base_url('assets/svg/2.svg') ?>" class="card-img-top h-50" alt="...">
    <H4 class="font-weight-bold">Tahap 1</H4>
    <p style="font-size: 15px;">
      1. Mengisi form pengajuan pemasangan WIFI Publik
    </p>
    <p style="font-size: 15px;">
      2. Disertai Proposal yang disetujui RT/RW dan Kelurahan
    </p>
  </div>
  <div class="m-3 shadow cs-radius card-cs px-5 py-4">
    <img src="<?= base_url('assets/svg/1.svg') ?>" class="card-img-top h-50" alt="...">
    <H4 class="font-weight-bold">Tahap 2</H4>
    <p style="font-size: 15px;">
        Jika permohonan diterima team akan melakukan pengechekan ke lokasi untuk memastikan penempatan titik Wifi dan ketersediaan jalur listrik
    </p>
  </div>
  <div class="m-3 shadow cs-radius card-cs px-5">
    <img src="<?= base_url('assets/svg/4.svg') ?>" class="card-img-top h-50" alt="...">
    <H4 class="font-weight-bold">Tahap 3</H4>
    <p style="font-size: 15px;">
      Setelah semua tahap sudah disetujui pemasangan Wifi Publik memakan waktu 1 Bulan, dengan pertimbangan ketersedian jalur Fiber Optik
    </p>
  </div>
</div>
<div class="row justify-content-center m-0" data-aos="fade-up">
<div class="col-md-7">
  <img class="card-img-top" src="<?= base_url('assets/svg/map2.png') ?>">
</div>
</div>
<div class="row justify-content-center m-0" data-aos="fade-up">
  <div class="card-body col-md-10">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Pengaju</th>
            <th>Alamat</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pengajuan as $value) {
            ?>
            <tr>
              <td><?= $value->nama_pengaju ?></td>
              <td><?= $value->alamat ?></td>
              <td><?= $value->status ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>