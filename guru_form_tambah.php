	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Input Data Guru
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form tambah Data Guru -->
					<form class="needs-validation" action="guru_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>
						<div class="row">
							<div class="col">
								<div class="form-group col-md-12">
									<label>NIK</label>
									<input type="text" class="form-control" name="nik" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">NIK tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Nama Guru</label>
									<input type="text" class="form-control" name="nama" autocomplete="off" required>
									<div class="invalid-feedback">Nama Guru tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label class="mb-3">Jenis Kelamin</label>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="customControlValidation2" name="jenis_kelamin" value="Laki-laki" required>
										<label class="custom-control-label" for="customControlValidation2">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio mb-4">
										<input type="radio" class="custom-control-input" id="customControlValidation3" name="jenis_kelamin" value="Perempuan" required>
										<label class="custom-control-label" for="customControlValidation3">Perempuan</label>
										<div class="invalid-feedback">Pilih salah satu jenis kelamin.</div>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="mb-3">Status</label>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="menikah" name="status" value="Menikah" required>
										<label class="custom-control-label" for="menikah">Menikah</label>
									</div>
									<div class="custom-control custom-radio mb-4">
										<input type="radio" class="custom-control-input" id="belum" name="status" value="Belum Menikah" required>
										<label class="custom-control-label" for="belum">Belum Menikah</label>
										<div class="invalid-feedback">Pilih salah satu Status.</div>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label>Agama</label>
									<select class="form-control" name="agama" autocomplete="off" required>
										<option value=""></option>
										<option value="Islam">Islam</option>
										<option value="Kristen Protestan">Kristen Protestan</option>
										<option value="Kristen Katolik">Kristen Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Buddha">Buddha</option>
									</select>
									<div class="invalid-feedback">Agama tidak boleh kosong.</div>
								</div>
							</div>

							<div class="col">
								<div class="form-group col-md-12">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control" name="tempat_lahir" autocomplete="off" required>
									<div class="invalid-feedback">Tempat Lahir tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Tanggal Lahir</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" required>
									<div class="invalid-feedback">Tanggal Lahir tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>No. HP</label>
									<input type="text" class="form-control" name="no_hp" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">No. HP tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Email</label>
									<input type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">Email tidak boleh kosong.</div>
								</div>
							</div>

							<div class="col">
								<div class="form-group col-md-12">
									<label>Foto Guru</label>
									<input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
									<div id="imagePreview"><img class="foto-preview" src="foto/default.png" /></div>
									<div class="invalid-feedback">Foto Guru tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 right">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=guru" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>