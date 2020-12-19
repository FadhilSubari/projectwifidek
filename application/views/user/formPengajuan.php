<?php $this->load->view('user/header'); ?>
<!-- banner  -->
<div class="row justify-content-center form-register py-5">
  <div class="col-md-12 cs-radius cs-color-dsw">
    <?php echo $this->session->flashdata('alert'); ?>
    <header class="text-center">
      <h2 class="font-weight-bolder cs-color-dsw mb-4">Form Pengajuan Wifi</h2>
    </header>
    <form class="row justify-content-center" action="<?= base_url('user/proses-daftar-wifi'); ?>" method="POST" enctype="multipart/form-data">
      <div class="col-md-5 mx-3 cs-radius shadow p-3">
        <div class="form-group">
          <label class="font-weight-bold">NIK</label>
          <input type="name" name="nik" value="<?= set_value('nik') ?>" class="form-control">
          <?= form_error('nik') ?>
        </div>        
        <div class="form-group">
          <label class="font-weight-bold">Nama Pengaju</label>
          <input type="name" name="nama_pengaju" value="<?= set_value('nama_pengaju') ?>" class="form-control">
          <?= form_error('nama_pengaju') ?>
        </div>        
        <div class="form-group">
          <label class="font-weight-bold">Nama Tempat</label>
          <input type="name" name="nama_wifi" value="<?= set_value('nama_wifi') ?>" class="form-control">
          <?= form_error('nama_wifi') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Nama Pic</label>
          <input type="name" name="nama_pic" value="<?= set_value('nama_pic') ?>" class="form-control">
          <?= form_error('nama_pic') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Alamat</label>
          <textarea name="alamat" class="form-control" cols="30" rows="2"><?= set_value('alamat') ?></textarea>
          <?= form_error('alamat') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Kelurahan</label>
          <select name="id_kelurahan" value="<?= set_value('kelurahan') ?>" class="form-control">
            <?php foreach ($kelurahan as $value) { ?>
              <option value="<?= $value->id_kelurahan ?>"><?= $value->nama_kelurahan ?></option>
            <?php } ?>
          </select>
          <?= form_error('id_kelurahan') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Kecamatan</label>
          <select name="id_kecamatan" value="<?= set_value('kecamatan') ?>" class="form-control">
            <?php foreach ($kecamatan as $value) { ?>
              <option value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
            <?php } ?>
          </select>
          <?= form_error('id_kecamatan') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Tempat</label>
          <select name="id_tempat" value="<?= set_value('id_tempat') ?>" class="form-control">
            <?php foreach ($tempat as $value) { ?>
              <option value="<?= $value->id_tempat ?>"><?= $value->nama_tempat ?></option>
            <?php } ?>
          </select>
          <?= form_error('id_tempat') ?>
        </div>
      </div>
      <div class="col-md-5 mx-3 cs-radius shadow p-3">
        <div class="form-group">
          <label class="font-weight-bold">No Telepon</label>
          <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" class="form-control">
          <?= form_error('no_telp') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">No Telepon Pic</label>
          <input type="text" name="no_telp_pic" value="<?= set_value('no_telp_pic') ?>" class="form-control">
          <?= form_error('no_telp_pic') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Email</label>
          <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control">
          <?= form_error('email') ?>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Proposal</label>
          <input type="file" name="proposal" class="d-block">
        </div>
        <div class="form-group">
          <label class="font-weight-bold">KTP</label>
          <input type="file" name="foto_ktp" class="d-block">
        </div>
        <button type="submit" class="btn btn-bg-dsw1 text-white">Daftar</button>
        <a class="btn btn-bg-dsw2 text-white" href="<?= base_url('') ?>">Batal</a>
      </div>
    </form>
  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>