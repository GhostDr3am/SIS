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
    // tampilkan pesan Sukses "Data Kelas berhasil disimpan"
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
    // tampilkan pesan Sukses "Data Kelas berhasil diubah"
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
    // tampilkan pesan Sukses "Data Kelas berhasil dihapus"
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
    // tampilkan pesan Gagal "kode_mapel sudah ada"
    elseif ($_GET['alert'] == 4) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-times-circle"></i> Gagal!</strong> kode_mapel <b><?= $_GET['kode_mapel']; ?></b> sudah ada.
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
          <input type="text" class="form-control" name="cari" placeholder="Cari Kode Mapel atau Nama Mapel" value="<?= $cari; ?>">
        </div>
        <!-- tombol cari -->
        <div class="col-7">
          <button type="submit" class="btn btn-info">Cari</button>
        </div>
        <!-- tombol tambah data -->
        <div class="col-2">
          <a class="btn btn-info" href="?page=mapelTambah" role="button"><i class="fas fa-plus"></i> Tambah</a>
        </div>
      </div>
    </form>

    <!-- Tabel siswa untuk menampilkan Data Mata Pelajaran dari database -->
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Kode Mata Pelajaran</th>
          <th>Nama Mata Pelajaran</th>
          <th>Semester</th>
          <th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
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
          // perintah query untuk menampilkan jumlah Data Mata Pelajaran dari database berdasarkan kode_mapel atau nama yang sesuai dengan kata kunci pencarian
          $query_jumlah = mysqli_query($db, "SELECT count(kode_mapel) as jumlah FROM tbl_mapel WHERE kode_mapel LIKE '%$cari%' OR nama_mapel LIKE '%$cari%'")
            or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($db));
        }
        // jika tidak dilakukan pencarian data
        else {
          // perintah query untuk menampilkan jumlah Data Mata Pelajaran dari database
          $query_jumlah = mysqli_query($db, "SELECT count(kode_mapel) as jumlah FROM tbl_mapel")
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
          // perintah query untuk menampilkan Data Mata Pelajaran dari database berdasarkan kode_mapel atau nama yang sesuai dengan kata kunci pencarian
          // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
          $query = mysqli_query($db, "SELECT * FROM tbl_mapel tm INNER JOIN tbl_jurusan tj ON tj.kode_jurusan = tm.kode_jurusan  WHERE kode_mapel LIKE '%$cari%' OR nama_mapel LIKE '%$cari%'  ORDER BY kode_mapel DESC LIMIT $mulai, $batas")
            or die('Ada kesalahan pada query siswa: ' . mysqli_error($db));
        }
        // jika tidak dilakukan pencarian data
        else {
          // perintah query untuk menampilkan Data Mata Pelajaran dari database
          // data yang ditampilkan mulai = $mulai sampai dengan batas = $batas
          // 
          $query = mysqli_query($db, "SELECT * FROM tbl_mapel tm INNER JOIN tbl_jurusan tj ON tj.kode_jurusan=tm.kode_jurusan ORDER BY kode_mapel DESC LIMIT $mulai, $batas");
        }
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) { ?>
          <tr>
            <td width="30" class="center"><?= $no; ?></td>
            <td width="180" class="center"><?= $data['kode_mapel']; ?></td>
            <td width="80" class="center"><?= $data['nama_mapel']; ?></td>
            <td width="80" class="center"><?= $data['semester']; ?></td>
            <td width="80" class="center"><?= $data['kode_jurusan']; ?></td>
            <td width="80" class="center"><?= $data['nama_jurusan']; ?></td>

            <td width="120" class="center">
              <a title="Ubah" class="btn btn-outline-info" href="?page=mapelUbah&kode_mapel=<?= $data['kode_mapel']; ?>"><i class="fas fa-edit"></i></a>
              <a title="Hapus" class="btn btn-outline-danger" href="mapel_proses_hapus.php?kode_mapel=<?= $data['kode_mapel']; ?>" onclick="return confirm('Anda yakin ingin menghapus mapel <?= $data['nama_mapel']; ?>?');"><i class="fas fa-trash"></i></a>
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
              <li class="page-item"><a class="page-link" href="?page=mapel&hal=<?= $page - 1 ?>">Sebelumnya</a></li>
            <?php } ?>

            <!-- Button untuk link halaman 1 2 3 ... -->
            <?php
            for ($x = 1; $x <= $halaman; $x++) { ?>
              <li class="page-item"><a class="page-link" href="?page=mapel&hal=<?= $x ?>"><?= $x ?></a></li>
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
              <li class="page-item"><a class="page-link" href="?page=mapel&hal=<?= $page + 1 ?>">Selanjutnya</a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>