	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">
				<i class="fas fa-edit"></i> Input Data Jurusan
			</div>

			<div class="card">
				<div class="card-body">
					<!-- form tambah Data Jurusan -->
					<form class="needs-validation" action="jurusan_proses_simpan.php" method="post" enctype="multipart/form-data" novalidate>

						<div class="row justify-content-center">
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Jurusan</label>
									<input type="text" class="form-control" name="kode_jurusan" maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
									<div class="invalid-feedback">Kode Jurusan tidak boleh kosong.</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama Jurusan</label>
									<select name="nama_jurusan" id="nama_jurusan" class="form-control">
										<option value="IPA">IPA</option>
										<option value="IPS">IPS</option>
										<option value="Bahasa">Bahasa</option>
									</select>
									<div class="invalid-feedback">Nama Jurusan tidak boleh kosong.</div>
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