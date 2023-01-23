	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Input Data Waktu
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form tambah Data waktu -->
					<form class="needs-validation" action="waktu_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Hari</label>
									<select name="hari" id="hari" class="form-control">
										<option value="Senin">Senin</option>
										<option value="Selasa">Selasa</option>
										<option value="Rabu">Rabu</option>
										<option value="Kamis">Kamis</option>
										<option value="Jum'at">Jum'at</option>
										<option value="Sabtu">Sabtu</option>
									</select>
									<div class="invalid-feedback">Hari tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Masuk</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="jam_masuk" autocomplete="off" required>
									<div class="invalid-feedback">Jam Masuk tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Keluar</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="jam_keluar" autocomplete="off" required>
									<div class="invalid-feedback">Jam Keluar tidak boleh kosong.</div>
								</div>
							</div>
						</div>

						<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-12 center">
							<input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
							<a href="index.php?page=waktu" class="btn btn-secondary btn-reset"> Batal </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>