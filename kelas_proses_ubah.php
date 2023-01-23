<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  if (isset($_POST['kode_kelas'])) {
    // ambil data hasil submit dari form
    $kode_kelas   = mysqli_real_escape_string($db, trim($_POST['kode_kelas']));
    $nama_kelas   = mysqli_real_escape_string($db, trim($_POST['nama_kelas']));
    $tingkat   = mysqli_real_escape_string($db, trim($_POST['tingkat']));
    $wali_kelas   = mysqli_real_escape_string($db, trim($_POST['wali_kelas']));
    $semester   = mysqli_real_escape_string($db, trim($_POST['semester']));
    $tahun   = mysqli_real_escape_string($db, trim($_POST['tahun']));
    $kode_jurusan   = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));

    $kueri = "UPDATE tbl_kelas SET 
      nama_kelas    = '$nama_kelas',
      tingkat       = '$tingkat',
      wali_kelas    = '$wali_kelas',
      semester      = '$semester',
      tahun         = '$tahun',
      kode_jurusan  = '$kode_jurusan' WHERE kode_kelas = '$kode_kelas'";
    $update = mysqli_query($db, $kueri);
    // cek query
    if ($update) {
      // jika berhasil tampilkan pesan berhasil ubah data
      header("location: index.php?page=kelas&alert=2");
    }
  }
}
// tutup koneksi
mysqli_close($db);
