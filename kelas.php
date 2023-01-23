<?php
// pengecekan pencarian data
// jika dilakukan pencarian data, maka tampilkan kata kunci pencarian
if (isset($_POST['cari'])) {
  $cari = $_POST['cari'];
}
// jika tidak maka kosong
else {
  $cari = "";
}
?>

<div class="row">
  <div class="col-md-12">
    <?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    }
    // jika alert = 1
    // tampilkan pesan Sukses "Data Kleas berhasil disimpan"
    elseif ($_GET['alert'] == 1) { ?>
      <script>
        Swal.fire(
          'Berhasil Disimpan',
          'Data Berhasil Disimpan!',
          'success'
        )
      </script>
    <?php
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Data Kleas berhasil diubah"
    elseif ($_GET['alert'] == 2) { ?>
      <script>
        Swal.fire(
          'Berhasil Diubah',
          'Data Berhasil Diubah!',
          'success'
        )
      </script>
    <?php
    }
    // jika alert = 3
    // tampilkan pesan Sukses "Data Kleas berhasil dihapus"
    elseif ($_GET['alert'] == 3) { ?>
      <script>
        Swal.fire(
          'Berhasil Terhapus',
          'Data Berhasil Dihapus',
          'success'
        )
      </script>
    <?php
    }
    // jika alert = 4
    // tampilkan pesan Gagal "kode_kelas sudah ada"
    elseif ($_GET['alert'] == 4) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-times-circle"></i> Gagal!</strong> kode_kelas <b><?= $_GET['kode_kelas']; ?></b> sudah ada.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    }
    ?>
    <form class="mb-3" action="index.php" method="post">
      <div class="form-row">
        <!-- form cari -->
        <div class="col-3">
          <input type="text" class="form-control" name="cari" placeholder="Cari Kode Kelas atau Nama Kelas" value="<?= $cari; ?>">
        </div>
        <!-- tombol cari -->
        <div class="col-7">
          <button type="submit" class="btn btn-info">Cari</button>
        </div>
        <!-- tombol tambah data -->
        <div class="col-2">
          <a class="btn btn-info" href="?page=kelasTambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
        </div>
      </div>
    </form>

    <!-- Tabel siswa untuk menampilkan Data Kleas dari database -->
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Kode Kelas</th>
          <th>Nama Kelas</th>
          <th>Tingkat</th>
          <th>Wali Kelas</th>
          <th>Smt</th>
          <th>Tahun</th>
          <th>Kode Jurusan</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
        // Pagination --------------------------------------------------------------------------------------------
        // jumlah data yang ditampilkan setiap halaman
        $batas = 5;
        // jika dilakukan pencarian data
        if (isset($cari)) {
          // perintah query untuk menampilkan jumlah Data Kleas dari database berdasarkan kode_kelas atau nama yang sesuai dengan kata kunci pencarian
          $query_jumlah = mysqli_query($db, "SELECT count(kode_kelas) as jumlah FROM tbl_kelas WHERE kode_kelas LIKE '%$cari%' OR nama_kelas LIKE '%$cari%'")
            or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
        }
        // jika tidak dilakukan pencarian data
        else {
          // perintah query untuk menampilkan jumlah Data Kleas dari database
          $query_jumlah = mysqli_query($db, "SELECT count(kode_kelas) as jumlah FROM tbl_kelas")
            or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
        }
        // tampilkan jumlah data
        $data_jumlah = mysqli_fetch_assoc($query_jumlah);
        $jumlah      = $data_jumlah['jumlah'];
        $halaman     = ceil($jumlah / $batas);
        $page        = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
        $mulai       = ($page - 1) * $batas;
        // ------------------------------------------------------------------------------------------------------
        // nomor urut tabel
        $no = $mulai + 1;
        // jika dilakukan pencarian data
        if (isset($cari)) {
          // perintah query untuk menampilkan Data Kleas dari database berdasarkan kode_kelas atau nama yang sesuai dengan kata kunci pencarian
          // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
          $query = mysqli_query($db, "SELECT * FROM tbl_kelas tk INNER JOIN tbl_guru tg ON tg.nik = tk.wali_kelas JOIN tbl_jurusan tj ON tj.kode_jurusan = tk.kode_jurusan WHERE kode_kelas LIKE '%$cari%' OR nama_kelas LIKE '%$cari%'  ORDER BY kode_kelas DESC LIMIT $mulai, $batas")
            or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));
        }
        // jika tidak dilakukan pencarian data
        else {
          // perintah query untuk menampilkan Data Kleas dari database
          // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
          $query = mysqli_query($db, "SELECT * FROM tbl_kelas tk INNER JOIN tbl_guru tg ON tg.nik = tk.wali_kelas JOIN tbl_jurusan tj ON tj.kode_jurusan = tk.kode_jurusan ORDER BY kode_kelas DESC LIMIT $mulai, $batas")
            or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));
        }
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) { ?>
          <tr>
            <td width="30" class="center"><?= $no; ?></td>
            <td width="80" class="center"><?= $data['kode_kelas']; ?></td>
            <td width="80" class="center"><?= $data['nama_kelas']; ?></td>
            <td width="10" class="center"><?= $data['tingkat']; ?></td>
            <td width="140" class="center"><?= $data['wali_kelas']; ?> | <?= $data["nama"] ?></td>
            <td width="10" class="center"><?= $data['semester']; ?></td>
            <td width="80" class="center"><?= $data['tahun']; ?></td>
            <td width="100" class="center"><?= $data['kode_jurusan']; ?> | <?= $data["nama_jurusan"] ?></td>

            <td width="100" class="center">
              <a title="Ubah" class="btn btn-outline-info" href="?page=kelasUbah&kode_kelas=<?= $data['kode_kelas']; ?>"><i class="fas fa-edit"></i></a>
              <a title="Hapus" class="btn btn-outline-danger" href="kelas_proses_hapus.php?kode_kelas=<?= $data['kode_kelas']; ?>" onclick="return confirm('Anda yakin ingin menghapus kelas <?= $data['nama_kelas']; ?>?');"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php
          $no++;
        } ?>
      </tbody>
    </table>
    <!-- Tampilkan Pagination -->
    <?php
    // fungsi untuk pengecekan halaman aktif
    // jika halaman kosong atau tidak ada yang dipilih
    if (empty($_GET['hal'])) {
      // halaman aktif = 1
      $halaman_aktif = '1';
    }
    // selain itu 
    else {
      // halaman aktif = sesuai yang dipilih
      $halaman_aktif = $_GET['hal'];
    }
    ?>
    <div class="row">
      <div class="col">
        <!-- tampilkan informasi jumlah halaman dan jumlah data -->
        <a>
          Halaman <?= $halaman_aktif; ?> dari <?= $halaman; ?> -
          Total <?= $jumlah; ?> data
        </a>
      </div>
      <div class="col">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <!-- Button untuk halaman sebelumnya -->
            <?php
            // jika halaman aktif = 0 atau = 1, maka button Sebelumnya = disable 
            if ($halaman_aktif <= '1') { ?>
              <li class="page-item disabled"> <span class="page-link">Sebelumnya</span></li>
            <?php
            }
            // jika halaman aktif > 1, maka button Sebelumnya = aktif 
            else { ?>
              <li class="page-item"><a class="page-link" href="?hal=<?= $page - 1 ?>">Sebelumnya</a></li>
            <?php } ?>

            <!-- Button untuk link halaman 1 2 3 ... -->
            <?php
            for ($x = 1; $x <= $halaman; $x++) { ?>
              <li class="page-item"><a class="page-link" href="?hal=<?= $x ?>"><?= $x ?></a></li>
            <?php } ?>

            <!-- Button untuk halaman selanjutnya -->
            <?php
            // jika halaman aktif >= jumlah halaman, maka button Selanjutnya = disable 
            if ($halaman_aktif >= $halaman) { ?>
              <li class="page-item disabled"> <span class="page-link">Selanjutnya</span></li>
            <?php
            }
            // jika halaman aktif <= jumlah halaman, maka button Selanjutnya = aktif 
            else { ?>
              <li class="page-item"><a class="page-link" href="?hal=<?= $page + 1 ?>">Selanjutnya</a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>