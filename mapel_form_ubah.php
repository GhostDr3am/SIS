	<?php
	// jika tombol ubah diklik
	if (isset($_GET['kode_mapel'])) {
		// ambil data get dari form
		$kode_mapel = $_GET['kode_mapel'];
		// perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_mapel
		$query = mysqli_query($db, "SELECT * FROM tbl_mapel WHERE kode_mapel='$kode_mapel'");
		$data = mysqli_fetch_assoc($query);
		// buat variabel untuk menampung data
		$kode_mapel		 	= $data['kode_mapel'];
		$nama_mapel			= $data['nama_mapel'];
		$semester				= $data['semester'];
		$kode_jurusan		= $data['kode_jurusan'];
	}
	$rows = [];
	$result = mysqli_query($db, "SELECT * FROM tbl_jurusan");
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	// tutup koneksi
	mysqli_close($db);
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Ubah Data Mata Pelajaran
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form ubah Data Mata Pelajaran -->
					<form class="needs-validation" action="mapel_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">

								<div class="form-group">
									<label>Kode Mata Pelajaran</label>
									<input type="text" class="form-control" name="kode_mapel" value="<?= $kode_mapel ?>" readonly>
									<div class="invalid-feedback">Kode Mapel tidak boleh kosong.</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label>Nama Mata Pelajaran</label>
									<input type="text" class="form-control" name="nama_mapel" autocomplete="off" required value="<?= $nama_mapel ?>">
									<div class="invalid-feedback">Nama mapel tidak boleh kosong.</div>
								</div>
							</div>

						</div>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Semester</label>
									<select name="semester" id="semester" class="form-control">
										<?php for ($s = 1; $s <= 2; $s++) : ?>
											<?php if ($semester == $s) : ?>
												<option selected value="<?= $semester ?>"><?= $semester ?></option>
											<?php else : ?>
												<option value="<?= $s ?>"><?= $s ?></option>
											<?php endif; ?>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Kelas</label>
									<select name="kode_jurusan" id="kode_jurusan" class="form-control">
										<?php foreach ($rows as $d) : ?>
											<option value="<?php echo $d['kode_jurusan'] ?>" <?php echo ($d['kode_jurusan'] == $data['kode_jurusan']) ? "selected" : ""; ?>><?php echo $d['kode_jurusan'] . " | " . $d['nama_jurusan']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 right">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=mapel" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>