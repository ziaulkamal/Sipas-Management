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
									<?php if ($this->uri->segment(1) == 'persuratan') { ?>
									<tr>
										<th>No</th>
										<th>Nomor Surat</th>
										<th>Judul Surat</th>
										<th>Tanggal Surat Pengirim</th>
										<th>Dokumen Berkas</th>
										<th>Status Surat</th>
										<th>Tanggal Update</th>
									</tr>
									<?php }elseif($this->uri->segment(1) == 'piket') { ?>
									<tr>
										<th>No</th>
										<th>Nomor Surat</th>
										<th>Judul Surat</th>
										<th>Tanggal Surat Pengirim</th>
										<!-- <th>Tanggal Update System</th> -->
										<th>Status Surat</th>
									</tr>
									<?php }elseif($this->uri->segment(1) == 'pimpinan') { ?>
									<tr>
										<th>No</th>
										<th>Kode</th>
										<th>Asal Surat</th>
										<th>Tanggal Penyelesaian</th>
										<th>Dokumen Berkas </th>
										<!-- <th>Tanggal Update System</th> -->
										<th>Status Surat</th>
									</tr>
									<?php } ?>

								</thead>
								<tbody>

									<?php 
									$no = 1;
									foreach ($data as $res) { 
										if ($this->uri->segment(1) == 'persuratan') { ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $res->nomorDTrx; ?></td>
										<td><?= $res->judulSurat; ?></td>


										<td><?= $res->tglSuratMasuk; ?></td>
										<td><a href="<?= base_url('./public/lampiran/').$res->lampiranDTrx ?>"
												class="badge badge-outline-blue" target="_blank"><i class="fe-download"></i> Download Berkas</a>
												<?php if ($res->resPersuratan == 1 && $res->resPimpinan == 1) { ?>
													<a href="<?= base_url('./public/lampiran/').$res->lampiranDTrx ?>"
												class="badge badge-outline-blue"><i class="fe-download"></i> Download Lembar Disposisi</a>
												<?php } ?>
											</td>
										<td>

										<?php 
											if ($res->resPersuratan == 1 && $res->resPimpinan == 0) { ?>
												<a class="badge badge-outline-primary"><i class="fe-corner-right-up"></i> Menunggu Persetujuan</a>
												<a href="<?= base_url('persuratan/surat/update_document/').$res->idTrx ?>" class="badge badge-outline-warning"><i class="fe-edit"></i> Edit Lembaran Disposisi</a>
												<a class="badge badge-outline-pink"><i class="fe-search"></i> Lacak Progress</a>
											<?php }elseif ($res->resPersuratan == 0 && $res->resPimpinan == 1) { ?>
												<a type="button" id="<?= $res->idTrx ?>" class="badge badge-outline-secondary "><i class="fe-x"></i> Ditolak [Lihat ulasan]</a>
												<a href="<?= base_url('persuratan/surat/update_document/').$res->idTrx ?>" class="badge badge-outline-warning"><i class="fe-edit"></i> Edit Lembaran Disposisi</a>
												<a class="badge badge-outline-pink"><i class="fe-search"></i> Lacak Progress</a>
											<?php }elseif ($res->resPersuratan == 1 && $res->resPimpinan == 1) { ?>
												<a href="<?= base_url('persuratan/surat/update_document/').$res->idTrx ?>" class="badge badge-outline-success"><i class="fe-info"></i> Proses Tujuan Akhir</a>
												<a class="badge badge-outline-pink"><i class="fe-search"></i> Lacak Progress</a>
											<?php }else { ?>
												<a href="<?= base_url('persuratan/surat/add_document/').$res->idTrx ?>" class="badge badge-outline-success"><i class="fe-info"></i> Proses Lembaran Disposisi</a>
											<?php }
										
										
										
										
										?>
											


										</td>
										<td><?= $res->updateTrxDate; ?></td>
									</tr>
									<?php }elseif($this->uri->segment(1) == 'piket') { ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $res->nomorDTrx; ?></td>
										<td><?= $res->judulSurat; ?></td>


										<td><?= $res->tglSuratMasuk; ?></td>
										<!-- <td><?= $res->updateTrxDate; ?></td> -->
										<td>
											<?php switch ($res->resPersuratan) {
											case '1': ?>
											<a class="badge badge-outline-info"><i class="fe-info"></i> Dalam Proses</a>
											<a class="badge badge-outline-pink"><i class="fe-search"></i> Lacak Progress</a>
											<?php break;
												
												default: ?>
											<a class="badge badge-outline-primary"><i class="fe-corner-right-up"></i> Menunggu Persetujuan</a>
											<a href="<?= base_url('piket/surat/update/').$res->idTrx ?>"
												class="badge badge-outline-warning"><i class="fe-edit"></i> Edit</a>
											<a href="<?= base_url('piket/surat/delete/').$res->idTrx ?>"
												class="badge badge-outline-danger"><i class="fe-trash-2"></i> Hapus</a>
											<?php break;
											} ?>



										</td>
									</tr>
									<?php }elseif($this->uri->segment(1) == 'pimpinan') { 
										if ($res->resPersuratan == 1 && $res->resPimpinan == 1 || $res->resPersuratan == 1 && $res->resPimpinan == 0) { ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= strtoupper($res->tingkatKeamananD); ?></td>
										<td><?= strtoupper($res->asalSuratD); ?></td>
										<td><?= $res->tglPenerimaanD; ?></td>
										<td><a href="<?= base_url('./public/lampiran/').$res->lampiranDTrx ?>"
												class="badge badge-outline-blue" target="_blank"><i class="fe-download"></i> Download Berkas</a></td>
										<!-- <td><?= $res->updateTrxDate; ?></td> -->
										<td>
											<?php switch ($res->resPimpinan) {
											case '1': ?>
											<a class="badge badge-outline-info"><i class="fe-info"></i> Dalam Proses</a>
											<a class="badge badge-outline-pink"><i class="fe-search"></i> Lacak Progress</a>
											<?php break;
												
												default: ?>
											<a href="<?= base_url('pimpinan/surat/add_document/').$res->idTrx ?>" class="badge badge-outline-success"><i class="fe-corner-right-up"></i> Proses Disposisi</a>
											<a id="pimpinan-tolak-<?= $res->trxId ?>" type="button"
												class="badge badge-outline-warning"><i class="fe-edit"></i> Tolak</a>
											<?php break;
											} ?>



										</td>
									</tr>
									<?php }

									}

								 } ?>


							</table>
						</div>
					</div>
				</div> <!-- end card -->
			</div>
		</div>


	</div> <!-- container -->

</div>
