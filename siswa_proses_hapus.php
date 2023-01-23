<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol hapus diklik
if (isset($_GET['nis'])) {
  // ambil data get dari form 
  $nis = $_GET['nis'];
  // perintah query untuk menampilkan data foto siswa berdasarkan nis
  $kueri = "SELECT foto FROM tbl_siswa WHERE nis='$nis'";
  $query = mysqli_query($db, $kueri);
  $data = mysqli_fetch_assoc($query);
  $foto = $data['foto'];

  // hapus file foto dari folder foto
  $hapus_file = unlink("foto/$foto");
  // cek hapus file
  if ($hapus_file) {
    // jika file berhasil dihapus jalankan perintah query untuk menghapus data pada tabel siswa
    $kueri = "DELETE FROM tbl_siswa WHERE nis='$nis'";
    $delete = mysqli_query($db, $kueri);
    // cek hasil query
    if ($delete) {
      // jika berhasil tampilkan pesan berhasil delete data
      header("location: index.php?page=siswa&alert=3");
    }
  }
}
// tutup koneksi
mysqli_close($db);
