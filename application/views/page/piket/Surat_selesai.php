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
						<div class="table-responsive">
							<table id="basic-datatable" class="table dt-responsive nowrap w-100">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th>Nomor Surat</th>
										<th>Judul Surat</th>
										<th>Tanggal Surat Pengirim</th>
										<th>Tanggal Surat Proses</th>
										<th>Dokumen Berkas</th>
										<th>Keterangan Surat</th>
										<th>Tujuan Akhir</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php $no = 1; foreach ($data as $v) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $v->nomorDTrx ?></td>
                                            <td><span class="" title="<?= ucfirst($v->judulSurat); ?>" tabindex="0" data-plugin="tippy" data-tippy-interactive="true"><?= substr(ucfirst($v->judulSurat),0 ,40).'.......'; ?></span></td>
                                            <td><?= $v->tglSuratMasuk ?></td>
                                            <td><?= $v->tglSuratProses ?></td>
                                            <td><a href="<?= base_url('./public/lampiran/').$v->lampiranDTrx ?>"
												class="badge badge-outline-blue" target="_blank"><i class="fe-download"></i> Download Berkas</a>
													<a href="<?= base_url('disposisi/excel/download/').$v->idTrx ?>"
												class="badge badge-outline-blue"><i class="fe-download"></i> Download Lembar Disposisi</a>
											</td>
                                            <td><?= $v->keteranganDTrx ?></td>
                                            <td><?= $v->ulasanDTrx ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>


							</table>
						</div>
					</div>
				</div> <!-- end card -->
			</div>
		</div>


	</div> <!-- container -->

</div>
