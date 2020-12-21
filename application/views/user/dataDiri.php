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
  <div class="m-3 cs-radius col-md-12 px-5 py-4">
    <form class="row justify-content-center" action="<?= base_url('user/update-diri'); ?>" method="POST" enctype="multipart/form-data">
      <div class="col-md-5 mx-3 cs-radius shadow p-3">        
        <div class="form-group">
          <label class="font-weight-bold">Nama</label>
          <input type="name" name="nama" value="<?= $data_diri->nama ?>" class="form-control">
          <?= form_error('nama') ?>
        </div>        
        <div class="form-group">
          <label class="font-weight-bold">Alamat</label>
          <textarea name="alamat" class="form-control" cols="30" rows="2"><?= $data_diri->alamat ?></textarea>
          <?= form_error('alamat') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Kelurahan</label>
          <select name="id_kelurahan" value="<?= set_value('kelurahan') ?>" class="form-control">
              <option value="<?= $data_diri->id_kelurahan ?>"><?= $data_diri->nama_kelurahan ?></option>
        <?php foreach ($kelurahan as $value) { ?>
              <option value="<?= $value->id_kelurahan ?>"><?= $value->nama_kelurahan ?></option>
        <?php } ?>
  
          </select>
          <?= form_error('id_kelurahan') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Kecamatan</label>
          <select name="id_kecamatan" value="<?= set_value('kecamatan') ?>" class="form-control">
              <option value="<?= $data_diri->id_kecamatan ?>"><?= $data_diri->nama_kecamatan ?></option>
                    <?php foreach ($kecamatan as $value) { ?>
              <option value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
        <?php } ?>
          </select>
          <?= form_error('id_kecamatan') ?>
        </div>
      </div>
      <div class="col-md-5 mx-3 cs-radius shadow p-3">
        <div class="form-group">
          <label class="font-weight-bold">Kode Pos</label>
          <input type="name" name="kode_pos" value="<?= $data_diri->kode_pos ?>" class="form-control">
          <?= form_error('kode_pos') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Email</label>
          <input type="name" name="email" value="<?= $data_diri->email ?>" class="form-control">
          <?= form_error('email') ?>
        </div>        
        <div class="form-group">
          <label class="font-weight-bold">No Telp</label>
          <input type="name" name="no_telp" value="<?= $data_diri->no_telp ?>" class="form-control">
          <?= form_error('no_telp') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Foto Profile</label>
          <img class="card-img-top" src="<?= base_url('assets/upload/user/' . $data_diri->foto) ?>">
          <input type="file" name="foto" value="<?= set_value('foto') ?>">
          <?= form_error('foto') ?>
        </div>
        <button type="submit" class="btn btn-bg-dsw1 text-white">Ubah</button>
        <a class="btn btn-bg-dsw2 text-white" href="<?= base_url() ?>">Batal</a>
        <a class="btn btn-danger text-white" href="<?= base_url('user/ganti-password') ?>">Ganti Password</a>
      </div>
    </form>
  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>