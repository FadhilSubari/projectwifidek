<?php $this->load->view('user/header') ?>
<!-- Page Wrapper -->
<div id="wrapper" class="mt-4">
  <div id="content" class="col-md-12">
    <div class="container-fluid mt-5">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pengajuan wifi dengan id "<?= $data_diri->id_user ?>"</h6>
          Tanggal Pengajuan : <?= $data_diri->id_user ?>
          <a class="btn btn-primary btn-block" href="<?= base_url('admin/data-user') ?>">Kembali</a>
        </div>
        <div class="card-body">

          <form class="row justify-content-center" action="<?= base_url('user/update-diri'); ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-5 mx-3 cs-radius p-3">
              <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="name" name="nama" value="<?= $data_diri->nama ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Alamat</label>
                <textarea name="alamat" class="form-control" cols="30" rows="2"><?= $data_diri->alamat ?></textarea>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Kelurahan</label>
                <select name="id_kelurahan" value="" class="form-control">
                  <option value="<?= $data_diri->id_kelurahan ?>"><?= $data_diri->nama_kelurahan ?></option>
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Kecamatan</label>
                <select name="id_kecamatan" value="" class="form-control">
                  <option value="<?= $data_diri->id_kecamatan ?>"><?= $data_diri->nama_kecamatan ?></option>
                </select>
              </div>
            </div>
            <div class="col-md-5 mx-3 cs-radius p-3">
              <div class="form-group">
                <label class="font-weight-bold">Kode Pos</label>
                <input type="name" name="kode_pos" value="<?= $data_diri->kode_pos ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Email</label>
                <input type="text" name="email" value="<?= $data_diri->email ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">No Telp</label>
                <input type="name" name="no_telp" value="<?= $data_diri->no_telp ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold">Foto Profile</label>
                <img class="card-img-top" src="<?= base_url('assets/upload/user/' . $data_diri->foto) ?>">
              </div>
            </div>
          </form>

        </div>

      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

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
<?php $this->load->view('user/footer'); ?>