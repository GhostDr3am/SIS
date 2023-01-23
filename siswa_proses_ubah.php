<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// jika tombol simpan diklik
if (isset($_POST['simpan'])) {
  if (isset($_POST['nis'])) {
    // ambil data hasil submit dari form
    $nis           = mysqli_real_escape_string($db, trim($_POST['nis']));
    $nama          = mysqli_real_escape_string($db, trim($_POST['nama']));
    $tempat_lahir  = mysqli_real_escape_string($db, trim($_POST['tempat_lahir']));
    $tanggal_lahir = mysqli_real_escape_string($db, trim(date('Y-m-d', strtotime($_POST['tanggal_lahir']))));
    $jenis_kelamin = mysqli_real_escape_string($db, trim($_POST['jenis_kelamin']));
    $agama         = mysqli_real_escape_string($db, trim($_POST['agama']));
    $alamat        = mysqli_real_escape_string($db, trim($_POST['alamat']));
    $no_hp         = mysqli_real_escape_string($db, trim($_POST['no_hp']));
    $nama_file     = $_FILES['foto']['name'];
    $tmp_file      = $_FILES['foto']['tmp_name'];
    // Set path folder tempat menyimpan filenya
    $ekstensi = explode('.', $nama_file);
    $ekstensiFile = end($ekstensi);
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensiFile;

    $path          = "foto/" . $nama_file_baru;

    // jika foto tidak diubah
    if (empty($nama_file)) {
      // perintah query untuk mengubah data pada tabel siswa
      $kueri = "UPDATE tbl_siswa SET 
      nama          = '$nama',
      tempat_lahir  = '$tempat_lahir',
      tanggal_lahir = '$tanggal_lahir',
      jenis_kelamin = '$jenis_kelamin',
      agama         = '$agama',
      alamat        = '$alamat',
      no_hp         = '$no_hp' WHERE nis = '$nis'";
      $update = mysqli_query($db, $kueri);
      // cek query
      if ($update) {
        // jika berhasil tampilkan pesan berhasil ubah data
        header("location: index.php?page=siswa&alert=2");
      }
    }
    // jika foto diubah
    else {
      // upload file
      if (move_uploaded_file($tmp_file, $path)) {
        // Jika file berhasil diupload, Lakukan : 
        // perintah query untuk mengubah data pada tabel siswa
        $kueri = "UPDATE tbl_siswa SET 
        nama          = '$nama',
        tempat_lahir  = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        jenis_kelamin = '$jenis_kelamin',
        agama         = '$agama',
        alamat        = '$alamat',
        no_hp         = '$no_hp',
        foto          = '$nama_file_baru' WHERE nis = '$nis'";
        $update = mysqli_query($db, $kueri);
        // cek query
        if ($update) {
          // jika berhasil tampilkan pesan berhasil ubah data
          header("location: index.php?page=siswa&alert=2");
        }
      }
    }
  }
}
// tutup koneksi
mysqli_close($db);
