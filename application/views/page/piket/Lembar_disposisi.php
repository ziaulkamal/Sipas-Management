<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<?php $this->load->view('partials/breadcrumb'); ?>
					</div>
					<h4 class="page-title"><?= $titlePage ?></h4>
				</div>
			</div>
		</div>

		<?php $this->load->view('partials/alerts') ?>

		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url($action); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="idTrx" value="<?= $data['idTrx'] ?>">
							<?php if (isset($data['nomorAgendaD'])) { ?>
								<input type="hidden" name="idDisposisi" value="<?= $data['idDisposisi'] ?>">
								<div class="row mb-3">
								<div class="col-md-6">
									<label for="nomor_agenda" class="form-label">Nomor Agenda / Registrasi<code>*(bidang
											ini terisi otomatis)</code></label>
									<input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda"
										value="<?= $data['nomorAgendaD'] ?>" readonly>
								</div>
								<div class="col-md-6">
									<label for="tanggal_penerimaan" class="form-label">Tanggal Penerimaan</label>
									<input type="date" class="form-control" id="tanggal_penerimaan"
										name="tanggal_penerimaan" value="<?= $data['tglPenerimaanD'] ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_penerimaan'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="tanggal_surat" class="form-label">Tanggal dan Nomor Surat <code>*(bidang
											ini terisi otomatis)</code></label>
									<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
										value="<?= $data['tglSuratMasuk'] ?>" readonly>
								</div>
								<div class="col-md-6">
									<label for="dari" class="form-label">Dari / Asal Surat</label>
									<input type="text" class="form-control" id="dari" name="dari"
										value="<?= $data['asalSuratD'] ?>">
									<div class="form-text text-danger"><?= form_error('dari'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="ringkasan_surat" class="form-label">Hal / Ringkasan Isi Surat</label>
									<textarea class="form-control" id="ringkasan_surat" name="ringkasan_surat"
										rows="3"><?= $data['ringkasanKet'] ?></textarea>
									<div class="form-text text-danger"><?= form_error('ringkasan_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="lampiran" class="form-label">Lampiran</label>
									<textarea class="form-control" id="lampiran" name="lampiran"
										rows="3"><?= $data['lampiranD'] ?></textarea>
									<div class="form-text text-danger"><?= form_error('lampiran'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="tanggal_penyelesaian" class="form-label">Tanggal Penyelesaian</label>
									<input type="date" class="form-control" id="tanggal_penyelesaian"
										name="tanggal_penyelesaian" value="<?= $data['tglPenyelesaianD'] ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_penyelesaian'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="selectPimpinan" class="form-label">Teruskan Kepada</label>

									<?php switch ($data['tujuanPimpinanD']) {
										case 'kajati': ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option selected value="kajati">Kajati</option>
										<option value="wakajati">Wakajati</option>
									</select>
									<?php break;
										case 'wakajati': ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option value="kajati">Kajati</option>
										<option selected value="wakajati">Wakajati</option>
									</select>
									<?php break;
										
										default: ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option selected value="">--Pilih--</option>
										<option value="kajati">Kajati</option>
										<option value="wakajati">Wakajati</option>
									</select>
									<?php break;
									}?>

									<div class="form-text text-danger"><?= form_error('selectPimpinan'); ?></div>
								</div>

							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Tingkat Keamanan</label>

									<br>

									<?php switch ($data['tingkatKeamananD']) {
										case 'sr': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr" checked>
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 'r': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r" checked>
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 't': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t" checked>
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 'b': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b" checked>
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										default: ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
									}?>
									<div class="form-text text-danger"><?= form_error('radioKeamanan'); ?></div>
								</div>
							</div>
							<?php }else { ?>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="nomor_agenda" class="form-label">Nomor Agenda / Registrasi<code>*(bidang
											ini terisi otomatis)</code></label>
									<input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda"
										value="<?= $nomorAgenda ?>" readonly>
								</div>
								<div class="col-md-6">
									<label for="tanggal_penerimaan" class="form-label">Tanggal Penerimaan</label>
									<input type="date" class="form-control" id="tanggal_penerimaan"
										name="tanggal_penerimaan" value="<?= set_value('tanggal_penerimaan') ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_penerimaan'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="tanggal_surat" class="form-label">Tanggal dan Nomor Surat <code>*(bidang
											ini terisi otomatis)</code></label>
									<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
										value="<?= $data['tglSuratMasuk'] ?>" readonly>
								</div>
								<div class="col-md-6">
									<label for="dari" class="form-label">Dari / Asal Surat</label>
									<input type="text" class="form-control" id="dari" name="dari"
										value="<?= set_value('dari') ?>">
									<div class="form-text text-danger"><?= form_error('dari'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="ringkasan_surat" class="form-label">Hal / Ringkasan Isi Surat</label>
									<textarea class="form-control" id="ringkasan_surat" name="ringkasan_surat"
										rows="3"><?= set_value('ringkasan_surat') ?></textarea>
									<div class="form-text text-danger"><?= form_error('ringkasan_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="lampiran" class="form-label">Lampiran</label>
									<textarea class="form-control" id="lampiran" name="lampiran"
										rows="3"><?= set_value('lampiran') ?></textarea>
									<div class="form-text text-danger"><?= form_error('lampiran'); ?></div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="tanggal_penyelesaian" class="form-label">Tanggal Penyelesaian</label>
									<input type="date" class="form-control" id="tanggal_penyelesaian"
										name="tanggal_penyelesaian" value="<?= set_value('tanggal_penyelesaian') ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_penyelesaian'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="selectPimpinan" class="form-label">Teruskan Kepada</label>

									<?php switch (set_value('selectPimpinan')) {
										case 'kajati': ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option selected value="kajati">Kajati</option>
										<option value="wakajati">Wakajati</option>
									</select>
									<?php break;
										case 'wakajati': ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option value="kajati">Kajati</option>
										<option selected value="wakajati">Wakajati</option>
									</select>
									<?php break;
										
										default: ?>
									<select class="form-select" id="example-select" name="selectPimpinan">
										<option selected value="">--Pilih--</option>
										<option value="kajati">Kajati</option>
										<option value="wakajati">Wakajati</option>
									</select>
									<?php break;
									}?>

									<div class="form-text text-danger"><?= form_error('selectPimpinan'); ?></div>
								</div>

							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label class="form-label">Tingkat Keamanan</label>

									<br>

									<?php switch (set_value('radioKeamanan')) {
										case 'sr': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr" checked>
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 'r': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r" checked>
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 't': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t" checked>
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										case 'b': ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b" checked>
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
										
										default: ?>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="sr"
											value="sr">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="r"
											value="r">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="t"
											value="t">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" name="radioKeamanan" id="b"
											value="b">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
									<?php break;
									}?>
									<div class="form-text text-danger"><?= form_error('radioKeamanan'); ?></div>
								</div>
							</div>
							<?php }?>


							<button type="submit" class="btn btn-success waves-effect waves-light mt-3"><i
									class="fe-navigation"></i> Kirim</button>
							<button type="reset" class="btn btn-outline-secondary waves-effect waves-light mt-3">Reset
								Form</button>
						</form>

					</div> <!-- end card-body-->
				</div> <!-- end card-->
			</div>
		</div>


	</div> <!-- container -->

</div>
