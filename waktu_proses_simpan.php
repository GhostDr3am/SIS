<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  // ambil data hasil submit dari form
  $hari   = mysqli_real_escape_string($db, trim($_POST['hari']));
  $jam_masuk = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['jam_masuk']))));
  $jam_keluar = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['jam_keluar']))));

  $kueri = "INSERT INTO tbl_waktu VALUES (
      '',
      '$hari',
      '$jam_masuk',
      '$jam_keluar')";
  $insert = mysqli_query($db, $kueri);
  // cek query
  if ($insert) {
    // jika berhasil tampilkan pesan berhasil simpan data
    header("location: index.php?page=waktu&alert=1");
  }
}
// tutup koneksi
mysqli_close($db);
