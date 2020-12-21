<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - User</title>
  <link rel="icon" href="<?= base_url('assets/logo/dsw.webp') ?>">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,
  400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/custome.css'); ?>" rel="stylesheet">
</head>

<body>
  <div class="custom-shape-divider-bottom-1600531345">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
    </svg>
  </div>
  <div class="row justify-content-center form-login px-5">
    <div class="col-md-5 py-5 p-4 cs-radius shadow cs-color-dsw">
      <?php echo $this->session->flashdata('alert'); ?>
      <header class="text-center">
        <h2 class="font-weight-bolder cs-color-dsw ">Ganti Password</h2>
      </header>
      <form action="<?= base_url('user/proses-ganti-password'); ?>" method="POST">
        <div class="form-group">
          <label class="font-weight-bold" for="exampleInputEmail1">Password</label>
          <input type="password" name="password" value="<?= set_value('password', $this->session->flashdata('password')) ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-bg-dsw2 text-white">Ganti Password</button>
        <a class="btn btn-primary" href="<?= base_url() ?>">Batal</a>
      </form>
    </div>
  </div>

  <!-- script  -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
  <!-- end script  -->
</body>

</html>