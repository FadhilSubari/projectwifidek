<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - User</title>
  <link rel="icon" href="<?= base_url('assets/logo/dsw.webp') ?>">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,
  400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/custome.css'); ?>" rel="stylesheet">
</head>

<body>
<!--   <div class="custom-shape-divider-top-1600581078">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M1200 0L0 0 598.97 114.72 1200 0z" class="shape-fill"></path>
    </svg>
  </div> -->
  <div class="row justify-content-center form-register px-5">
    <div class="col-md-12 cs-radius cs-color-dsw">
      <?php echo $this->session->flashdata('alert'); ?>
      <header class="text-center">
        <h2 class="font-weight-bolder cs-color-dsw mb-4">DAFTAR AKUN</h2>
      </header>
      <form class="row justify-content-center" action="<?= base_url('user/register-proses'); ?>" method="POST" enctype="multipart/form-data">
        <div class="col-md-5 mx-3 cs-radius shadow-lg p-3">
          <div class="form-group">
            <label class="font-weight-bold">Nama</label>
            <input type="nama" name="nama" value="<?= set_value('nama') ?>" class="form-control">
            <?= form_error('nama') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Alamat <small>Isikan Alamat sesuai domisili</small> </label>
            <textarea name="alamat" class="form-control" cols="30" rows="2"><?= set_value('alamat') ?></textarea>
            <?= form_error('alamat') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Kelurahan <small>Isikan Alamat sesuai domisili</small> </label>
            <select name="id_kelurahan" value="<?= set_value('kelurahan') ?>" class="form-control">
              <?php foreach ($kelurahan as $value) { ?>
                <option value="<?= $value->id_kelurahan ?>"><?= $value->nama_kelurahan ?></option>
              <?php } ?>
            </select>
            <?= form_error('Kelurahan') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Kecamatan <small>Isikan Alamat sesuai domisili</small> </label>
            <select name="id_kecamatan" value="<?= set_value('kecamatan') ?>" class="form-control">
              <?php foreach ($kecamatan as $value) { ?>
                <option value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
              <?php } ?>
            </select>
            <?= form_error('kecamatan') ?>
          </div>
        </div>
        <div class="col-md-5 mx-3 cs-radius shadow-lg p-3">
          <div class="form-group">
            <label class="font-weight-bold">Kode Pos <small>Isikan Kode Pos sesuai domisili</small> </label>
            <input type="text" name="kode_pos" value="<?= set_value('kode_pos') ?>" class="form-control">
            <?= form_error('kode Pos') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">No Telepon</label>
            <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" class="form-control">
            <?= form_error('no_telp') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Email</label>
            <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control">
            <?= form_error('email') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="password" name="password" class="form-control">
            <?= form_error('password') ?>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Foto Profil</label>
            <input type="file" name="foto" class="d-block">
          </div>
          <button type="submit" class="btn btn-bg-dsw1 text-white">Daftar</button>
          <a class="btn btn-bg-dsw2 text-white" href="<?= base_url('user/login') ?>">Batal</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>