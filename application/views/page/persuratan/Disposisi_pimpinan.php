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
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url($action); ?>" method="POST"
								enctype="multipart/form-data">
								<input type="hidden" name="idTrx" value="<?= $data['idTrx'] ?>">
								<input type="hidden" name="idDisposisi" value="<?= $data['idDisposisi'] ?>">
							<div class="row mb-3">
								<div class="col-md-4">
									<label for="nomor_agenda" class="form-label">Nomor Agenda / Registrasi</label>
									<input type="text" class="form-control" id="nomor_agenda" value="<?= $data['nomorAgendaD']; ?>" readonly>
								</div>
								<div class="col-md-4">
									<label for="tanggal_penerimaan" class="form-label">Tanggal Penerimaan</label>
									<input type="date" class="form-control" id="tanggal_penerimaan" value="<?= $data['tglPenerimaanD']; ?>" readonly>
								</div>
								<div class="col-md-4">
									<label for="tanggal_surat" class="form-label">Tanggal dan Nomor Surat </label>
									<input type="date" class="form-control" id="tanggal_surat" value="<?= $data['tglSuratMasuk']; ?>" readonly>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4">
									<label for="dari" class="form-label">Dari</label>
									<input type="text" class="form-control" id="dari" value="<?= $data['asalSuratD']; ?>" readonly>
								</div>
								<div class="col-md-4">
									<label for="tanggal_penyelesaian" class="form-label">Tanggal Penyelesaian</label>
									<input type="date" class="form-control" id="tanggal_penyelesaian" value="<?= $data['tglPenyelesaianD']; ?>" readonly>
								</div>
									<div class="col-md-4">
                                    <label class="form-label">Tingkat Keamanan</label>
                                    <br>
									<div class="form-check-inline">
										<input class="form-check-input" type="radio" id="sr" name="radioKeamanan"
											checked value="<?= $data['tingkatKeamananD'] ?>" readonly>
										<label class="form-check-label" for="<?= $data['tingkatKeamananD'] ?>">
											<?= strtoupper($data['tingkatKeamananD']); ?>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="ringkasan_surat" class="form-label">Hal / Ringkasan Isi Surat</label>
									 <textarea class="form-control" id="ringkasan_surat" rows="3" readonly><?= $data['ringkasanKet']; ?></textarea>
								</div>
								<div class="col-md-6">
									<label for="lampiran" class="form-label">Lampiran</label>
									<textarea class="form-control" id="lampiran" rows="3" readonly><?= $data['lampiranD']; ?></textarea>
								</div>

							</div>
                            <hr>
                            <div class="row mt-3">
                                <h5>Disposisi Petunjuk</h5>
                                <div class="col-md-4 mt-1">
									<div class="form-check mb-2">
									<input class="form-check-input" type="checkbox" id="tindak_lanjuti" name="A17">
										<label class="form-check-label" for="tindak_lanjuti">Tindak Lanjuti / Laksanakan / Selesaikan</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="untuk_perhatian" name="A18">
										<label class="form-check-label" for="untuk_perhatian">Untuk Perhatian / Teruskan / Diketahui</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="laporkanKepadaSayaMonitor" name="A19">
										<label class="form-check-label" for="laporkanKepadaSayaMonitor">Laporkan Kepada Saya / Monitor</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="pendapatSaranTeguran" name="A20">
										<label class="form-check-label" for="pendapatSaranTeguran">Pendapat / Saran / Teguran</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="ingatkan_jaksanya" name="A21">
										<label class="form-check-label" for="ingatkan_jaksanya">Ingatkan Jaksanya</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="ingatkan_jaksanya" name="A22">
										<label class="form-check-label" for="ingatkan_jaksanya">Cek & ReCek Apakah Sudah Sesuai</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="untuk_dipedomani" name="A23">
										<label class="form-check-label" for="untuk_dipedomani">Untuk Dipedomani</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="datakan_rekap" name="A24">
										<label class="form-check-label" for="datakan_rekap">Datakan & Rekap utk BALAP Kejagung</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A25">
										<label class="form-check-label" for="">Terbitkan P.16 & Lengkapi ADM-Nya</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A26">
										<label class="form-check-label" for="">Serahkan / Beritahukan Jaksanya</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A27">
										<label class="form-check-label" for="">Pelajari Dengan Teliti dan Cermat</label>
									</div>
                                    <div class="form-check">
										<input class="form-check-input" type="checkbox" id="" name="A28">
										<label class="form-check-label" for="">JPU Tentukan Sikap Selama 5 Hari</label>
									</div>
								</div>
                                <div class="col-md-4 mt-1">
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A29">
										<label class="form-check-label" for="">Jaksa Buat BA Pendapat</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A30">
										<label class="form-check-label" for="">Pantau & Ikuti Perkembangannya</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A31">
										<label class="form-check-label" for="">Segera Jadwalkan Ekspose / Audiensi</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A32">
										<label class="form-check-label" for="">Telaah dan Pendapat</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A33">
										<label class="form-check-label" for="">Buat Renlid / Rendik</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A34">
										<label class="form-check-label" for="">Perihal Perkara Apa / Siapa</label>
									</div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F17">
                                            <label class="form-check-label" for="">Dampingi / Wakili Saya  (Tidak Diwakilkan)</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F19">
                                            <label class="form-check-label" for="">Siapkan Konsep Laporannya</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F20">
                                            <label class="form-check-label" for="">Ketik / Gandakan / Simpan / Arsip</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F21">
                                            <label class="form-check-label" for="">Terbitkan SKPP berdasarkan RJ</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F22">
										<label class="form-check-label" for="">Segera Eksekusi & Lengkap ADM-Nya</label>
                                    </div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="" name="F23">
										<label class="form-check-label" for="">Periksa Catatan Administrasinya</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F24">
										<label class="form-check-label" for="">Untuk Data & Informasi</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="extends_F25" name="F25">
										<label class="form-check-label" for="">Terbitkan Surat Perintah........</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="extends_F26" name="F26">
										<label class="form-check-label" for="">Koordinasikan dengan........</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F27">
										<label class="form-check-label" for="">Untuk Seperlunya</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="extends_F28" name="F28">
										<label class="form-check-label" for="">Ingat Batas Waktu........</label>
                                    </div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="extends_F29" name="F29">
										<label class="form-check-label" for="">Serahkan Kepada Ybs........</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F30">
										<label class="form-check-label" for="">Umumkan Dipapan Pengumuman</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F31">
										<label class="form-check-label" for="">Edarkan Kepada Pegawai, Kajari & Kacabjari</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="extends_F32" name="F32">
										<label class="form-check-label" for="">Wakili Kajari........</label>
                                    </div>
                                    <div class="form-check">
										<input class="form-check-input" type="checkbox" id="extends_F34" name="F34">
										<label class="form-check-label" for="">Lainya........</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <h5>Diteruskan Kepada</h5>
                                <div class="col-md-6 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L17">
										<label class="form-check-label" for="">Wakil Kepala Kejaksaan Tinggi</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L19">
										<label class="form-check-label" for="asisten_pembinaan">Asisten Pembinaan</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L21">
										<label class="form-check-label" for="asisten_intelijen">Asisten Intelijen</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L23">
										<label class="form-check-label" for="">Asisten Tindak Pidana Umum</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L25">
										<label class="form-check-label" for="">Asisten Tindak Pidana Khusus</label>
									</div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L27">
										<label class="form-check-label" for="">Asisten Perdata dan Tata Usaha</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L30">
										<label class="form-check-label" for="">Asisten Pidana Militer</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L32">
										<label class="form-check-label" for="">Asisten Pengawasan</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L34">
										<label class="form-check-label" for="">Kepala Bagian Tata Usaha</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L36">
										<label class="form-check-label" for="">Koordinator</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="extends_L38" name="L38">
										<label class="form-check-label" for="">Lainya........</label>
                                    </div>
                                </div>
                            </div>
							<button type="submit" class="btn btn-success waves-effect waves-light mt-3">Kirim</button>
						</form>

					</div> <!-- end card-body-->
				</div> <!-- end card-->
			</div>
		</div>


	</div> <!-- container -->

</div>

<script>
function toggleInput(checkbox) {
    var checkboxId = checkbox.id;
    var inputId = checkboxId.replace('extends_', ''); // Menghapus 'extends_' dari ID checkbox

    var inputElement = document.getElementById('input_' + inputId); // Mencari input berdasarkan ID yang telah diubah

    if (checkbox.checked) {
        if (!inputElement) {
            // Jika input belum ada, tambahkan input teks di bawah checkbox
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.id = 'input_' + inputId;
            newInput.name = 'extends_' + inputId; // Mengaitkan name dengan ID yang dimulai dengan "extends_"
            newInput.className = 'form-control mt-2';
            newInput.placeholder = 'Isikan string disini...';

            checkbox.parentNode.appendChild(newInput);
        }
    } else {
        // Jika checkbox dicentang kembali, hapus input teks jika ada
        if (inputElement) {
            inputElement.remove();
        }
    }
}

// Mencari semua elemen checkbox dengan ID yang dimulai dengan "extends_"
var checkboxes = document.querySelectorAll('input[type="checkbox"][id^="extends_"]');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        toggleInput(checkbox);
    });
});
</script>
