	<?php
	// jika tombol ubah diklik
	if (isset($_GET['kode_kelas'])) {
		// ambil data get dari form
		$kode_kelas = $_GET['kode_kelas'];
		// perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_kelas
		$query = mysqli_query($db, "SELECT * FROM tbl_kelas WHERE kode_kelas='$kode_kelas'");
		$data = mysqli_fetch_assoc($query);
		// buat variabel untuk menampung data
		$kode_kelas		 	= $data['kode_kelas'];
		$nama_kelas			= $data['nama_kelas'];
		$tingkat				= $data['tingkat'];
		$wali_kelas			= $data['wali_kelas'];
		$semester				= $data['semester'];
		$tahun					= $data['tahun'];
		$kode_jurusan		= $data['kode_jurusan'];
	}

	$res = mysqli_query($db, "SELECT * FROM tbl_guru");
	$rows = [];
	while ($row = mysqli_fetch_assoc($res)) {
		$rows[] = $row;
	}

	$result = mysqli_query($db, "SELECT * FROM tbl_jurusan");
	$kj = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$kj[] = $row;
	}
	// tutup koneksi
	mysqli_close($db);
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Ubah Data Kelas
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form ubah Data Kelas -->
					<form class="needs-validation" action="kelas_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode kelas</label>
									<input type="text" class="form-control" name="kode_kelas" value="<?= $kode_kelas ?>" readonly>
									<div class="invalid-feedback">Kode kelas tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama kelas</label>
									<select name="nama_kelas" id="nama_kelas" class="form-control">
										<?php if ($nama_kelas === 'Anggrek') : ?>
											<option value="Anggrek" selected>Anggrek</option>
										<?php elseif ($nama_kelas === 'Mawar') : ?>
											<option value="Mawar" selected>Mawar</option>
										<?php elseif ($nama_kelas === 'Melati') : ?>
											<option value="Melati" selected>Melati</option>
										<?php else : ?>
											<option value="Tulip" selected>Tulip</option>
										<?php endif; ?>
										<option value="Anggrek">Anggrek</option>
										<option value="Mawar">Mawar</option>
										<option value="Melati">Melati</option>
										<option value="Tulip">Tulip</option>
									</select>
									<div class="invalid-feedback">Nama kelas tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Tingkat</label>
									<select name="tingkat" id="tingkat" class="form-control">
										<?php for ($t = 10; $t <= 12; $t++) : ?>
											<option value="<?= $t ?>" <?= ($t == $tingkat) ? "selected" : "" ?>><?= $t ?></option>
										<?php endfor; ?>
									</select>
									<div class="invalid-feedback">Tingkat tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Wali kelas</label>
									<select name="wali_kelas" id="wali_kelas" class="form-control">
										<?php foreach ($rows as $gr) : ?>
											<option value="<?= $gr["nik"] ?>" <?= ($gr["nik"] === $wali_kelas) ? "selected" : "" ?>><?= $gr["nik"] ?> | <?= $gr["nama"] ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">Wali kelas tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Semester</label>
									<select name="semester" id="semester" class="form-control">
										<?php for ($s = 1; $s <= 2; $s++) : ?>
											<option value="<?= $s ?>" <?= ($s == $semester) ? "selected" : "" ?>><?= $s ?></option>
										<?php endfor; ?>
									</select>
									<div class="invalid-feedback">Semester tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" id="tahun" class="form-control">
										<?php for ($th = 2010; $th <= 2030; $th++) : ?>
											<option value="<?= $th ?>" <?= ($th == $tahun) ? "selected" : "" ?>><?= $th ?></option>
										<?php endfor; ?>
									</select>
									<div class="invalid-feedback">Tahun tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-6">
								<div class="form-group">
									<label>Kode Jurusan</label>
									<select name="kode_jurusan" id="kode_jurusan" class="form-control">
										<?php foreach ($kj as $k) : ?>
											<option value="<?= $k["kode_jurusan"] ?>" <?= ($k["kode_jurusan"] === $kode_jurusan) ? "selected" : "" ?>><?= $k["kode_jurusan"] ?> | <?= $k["nama_jurusan"] ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">Kode kelas tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 center">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=kelas" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>