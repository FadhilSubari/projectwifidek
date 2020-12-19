<footer class="footer-cs pt-5">
<!--   <svg class="drop-shadow-cs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#202736" fill-opacity="1" d="M0,32L48,69.3C96,107,192,181,288,202.7C384,224,480,
    192,576,154.7C672,117,768,75,864,
    53.3C960,32,1056,32,1152,58.7C1248,85,1344,139,1392,165.3L1440,192L1440,320L1392,320C1344,
    320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,
    320C192,320,96,320,48,320L0,320Z">
  </path>
</svg> -->
<div class="row justify-content-center m-0 bg-dsw-foot px-5 pt-5">
  <div class="col-lg-4 text-left" data-aos="fade-up">
    <h4 class="font-weight-bold mb-0 boor" style="color: #13B2C3;">Alamat Pusat
      <hr class="my-0">
    </h4>
        <p class="text-left" style="font-size: 15px;">
      <i class="fas fa-map-marker-alt"></i> Gedung Baleka II, Jl. Margonda Raya No.54, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431
    </p>

  </div>
  <div class="col-lg-5" data-aos="fade-up">
    <h4 class="font-weight-bold mb-0 text-left boor" style="color: #13B2C3;">Wifi Depok Bersahabat
      <hr class="my-0">
    </h4>
    <p class="text-justify" style="font-size: 15px;">
      merupakan sebuah media yang memberikan kemudahan layanan dan informasi terkait Pengajuan pemasangan Wifi Publik Kota Depok yang terfokus pada lokasi-lokasi publik seperti Posyandu, Rumah Ibadah, komunitas, Balai Warga, Taman dan lain -lain.
    </p>
  </div>
  <div class="col-lg-3" data-aos="fade-up">
    <h4 class="font-weight-bold text-left mb-0 boor" style="color: #13B2C3;">Kontak Pusat
      <hr class="my-0">
    </h4>
    <ul class="navbar-nav text-left">

      <li class="nav-item mx-2">
        <a class="nav-link p-0 text-white hover-bg" href="#vision">
          <i class="fas fa-phone"></i> (021) 7764410</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link p-0 text-white hover-bg" href="#management">
             <i class="fas fa-envelope"></i> diskominfo@depok.go.id</a>
          </li>
        </ul>
      </div>
    </div>
      <div class="col-lg-12 text-center text-white bg-dark">
        <b>© 2020 Wifi Depok Bersahabat | Dinas Komunikasi dan Informatika Kota Depok</b>
      </div>
  </footer>


  <!-- Bootstrap core JavaScript-->
  <script>
    window.onscroll = function() {
      myFunction()
    };

    function myFunction() {
      if (document.documentElement.scrollTop > 50) {
        document.querySelector("nav");
        if (document.documentElement.scrollTop > lastScrollTop) {
        // document.querySelector("nav").classList.add("hidden-cus");
        document.querySelector("nav").classList.add("shadow-sm");
        document.querySelector("nav").classList.add("bg-white");
      } else {
        // document.querySelector("nav").classList.remove("hidden-cus");
      }
    } else {
      document.querySelector("nav").classList.remove("shadow-sm");
      document.querySelector("nav").classList.remove("bg-white");
    }
    lastScrollTop = document.documentElement.scrollTop;
  }
  var lastScrollTop = 0;
</script>
<script src="<?= base_url('assets/aosJs/aos.js') ?>"></script>
<script>
  AOS.init({
    duration: 1200,
    once: true,
  })
</script>
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

</body>

</html>