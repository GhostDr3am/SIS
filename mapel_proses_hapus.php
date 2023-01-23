<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['kode_mapel'])) {
  // ambil data get dari form 
  $kode_mapel = $_GET['kode_mapel'];
  // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
  $kueri = "DELETE FROM tbl_mapel WHERE kode_mapel='$kode_mapel'";
  $delete = mysqli_query($db, $kueri);
  // cek hasil query
  if ($delete) {
    // jika berhasil tampilkan pesan berhasil delete data
    header("location: index.php?page=mapel&alert=3");
  }
}
// tutup koneksi
mysqli_close($db);
