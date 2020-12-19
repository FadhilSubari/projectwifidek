<?php $this->load->view('user/header'); ?>
<!-- banner  -->
<div class="row justify-content-center form-register py-5">
  <div class="col-md-12 cs-radius cs-color-dsw">
    <?php echo $this->session->flashdata('alert'); ?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pengaju</th>
              <th>Alamat</th>
              <th>Proposal</th>
              <th>Email</th>
              <th>Kelola</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pengajuan as $value) {
            ?>
              <tr>
                <td><?= $value->id_pengajuan ?></td>
                <td><?= $value->nama_pengaju ?></td>
                <td><?= $value->alamat ?></td>
                <td><a href="<?= base_url('assets/upload/proposal/' . $value->proposal) ?>"><?= $value->proposal ?></a></td>
                <td><?= $value->email ?></td>
                <td width="100px"><a href="<?= base_url('user/lihat-pengajuan/' . $value->id_pengajuan) ?>" class="btn btn-success">Lihat</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
<!-- footer  -->
<?php $this->load->view('user/footer'); ?>