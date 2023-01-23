<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['kode_jurusan'])) {
  // ambil data get dari form 
  $kode_jurusan = $_GET['kode_jurusan'];
  // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
  $kueri = "DELETE FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'";
  $delete = mysqli_query($db, $kueri);
  // cek hasil query
  if ($delete) {
    // jika berhasil tampilkan pesan berhasil delete data
    header("location: index.php?page=jurusan&alert=3");
  }
}
// tutup koneksi
mysqli_close($db);
