<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>
  <!-- Custom fonts for this template-->
  <link rel="icon" href="<?= base_url('assets/logo/dsw.webp') ?>">
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/aosJs/aos.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/custome.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

</head>

<script type="text/javascript">
  function sebelum_login()
  {
    return alert('Anda harus login terlebih dahulu');
  }
</script>

<body id="page-top">
  <!-- navbar  -->
  <nav class="navbar navbar-expand-lg navbar-light px-5 fixed-top nav-transisi bg-mobile">
    <a class="navbar-brand" href="<?= base_url() ?>"><?= $this->session->userdata('nama'); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav text-white">
        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="<?= base_url() ?>">Home</a>
        </li>

        <li class="nav-item dropdown font-weight-bold">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Pengajuan
          </a>
          <div class="dropdown-menu animated--grow-in" aria-labelledby="navbarDropdownMenuLink">
            <?php if (empty($this->session->userdata('id_user'))) { ?>
              <a class="dropdown-item font-weight-bold" href="<?= base_url('user/login') ?>" onclick="sebelum_login()">Ajukan Wifi Publik</a>
              <a class="dropdown-item font-weight-bold" href="<?= base_url('user/login') ?>" onclick="sebelum_login()">Data Pengajuan</a>
            <?php } else { ?>
              <a class="dropdown-item font-weight-bold" href="<?= base_url('user/daftar-wifi-publik') ?>">Ajukan Wifi Publik</a>
              <a class="dropdown-item font-weight-bold" href="<?= base_url('user/data-pengajuan') ?>">Data Pengajuan</a> 

            <?php } ?>
            <!-- <a class="dropdown-item font-weight-bold" href="#">Something else here</a> -->
          </div>
        </li>

        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="<?= base_url('user/profile') ?>">Profile</a>
        </li>        
        <li class="nav-item font-weight-bold">
          <a class="nav-link" href="<?= base_url('user/manual-book') ?>">Manual Book</a>
        </li>
        <?php if (!empty($this->session->userdata('id_user'))) { ?>
          <li class="nav-item font-weight-bold">
            <a class="nav-link" href="<?= base_url('user/data-diri') ?>">Data Diri</a>
          </li>
        <?php } ?>
        <li class="nav-item font-weight-bold">
          <?php if (empty($this->session->userdata('id_user'))) { ?>
            <a class="nav-link" href="<?= base_url('user/login') ?>">Login</a>
          <?php } else { ?>
            <a class="nav-link text-danger" href="<?= base_url('user/logout') ?>">Logout</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>