<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['id_waktu'])) {
  // ambil data get dari form 
  $id_waktu = $_GET['id_waktu'];
  // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
  $kueri = "DELETE FROM tbl_waktu WHERE id_waktu='$id_waktu'";
  $delete = mysqli_query($db, $kueri);
  // cek hasil query
  if ($delete) {
    // jika berhasil tampilkan pesan berhasil delete data
    header("location: index.php?page=waktu&alert=3");
  }
}
// tutup koneksi
mysqli_close($db);
