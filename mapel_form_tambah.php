<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info" role="alert">
			<i class="fas fa-edit"></i> Input Data Mata Pelajaran
		</div>

		<div class="card">
			<div class="card-body">
				<!-- form tambah Data mapel -->
				<form class="needs-validation" action="mapel_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>

					<div class="row justify-content-center">
						<div class="col-md-3">
							<div class="form-group">
								<label>Kode Mata Pelajaran</label>
								<input type="text" class="form-control" name="kode_mapel" maxlength="6" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
								<div class="invalid-feedback">Kode Mapel tidak boleh kosong.</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Nama Mata Pelajaran</label>
								<input type="text" class="form-control" name="nama_mapel" autocomplete="off" required>
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
										<option value="<?= $s ?>"><?= $s ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Kode Jurusan</label>
								<select name="kode_jurusan" id="kode_jurusan" class="form-control">
									<?php $query = mysqli_query($db, "SELECT * FROM tbl_jurusan"); ?>
									<?php while ($dataJurusan = mysqli_fetch_assoc($query)) : ?>
										<option value="<?= $dataJurusan["kode_jurusan"] ?>"><?= $dataJurusan["kode_jurusan"] ?> | <?= $dataJurusan["nama_jurusan"] ?></option>
									<?php endwhile; ?>
								</select>
								<div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
							</div>
						</div>
					</div>

					<div class="my-md-4 pt-md-1 border-top"> </div>

					<div class="form-group col-md-12 center">
						<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
						<a href="index.php?page=mapel" class="btn btn-secondary btn-reset"> Batal </a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>