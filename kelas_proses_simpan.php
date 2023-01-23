<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  // ambil data hasil submit dari form
  $kode_kelas   = mysqli_real_escape_string($db, trim($_POST['kode_kelas']));
  $nama_kelas   = mysqli_real_escape_string($db, trim($_POST['nama_kelas']));
  $tingkat      = mysqli_real_escape_string($db, trim($_POST['tingkat']));
  $wali_kelas   = mysqli_real_escape_string($db, trim($_POST['wali_kelas']));
  $semester     = mysqli_real_escape_string($db, trim($_POST['semester']));
  $tahun        = mysqli_real_escape_string($db, trim($_POST['tahun']));
  $kode_jurusan = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

  $query = mysqli_query($db, "SELECT kode_kelas FROM tbl_kelas WHERE kode_kelas='$kode_kelas'");
  $rows = mysqli_num_rows($query);

  if ($rows > 0) {
    header("location: index.php?page=kelas&alert=4&kode_kelas=$kode_kelas");
  } else {
    $kueri = "INSERT INTO tbl_kelas VALUES (
      '$kode_kelas',
      '$nama_kelas',
      '$tingkat',
      '$wali_kelas',
      '$semester',
      '$tahun',
      '$kode_jurusan')";
    $insert = mysqli_query($db, $kueri);
    // cek query
    if ($insert) {
      // jika berhasil tampilkan pesan berhasil simpan data
      header("location: index.php?page=kelas&alert=1");
    }
  }
}
// tutup koneksi
mysqli_close($db);
