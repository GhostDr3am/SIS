	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Input Data Kelas
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form tambah Data Kelas -->
					<form class="needs-validation" action="kelas_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Kelas</label>
									<input type="text" class="form-control" name="kode_kelas" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">Kode Kelas tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama Kelas</label>
									<select name="nama_kelas" id="nama_kelas" class="form-control">
										<option value="Anggrek">Anggrek</option>
										<option value="Mawar">Mawar</option>
										<option value="Melati">Melati</option>
									</select>
									<div class="invalid-feedback">Nama Kelas tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Tingkat</label>
									<select name="tingkat" id="tingkat" class="form-control">
										<?php for ($tingkat = 10; $tingkat <= 12; $tingkat++) : ?>
											<option value="<?= $tingkat ?>"><?= $tingkat ?></option>
										<?php endfor; ?>
									</select>
									<div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Wali Kelas</label>
									<select name="wali_kelas" id="wali_kelas" class="form-control">
										<?php $row = mysqli_query($db, "SELECT * FROM tbl_guru"); ?>
										<?php while ($guru = mysqli_fetch_assoc($row)) : ?>
											<option value="<?= $guru["nik"] ?>"><?= $guru["nik"] ?> | <?= $guru["nama"] ?></option>
										<?php endwhile; ?>
									</select>
									<div class="invalid-feedback">Nama Jurusan tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Semester</label>
									<select name="semester" id="semester" class="form-control">
										<?php for ($semester = 1; $semester <= 2; $semester++) : ?>
											<option value="<?= $semester ?>"><?= $semester ?></option>
										<?php endfor; ?>
									</select>
									<div class="invalid-feedback">Semester tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" id="tahun" class="form-control">
										<?php for ($tahun = 2010; $tahun <= 2030; $tahun++) : ?>
											<option value="<?= $tahun ?>"><?= $tahun ?></option>
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
										<?php $row = mysqli_query($db, "SELECT * FROM tbl_jurusan"); ?>
										<?php while ($jr = mysqli_fetch_assoc($row)) : ?>
											<option value="<?= $jr["kode_jurusan"] ?>"><?= $jr["kode_jurusan"] ?> | <?= $jr["nama_jurusan"] ?></option>
										<?php endwhile; ?>
									</select>
									<div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 center">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=jurusan" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>