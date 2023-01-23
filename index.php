<?php
session_start();
require_once "config/database.php";
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<!-- HTML 5 Tag -->
<html lang="en">
<!-- tag pembuka HTML -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi, dan Bootstrap 4">
  <meta name="keywords" content="Aplikasi Pengelolaan Data Siswa dengan PHP 7, MySQLi, dan Bootstrap 4">
  <meta name="author" content="Indra Styawantoro">

  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
  </script> -->

  <!-- Sweet Alert -->
  <script src="assets/plugins/sweetalert2.all.min.js"></script>

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
  <!-- datepicker CSS -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- title -->
  <title>Sistem Informasi Sekolah</title>
</head>

<body>

  <?php if (isset($_SESSION["swal"])) : ?>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
      })
    </script>
    <?php unset($_SESSION["swal"]); ?>
  <?php endif; ?>

  <div class="container-fluid">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><i class="fas fa-ethernet title-icon"></i> Sistem Informasi Sekolah (SIS)</h5>
      <?php if ($_SESSION["level"] === "Admin") : ?>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 <?= (empty($_GET["page"])) ? "text-primary" : "text-dark" ?>" href="./">Home</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "siswa") ? "text-primary" : "text-dark" ?>" href="?page=siswa">Siswa</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "guru") ? "text-primary" : "text-dark" ?>" href="?page=guru">Guru</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "mapel") ? "text-primary" : "text-dark" ?>" href="?page=mapel">Matapelajaran</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "jurusan") ? "text-primary" : "text-dark" ?>" href="?page=jurusan">Jurusan</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "kelas") ? "text-primary" : "text-dark" ?>" href="?page=kelas">Kelas</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "waktu") ? "text-primary" : "text-dark" ?>" href="?page=waktu">Waktu</a>
          <a class="btn btn-outline-info" href="#">Sign Up</a>
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </nav>
      <?php elseif ($_SESSION["level"] === "Guru") : ?>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 <?= (empty($_GET["page"])) ? "text-primary" : "text-dark" ?>" href="./">Home</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "siswa") ? "text-primary" : "text-dark" ?>" href="?page=siswa">Siswa</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "guru") ? "text-primary" : "text-dark" ?>" href="?page=guru">Guru</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "mapel") ? "text-primary" : "text-dark" ?>" href="?page=mapel">Matapelajaran</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "jurusan") ? "text-primary" : "text-dark" ?>" href="?page=jurusan">Jurusan</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "kelas") ? "text-primary" : "text-dark" ?>" href="?page=kelas">Kelas</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "waktu") ? "text-primary" : "text-dark" ?>" href="?page=waktu">Waktu</a>
          <a class="btn btn-outline-info" href="#">Sign Up</a>
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </nav>
      <?php else : ?>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 <?= (empty($_GET["page"])) ? "text-primary" : "text-dark" ?>" href="./">Home</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "mapel") ? "text-primary" : "text-dark" ?>" href="?page=mapel">Matapelajaran</a>
          <a class="p-2 <?= (isset($_GET["page"]) && $_GET["page"] === "kelas") ? "text-primary" : "text-dark" ?>" href="?page=kelas">Kelas</a>
          <a class="btn btn-outline-info" href="#">Sign Up</a>
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </nav>
      <?php endif; ?>
    </div>
  </div>

  <div class="container-fluid">
    <?php
    if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
    } else {
      if (empty($_GET['page'])) {
        include "home.php";
        // SISWA
      } elseif ($_GET['page'] == 'siswa') {
        include "siswa.php";
      } elseif ($_GET['page'] == "siswaTambah") {
        include "siswa_form_tambah.php";
      } elseif ($_GET['page'] == "siswaUbah") {
        include "siswa_form_ubah.php";
      }
      // GURU
      elseif ($_GET['page'] == 'guru') {
        include "guru.php";
      } elseif ($_GET['page'] == "guruTambah") {
        include "guru_form_tambah.php";
      } elseif ($_GET['page'] == "guruUbah") {
        include "guru_form_ubah.php";
      }
      // MAPEL
      elseif ($_GET['page'] == 'mapel') {
        include "mapel.php";
      } elseif ($_GET['page'] == "mapelTambah") {
        include "mapel_form_tambah.php";
      } elseif ($_GET['page'] == "mapelUbah") {
        include "mapel_form_ubah.php";
      }
      // JURUSAN
      elseif ($_GET['page'] == 'jurusan') {
        include "jurusan.php";
      } elseif ($_GET['page'] == "jurusanTambah") {
        include "jurusan_form_tambah.php";
      } elseif ($_GET['page'] == "jurusanUbah") {
        include "jurusan_form_ubah.php";
      }
      // KELAS
      elseif ($_GET['page'] == 'kelas') {
        include "kelas.php";
      } elseif ($_GET['page'] == "kelasTambah") {
        include "kelas_form_tambah.php";
      } elseif ($_GET['page'] == "kelasUbah") {
        include "kelas_form_ubah.php";
      }
      // WAKTU
      elseif ($_GET['page'] == 'waktu') {
        include "waktu.php";
      } elseif ($_GET['page'] == "waktuTambah") {
        include "waktu_form_tambah.php";
      } elseif ($_GET['page'] == "waktuUbah") {
        include "waktu_form_ubah.php";
      }
      // JIKA TIDAK ADA
      else {
        include "not_found.php";
      }
    }
    ?>
    <div class="container-fluid">
      <footer class="pt-4 my-md-4 pt-md-3 border-top">
        <div class="row">
          <div class="col-12 col-md center">&copy; 2022 - <a class="text-info" href="https://rony100801.github.io">Created By Rony Setiawan</a>
          </div>
        </div>
      </footer>
    </div>

    <!-- Pemanggilan Library jQuery -->
    <!-- pertama jQuery, kemudian Bootstrap js -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome js -->
    <script type="text/javascript" src="assets/plugins/all.min.js"></script>
    <!-- datepicker js -->
    <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      // initiate plugin ====================================================================================
      // ----------------------------------------------------------------------------------------------------
      $(document).ready(function() {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });
      });
      // ====================================================================================================

      // Validasi Form Tambah dan Form Ubah =================================================================
      // ----------------------------------------------------------------------------------------------------
      // Validasi form input tidak boleh kosong
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      // Validasi karakter yang boleh diinpukan pada form
      function getkey(e) {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field) {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;

        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();

        // check goodkeys
        if (goods.indexOf(keychar) != -1)
          return true;
        // control keys
        if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
          return true;

        if (key == 13) {
          var i;
          for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
              break;
          i = (i + 1) % field.form.elements.length;
          field.form.elements[i].focus();
          return false;
        };
        // else return false
        return false;
      }

      // validasi image dan preview image sebelum upload
      function validasiFile() {
        var fileInput = document.getElementById('foto');
        var filePath = fileInput.value;
        var fileSize = $('#foto')[0].files[0].size;
        // tentukan extension yang diperbolehkan
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        // Jika tipe file yang diupload tidak sesuai dengan allowedExtensions, tampilkan pesan :
        if (!allowedExtensions.exec(filePath)) {
          alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png');
          fileInput.value = '';
          document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
          return false;
        }
        // jika ukuran file yang diupload lebih dari sama dengan 1 Mb
        else if (fileSize >= 1000000) {
          alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
          fileInput.value = '';
          document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
          return false;
        }
        // selain itu
        else {
          // Image preview
          if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
          }
        }
      }
      // ====================================================================================================
    </script>

</body>

</html>