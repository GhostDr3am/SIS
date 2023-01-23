<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  // ambil data hasil submit dari form
  $kode_mapel   = mysqli_real_escape_string($db, trim($_POST['kode_mapel']));
  $nama_mapel   = mysqli_real_escape_string($db, trim($_POST['nama_mapel']));
  $semester     = mysqli_real_escape_string($db, trim($_POST['semester']));
  $kode_jurusan   = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

  $query = mysqli_query($db, "SELECT kode_mapel FROM tbl_mapel WHERE kode_mapel='$kode_mapel'");
  $rows = mysqli_num_rows($query);

  if ($rows > 0) {
    header("location: index.php?page=mapel&alert=4&kode_mapel=$kode_mapel");
  } else {
    $kueri = "INSERT INTO tbl_mapel VALUES (
      '$kode_mapel',
      '$nama_mapel',
      '$semester',
      '$kode_jurusan')";
    $insert = mysqli_query($db, $kueri);
    // cek query
    if ($insert) {
      // jika berhasil tampilkan pesan berhasil simpan data
      header("location: index.php?page=mapel&alert=1");
    }
  }
}
// tutup koneksi
mysqli_close($db);
