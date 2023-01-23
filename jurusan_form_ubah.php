	<?php
	// jika tombol ubah diklik
	if (isset($_GET['kode_jurusan'])) {
		// ambil data get dari form
		$kode_jurusan = $_GET['kode_jurusan'];
		// perintah query untuk menampilkan data dari tabel siswa berdasarkan kode_jurusan
		$query = mysqli_query($db, "SELECT * FROM tbl_jurusan WHERE kode_jurusan='$kode_jurusan'");
		$data = mysqli_fetch_assoc($query);
		// buat variabel untuk menampung data
		$kode_jurusan		 	= $data['kode_jurusan'];
		$nama_jurusan			= $data['nama_jurusan'];
	}
	// tutup koneksi
	mysqli_close($db);
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Ubah Data Jurusan
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form ubah Data Jurusan -->
					<form class="needs-validation" action="jurusan_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Jurusan</label>
									<input type="text" class="form-control" name="kode_jurusan" value="<?= $kode_jurusan ?>" readonly>
									<div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama Jurusan</label>
									<select name="nama_jurusan" id="nama_jurusan" class="form-control">
										<?php if ($nama_jurusan === 'IPA') : ?>
											<option value="IPA" selected>IPA</option>
										<?php elseif ($nama_jurusan === 'IPS') : ?>
											<option value="IPS" selected>IPS</option>
										<?php elseif ($nama_jurusan === 'Bahasa') : ?>
											<option value="Bahasa" selected>Bahasa</option>
										<?php endif; ?>
										<option value="IPA">IPA</option>
										<option value="IPS">IPS</option>
										<option value="Bahasa">Bahasa</option>
									</select>
									<div class="invalid-feedback">Nama Jurusan tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 right">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=jurusan" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>