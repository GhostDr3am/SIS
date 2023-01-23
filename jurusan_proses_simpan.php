<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  // ambil data hasil submit dari form
  $kode_jurusan   = mysqli_real_escape_string($db, trim($_POST['kode_jurusan']));
  $nama_jurusan   = mysqli_real_escape_string($db, trim($_POST['nama_jurusan']));

  $query = mysqli_query($db, "SELECT kode_jurusan FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'");
  $rows = mysqli_num_rows($query);

  if ($rows > 0) {
    header("location: index.php?page=kelas&alert=4&kode_jurusan=$kode_jurusan");
  } else {
    $kueri = "INSERT INTO tbl_jurusan VALUES (
      '$kode_jurusan',
      '$nama_jurusan')";
    $insert = mysqli_query($db, $kueri);
    // cek query
    if ($insert) {
      // jika berhasil tampilkan pesan berhasil simpan data
      header("location: index.php?page=jurusan&alert=1");
    }
  }
}
// tutup koneksi
mysqli_close($db);
