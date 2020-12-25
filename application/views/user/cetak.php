<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="icon" href="<?= base_url('assets/logo/dsw.webp') ?>">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/aosJs/aos.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/custome.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>
<body>
  <div id="wrapper" class="mt-4">
    <div id="content" class="col-md-12">
      <div class="container-fluid mt-5">
        <!-- DataTales Example -->
        <div class="card mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan wifi dengan id "<?= $pengajuan->id_pengajuan ?>"</h6>
            Tanggal Pengajuan : <?= $pengajuan->tanggal ?>
          </div>
          <div class="card-body">
            <form action="<?= base_url('admin/proses-tambah-kecamatan') ?>" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Pengaju</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?= $pengajuan->nama_pengaju ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Nama Pic</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?= $pengajuan->nama_pic ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->email ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->no_telp ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="email" class="form-control bg-success text-dark" value="<?= $status->status ?>" readonly>
                    <?= form_error('status') ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>No Telepon Pic</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->no_telp_pic ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div> 
                  <div class="form-group">
                    <label>Nama Tempat</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->nama_wifi ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->nama_kecamatan ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Kelurahan</label>
                    <input type="text" name="email" class="form-control" value="<?= $pengajuan->nama_kelurahan ?>" readonly>
                    <?= form_error('kecamatan') ?>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" readonly="" class="form-control">
                      <?= $pengajuan->alamat ?>
                    </textarea>
                    <?= form_error('kecamatan') ?>
                  </div>
                </div>
              </div>
            </form>
            <div class="col-md-12 text-center bg-success text-white"><h5>Check by System</h5></div>
          </div>

        </div>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

  </div>
</body>
<script>
  window.print();
</script>
</html>

