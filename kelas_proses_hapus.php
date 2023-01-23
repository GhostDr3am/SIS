<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['kode_kelas'])) {
  // ambil data get dari form 
  $kode_kelas = $_GET['kode_kelas'];
  // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
  $kueri = "DELETE FROM tbl_kelas WHERE kode_kelas='$kode_kelas'";
  $delete = mysqli_query($db, $kueri);
  // cek hasil query
  if ($delete) {
    // jika berhasil tampilkan pesan berhasil delete data
    header("location: index.php?page=kelas&alert=3");
  }
}
// tutup koneksi
mysqli_close($db);
