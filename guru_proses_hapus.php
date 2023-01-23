<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['nik'])) {
  // ambil data get dari form 
  $nik = $_GET['nik'];
  // perintah query untuk menampilkan data foto guru berdasarkan nik
  $kueri = "SELECT foto FROM tbl_guru WHERE nik='$nik'";
  $query = mysqli_query($db, $kueri);
  $data = mysqli_fetch_assoc($query);
  $foto = $data['foto'];

  // hapus file foto dari folder foto
  $hapus_file = unlink("foto/$foto");
  // cek hapus file
  if ($hapus_file) {
    // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel guru
    $kueri = "DELETE FROM tbl_guru WHERE nik='$nik'";
    $delete = mysqli_query($db, $kueri);
    // cek hasil query
    if ($delete) {
      // jika berhasil tampilkan pesan berhasil delete data
      header("location: index.php?page=guru&alert=3");
    }
  }
}
// tutup koneksi
mysqli_close($db);
