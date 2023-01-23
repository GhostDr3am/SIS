<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  if (isset($_POST['id_waktu'])) {
    // ambil data hasil submit dari form
    $id_waktu   = mysqli_real_escape_string($db, trim($_POST['id_waktu']));
    $hari   = mysqli_real_escape_string($db, trim($_POST['hari']));
    $jam_masuk = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['jam_masuk']))));
    $jam_keluar = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['jam_keluar']))));

    $kueri = "UPDATE tbl_waktu SET 
      hari    = '$hari',
      jam_masuk      = '$jam_masuk',
      jam_keluar    = '$jam_keluar' WHERE id_waktu = '$id_waktu'";
    $update = mysqli_query($db, $kueri);
    // cek query
    if ($update) {
      // jika berhasil tampilkan pesan berhasil ubah data
      header("location: index.php?page=waktu&alert=2");
    }
  }
}
// tutup koneksi
mysqli_close($db);
