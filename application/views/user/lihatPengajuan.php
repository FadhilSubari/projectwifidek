<?php $this->load->view('user/header') ?>
  <!-- Page Wrapper -->
  <div id="wrapper" class="mt-4">
      <div id="content" class="col-md-12">
        <div class="container-fluid mt-5">
          <?= $this->session->flashdata('submit-success') ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>No Telepon Pic</label>
                      <input type="text" name="email" class="form-control" value="<?= $pengajuan->no_telp_pic ?>" readonly>
                      <?= form_error('kecamatan') ?>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="" id="" class="form-control">
                        <?= $pengajuan->alamat ?>
                      </textarea>
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