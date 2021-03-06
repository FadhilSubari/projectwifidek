<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard Admin</title>
  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('admin/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('admin/navbar') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= $this->session->flashdata('submit-success') ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengajuan wifi dengan id "<?= $pengajuan->id_pengajuan ?>"</h6>
              Tanggal Pengajuan : <?= $pengajuan->tanggal ?>
              <!--               <a class="btn btn-primary" href="<?= base_url('admin/update-pengajuan/' . $pengajuan->id_pengajuan) ?>">Update Data</a> -->
            </div>
            <div class="card-body">
              <form action="<?= base_url('admin/proses-update-pengajuan/' . $pengajuan->id_pengajuan) ?>" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Pengaju</label>
                      <input type="text" name="nama_pengaju" class="form-control" value="<?= $pengajuan->nama_pengaju ?>">
                      <?= form_error('nama_pengaju') ?>
                    </div>
                    <div class="form-group">
                      <label>Nik</label>
                      <input type="text" name="nik" class="form-control" value="<?= $pengajuan->nik ?>">
                      <?= form_error('nik') ?>
                    </div>
                    <div class="form-group">
                      <label>Nama Pic</label>
                      <input type="text" name="nama_pic" class="form-control" value="<?= $pengajuan->nama_pic ?>">
                      <?= form_error('nama_pic') ?>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="<?= $pengajuan->email ?>">
                      <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                      <label>No Telepon</label>
                      <input type="text" name="no_telp" class="form-control" value="<?= $pengajuan->no_telp ?>">
                      <?= form_error('no_telp') ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Tempat</label>
                      <input type="text" name="nama_wifi" class="form-control" value="<?= $pengajuan->nama_wifi ?>">
                      <?= form_error('nama_wifi') ?>
                    </div>
                    <div class="form-group">
                      <label>No Telepon Pic</label>
                      <input type="text" name="no_telp_pic" class="form-control" value="<?= $pengajuan->no_telp_pic ?>">
                      <?= form_error('no_telp_pic') ?>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control">
                        <?= $pengajuan->alamat ?>
                      </textarea>
                      <?= form_error('alamat') ?>
                    </div>
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <!-- <input type="text" name="email" class="form-control" value="<?= $pengajuan->nama_kecamatan ?>" > -->
                      <select name="id_kecamatan" class="form-control">
                        <option value="<?= $pengajuan->id_kecamatan ?>"><?= $pengajuan->nama_kecamatan ?></option>
                        <?php foreach ($kecamatan as $value) { ?>
                          <option value="<?= $value->id_kecamatan ?>"><?= $value->nama_kecamatan ?></option>
                        <?php } ?>
                      </select>
                      <?= form_error('kecamatan') ?>
                    </div>
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select name="id_kelurahan" value="<?= set_value('kelurahan') ?>" class="form-control">
                        <option value="<?= $pengajuan->id_kelurahan ?>"><?= $pengajuan->nama_kelurahan ?></option>
                        <?php foreach ($kelurahan as $value) { ?>
                          <option value="<?= $value->id_kelurahan ?>"><?= $value->nama_kelurahan ?></option>
                        <?php } ?>
                      </select>
                      <?= form_error('id_kelurahan') ?> </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                  </div>
                </div>
              </form>
            </div>

          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Proposal</h6>
            </div>
            <div class="card-body">
              <embed src="<?php echo base_url('assets/upload/proposal/' . $pengajuan->proposal) ?>#toolbar=0&navpanes=0&scrollbar=1" width="100%" height="600">
            </div>

          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Berikan Tanggapan</h6>
            </div>
            <div class="card-body">
              <?php if (!empty($status->id_pengajuan)) { ?>
                <div class="form-group">
                  <textarea class="form-control" readonly="" id="">
                        <?= $status->keterangan ?>
                      </textarea>
                </div>
              <?php } else { ?>
                <div class="alert alert-dark" role="alert">
                  Belum Ada Tanggapan
                </div>
              <?php  } ?>
              <hr>
              <form action="<?= base_url('admin/status-pengajuan') ?>" method="post">
                <div class="form-group">
                  <label>Berikan Keterangan</label>
                  <input type="text" name="id_pengajuan" class="form-control" value="<?= $pengajuan->id_pengajuan ?>" hidden>
                  <input type="text" name="id_status" class="form-control" value="<?= $status->id_status ?>" hidden>
                  <div class="form-group">
                    <textarea class="form-control" name="keterangan" id="">
                        </textarea>
                  </div>
                  <div class="form-group">
                    <select class="form-control font-weight-bold" name="status">
                      <option value=""><?= $status->status ?></option>
                      <option value="Menunggu Seleksi" <?php echo $status->status == 'Menunggu Seleksi' ? 'hidden' : '' ?>>Menunggu Seleksi</option>
                      <option <?php echo $status->status == 'Ditolak' ? 'hidden' : '' ?> value="Ditolak">Ditolak</option>
                      <option <?php echo $status->status == 'Sukses Seleksi Berkas' ? 'hidden' : '' ?> value="Sukses Seleksi Berkas">Sukses Seleksi Berkas</option>
                      <option <?php echo $status->status == 'Sukses Seleksi Survey' ? 'hidden' : '' ?> value="Sukses Seleksi Survey">Sukses Seleksi Survey</option>
                      <option <?php echo $status->status == 'Sukses Terpasang' ? 'hidden' : '' ?> value="Sukses Terpasang">Sukses Terpasang</option>
                    </select>
                  </div>
                  <?= form_error('kecamatan') ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>

</body>

</html>