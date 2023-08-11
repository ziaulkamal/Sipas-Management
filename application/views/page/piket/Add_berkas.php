<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
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
		<!-- end page title -->
		<div class="row">
			<div class="col-8">
				<div class="card">
					<div class="card-body">
						<div class="row">

							<form class="row g-3" action="<?= base_url($action); ?>" method="POST"
								enctype="multipart/form-data">
								<?php if (isset($data['idTrx'])) { ?>
								<input type="hidden" name="idTrx" value="<?= $data['idTrx'] ?>">
								<div class="col-md-6">
									<label for="nomor_surat" class="form-label">Nomor Surat</label>
									<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= $data['nomorDTrx'] ?><?= set_value('nomor_surat') ?>">
									<div class="form-text text-danger"><?= form_error('nomor_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="judul_surat" class="form-label">Judul Surat</label>
									<input type="text" class="form-control" id="judul_surat" name="judul_surat" value="<?= $data['judulSurat'] ?><?= set_value('judul_surat') ?>">
									<div class="form-text text-danger"><?= form_error('judul_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="tanggal_surat" class="form-label">Tanggal Surat</label>
									<input type="date" class="form-control" id="tanggal_surat"
										name="tanggal_surat" value="<?= $data['tglSuratMasuk'] ?><?= set_value('tanggal_surat') ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="lampiran" class="form-label">Lampiran</label>
									<?php if (isset($data['idTrx'])) { ?>
										<input type="hidden" class="form-control" id="lampiran" name="lampiran_old" value="<?= $data['lampiranDTrx'] ?>">
									<?php }?>
									<input type="file" class="form-control" id="lampiran" name="lampiran"">
								</div>
								<div class="col-md-12">
									<label for="keterangan_surat" class="form-label">Keterangan Surat</label>
									<textarea class="form-control" id="keterangan_surat" name="keterangan_surat"
										data-parsley-trigger="keyup" data-parsley-minlength="20"
										data-parsley-maxlength="100"
										data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
										data-parsley-validation-threshold="10"><?= $data['keteranganDTrx'] ?><?= set_value('keterangan_surat') ?></textarea>
									<div class="form-text text-danger"><?= form_error('keterangan_surat'); ?></div>
								</div>
								<?php 
									if ($this->session->userdata('level_access') == 3 ||$this->session->userdata('level_access') == 2 ) { ?>
									<div class="col-md-4">
									<div class="tujuan">
										<label for="project-priority" class="form-label">Tujuan kepada :</label>
										<select class="form-control" data-toggle="select2" data-width="100%" name="tujuan" id="tujuan">
												<option default value="">--Pilih--</option>
												<option value="persuratan">Persuratan</option>
												<option value="pimpinan">Pimpinan</option>
												<option value="pembinaan">Pembinaan</option>
												<option value="koordinator">Koordinator</option>
												<option value="pengawasan">Asisten Pengawasan</option>
												<option value="kepala bagian tata usaha">Kepala Bagian Tata Usaha</option>
												<option value="wakil kepala kejaksaan tinggi">Wakil Kepala Kejaksaan Tinggi</option>
												<option value="asistentu">Asisten Perdata dan Tata Usaha Negara</option>
												<option value="intel">Asisten Intelijen</option>
												<option value="asisten pidana militer">Asisten Pidana Militer</option>
												<option value="asisten tindak pidana umum">Asisten Tindak Pidana Umum</option>
												<option value="asisten tindak pidana khusus">Asisten Tindak Pidana Khusus</option>
										</select>
									</div>
								</div>
									<?php }
								?>


								<?php }else { ?>
								<div class="col-md-6">
									<label for="nomor_surat" class="form-label">Nomor Surat</label>
									<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="<?= set_value('nomor_surat') ?>">
									<div class="form-text text-danger"><?= form_error('nomor_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="judul_surat" class="form-label">Judul Surat</label>
									<input type="text" class="form-control" id="judul_surat" name="judul_surat" value="<?= set_value('judul_surat') ?>">
									<div class="form-text text-danger"><?= form_error('judul_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="tanggal_surat" class="form-label">Tanggal Surat</label>
									<input type="date" class="form-control" id="tanggal_surat"
										name="tanggal_surat" value="<?= set_value('tanggal_surat') ?>">
									<div class="form-text text-danger"><?= form_error('tanggal_surat'); ?></div>
								</div>
								<div class="col-md-6">
									<label for="lampiran" class="form-label">Lampiran</label>
									<input type="file" class="form-control" id="lampiran" name="lampiran"">
								</div>
								<div class="col-md-12">
									<label for="keterangan_surat" class="form-label">Keterangan Surat</label>
									<textarea class="form-control" id="keterangan_surat" name="keterangan_surat"
										data-parsley-trigger="keyup" data-parsley-minlength="20"
										data-parsley-maxlength="100"
										data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
										data-parsley-validation-threshold="10"><?= set_value('keterangan_surat') ?></textarea>
									<div class="form-text text-danger"><?= form_error('keterangan_surat'); ?></div>
								</div>
								<?php } ?>
								<div class="col-12">
									<?php if (isset($data['idTrx'])) { ?>
										<button class="btn btn-success" type="submit" id="simpan">Update Data</button>
									<?php }else { ?>
										<button class="btn btn-success" type="submit" id="simpan">Tambah Data</button>
									<?php }?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>