<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  if (isset($_POST['kode_mapel'])) {
    // ambil data hasil submit dari form
    $kode_mapel   = mysqli_real_escape_string($db, trim($_POST['kode_mapel']));
    $nama_mapel   = mysqli_real_escape_string($db, trim($_POST['nama_mapel']));
    $semester     = mysqli_real_escape_string($db, trim($_POST['semester']));
    $kode_jurusan   = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

    $kueri = "UPDATE tbl_mapel SET 
      nama_mapel    = '$nama_mapel',
      semester      = '$semester',
      kode_jurusan    = '$kode_jurusan' WHERE kode_mapel = '$kode_mapel'";
    $update = mysqli_query($db, $kueri);
    // cek query
    if ($update) {
      // jika berhasil tampilkan pesan berhasil ubah data
      header("location: index.php?page=mapel&alert=2");
    }
  }
}
// tutup koneksi
mysqli_close($db);
