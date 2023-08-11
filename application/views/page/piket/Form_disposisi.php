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

		<!-- set flash data -->
		<?php $this->load->view('partials/alerts');?>

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">

						<!-- modal content -->
						<div id="pesan-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">

										<form action="#" class="px-3">
											<label for="keterangan_surat" class="form-label text-dark">Keterangan Surat</label>
											<textarea class="form-control text-dark" id="keterangan_surat" name="keterangan_surat"
												data-parsley-trigger="keyup" data-parsley-minlength="100"
												data-parsley-maxlength="100"
												data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
												data-parsley-validation-threshold="50"></textarea>

											<div class="mt-2 text-center">
												<button class="btn rounded-pill btn-primary" type="submit">Kirim
													Pesan</button>
											</div>

										</form>

									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
						<!-- modal content -->

						<div class="table-responsive">
							<table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0"
								data-page-size="7">
								<thead class="table-light">
									<tr>
										<th class="fs-6">NO</th>
										<th class="fs-6">NOMOR AGENDA</th>
										<th class="fs-6">TANGGAL PENERIMAAN</th>
										<th class="fs-6">DARI</th>
										<th class="fs-6">RINGKASAN SURAT</th>
										<th class="fs-6">LAMPIRAN</th>
										<th class="fs-6">TANGGAL PENYELESAIAN</th>
										<th class="fs-6">OPSI</th>
									</tr>
								</thead>
								<tbody>
								<tbody>
									<?php $i = 1?>
									<?php foreach ($surat as $srt) { ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $srt->nomor_agenda; ?></td>
                                            <td><?= $srt->tanggal_penerimaan; ?></td>
                                            <td><?= $srt->dari; ?></td>
                                            <td><?= $srt->ringkasan_surat; ?></td>
                                            <td><?= $srt->lampiran; ?></td>
                                            <td><?= $srt->tanggal_penyelesaian; ?></td>
                                            <td><a href="<?= base_url('cetak/'. $srt->id_disposisi) ?> " class="badge label-table bg-dark" target="_blank">Download</a></td>
                                        </tr>

									<?php } ?>
								</tbody>
								</tbody>

							</table>
						</div> <!-- end table-responsive-->
					</div>
				</div> <!-- end card -->
			</div>
		</div>


	</div> <!-- container -->

</div>