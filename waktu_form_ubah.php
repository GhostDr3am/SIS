	<?php
	// jika tombol ubah diklik
	if (isset($_GET['id_waktu'])) {
		// ambil data get dari form
		$id_waktu = $_GET['id_waktu'];
		// perintah query untuk menampilkan data dari tabel siswa berdasarkan id_waktu
		$query = mysqli_query($db, "SELECT * FROM tbl_waktu WHERE id_waktu='$id_waktu'");
		$data = mysqli_fetch_assoc($query);
		// buat variabel untuk menampung data
		$id_waktu		 	= $data['id_waktu'];
		$hari					= $data['hari'];
		$jam_masuk		= $data['jam_masuk'];
		$jam_keluar		= $data['jam_keluar'];
	}
	// tutup koneksi
	mysqli_close($db);
	?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Ubah Data Waktu
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form ubah Data Waktu -->
					<form class="needs-validation" action="waktu_proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">

							<input type="hidden" name="id_waktu" value="<?= $id_waktu ?>">

							<div class="col-md-3">
								<div class="form-group">
									<label>Hari</label>
									<select name="hari" id="hari" class="form-control">
										<option value="Senin" <?= ($hari === 'Senin') ? 'selected' : '' ?>>Senin</option>
										<option value="Selasa" <?= ($hari === 'Selasa') ? 'selected' : '' ?>>Selasa</option>
										<option value="Rabu" <?= ($hari === 'Rabu') ? 'selected' : '' ?>>Rabu</option>
										<option value="Kamis" <?= ($hari === 'Kamis') ? 'selected' : '' ?>>Kamis</option>
										<option value="Jum'at" <?= ($hari === "Jum'at") ? 'selected' : '' ?>>Jum'at</option>
										<option value="Sabtu" <?= ($hari === 'Sabtu') ? 'selected' : '' ?>>Sabtu</option>
									</select>
									<div class="invalid-feedback">Hari tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Masuk</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="jam_masuk" autocomplete="off" required value="<?= $jam_masuk ?>">
									<div class="invalid-feedback">Jam Masuk tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Keluar</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="jam_keluar" autocomplete="off" required value="<?= $jam_keluar ?>">
									<div class="invalid-feedback">Jam Keluar tidak boleh kosong.</div>
								</div>
							</div>


						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 right">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=waktu" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>