<?php if (isset($pimpinan)) { 
    foreach ($data as $res) { ?>
        <script>
            document.getElementById("pimpinan-tolak-<?= $res->trxId ?>").addEventListener("click", function () {
                Swal.fire({
                    title: "Alasan Penolakan Dokumen <br />[ <?= strtoupper($res->asalSuratD); ?> ]",
                    html: '<input type="text" id="review" name="pesanPenolakan" class="swal2-input" placeholder="Masukan Alasan Penolakan !"><input type="hidden" id="idTrx" name="idTrx" value="<?= $res->trxId ?>">',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28bb4b",
                    cancelButtonColor: "#f34e4e",
                    confirmButtonText: "Yes, submit!"
                }).then(function (result) {
                    if (result.isConfirmed) {
                        const review = document.getElementById('review').value;
                        const idTrx = document.getElementById('idTrx').value;
                        // Create a form element
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '<?= base_url("pimpinan/reject/surat/").$res->trxId ?>';
                        
                        // Add hidden fields to the form
                        const idTrxInput = document.createElement('input');
                        idTrxInput.type = 'hidden';
                        idTrxInput.name = 'idTrx';
                        idTrxInput.value = idTrx;
                        form.appendChild(idTrxInput);
                        
                        const reviewInput = document.createElement('input');
                        reviewInput.type = 'hidden';
                        reviewInput.name = 'pesanPenolakan';
                        reviewInput.value = review;
                        form.appendChild(reviewInput);
                        
                        // Append the form to the body and submit it
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        </script>
    <?php }
} ?>

<?php if ($this->uri->segment(1)== 'persuratan') { 
    foreach ($data as $res) { ?>
        <script>
            document.getElementById("final-<?= $res->trxId ?>").addEventListener("click", function () {
                Swal.fire({
                    title: "Tujuan Akhir <br />[ <?= ucwords($res->judulSurat) ?> ]",
                    html: `
                    <input type="hidden" id="idTrx" name="idTrx" value="<?= $res->trxId ?>">
                    <select class="form-control" data-toggle="select2" data-width="100%">
                        <option default selected>--Pilih--</option>
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
                    </select>`,
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#28bb4b",
                    cancelButtonColor: "#f34e4e",
                    confirmButtonText: "Ya Simpan"
                }).then(function (result) {
                    if (result.isConfirmed) {
                        const review = document.getElementById('review').value;
                        const idTrx = document.getElementById('idTrx').value;
                        // Create a form element
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '<?= base_url("pimpinan/reject/surat/").$res->trxId ?>';
                        
                        // Add hidden fields to the form
                        const idTrxInput = document.createElement('input');
                        idTrxInput.type = 'hidden';
                        idTrxInput.name = 'idTrx';
                        idTrxInput.value = idTrx;
                        form.appendChild(idTrxInput);
                        
                        const reviewInput = document.createElement('input');
                        reviewInput.type = 'hidden';
                        reviewInput.name = 'pesanPenolakan';
                        reviewInput.value = review;
                        form.appendChild(reviewInput);
                        
                        // Append the form to the body and submit it
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        </script>
    <?php }
} ?>


<?php if ($this->uri->segment(1) == 'persuratan') { 
  foreach ($data as $res) { ?>
   <script>
    document.getElementById("<?= $res->idTrx ?>").addEventListener("click", function () {
	Swal.fire({
		title: "Pemberitahuan Penolakan Dokumen Nomor Surat [ <?= $res->nomorDTrx ?> ]",
		html: "<b>Catatan Penolakan :</b> [<?= $res->ulasanDTrx ?>]",
		icon: "question"
	})
})
  </script>
  <?php }
} ?>




<!-- tambah data surat -->
<script>
      <?php if ($this->uri->segment(1) == 'add_surat' || $this->uri->segment(1) == 'pro_surat_add') { ?>
        $('form').submit(function (event) {
        event.preventDefault(); // Menghentikan aksi default submit form
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data akan disimpan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28bb4b",
            cancelButtonColor: "#f34e4e",
            confirmButtonText: "Iya, Simpan!",
            allowOutsideClick: true // Mencegah penutupan pesan secara otomatis
        }).then(function (result) {
            if (result.isConfirmed) {
            // Jika pengguna memilih "Iya, Simpan!"
            Swal.fire({
                title: 'Data Surat',
                text: 'Berhasil Ditambahkan!',
                icon: 'success',
                didClose: () => {
                $('form').unbind('submit').submit(); // Melanjutkan proses submit form setelah pesan ditutup
                }
            });
            }
        });
        });
    <?php } ?>
</script>


<!-- hapus data surat -->
<script>
   $('.hapus-berkas').on('click', function (event) {
  event.preventDefault();

  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data surat akan dihapus!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Hapus',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: 'Data Surat',
        text: 'Berhasil DiHapus!',
        icon: 'success',
        allowOutsideClick: false, // Mencegah penutupan pesan secara otomatis
        didClose: () => {
          document.location.href = href; // Mengarahkan ke halaman penghapusan setelah pesan ditutup
        }
      });
    }
  });
});
</script>

<!-- tambah data petugas -->
<script>
  <?php if ($this->uri->segment(1) == 'daftar_petugas' || $this->uri->segment(1) == 'pro_daftar') { ?>
          $('form').submit(function (event) {
            event.preventDefault(); // Menghentikan aksi default submit form
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data petugas akan disimpan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28bb4b",
                cancelButtonColor: "#f34e4e",
                confirmButtonText: "Iya, Simpan!",
                allowOutsideClick: false // Mencegah penutupan pesan secara otomatis
            }).then(function (result) {
                if (result.isConfirmed) {
                // Jika pengguna memilih "Iya, Simpan!"
                Swal.fire({
                    title: 'Data Petugas',
                    text: 'Berhasil Ditambahkan!',
                    icon: 'success',
                    didClose: () => {
                    $('form').unbind('submit').submit(); // Melanjutkan proses submit form setelah pesan ditutup
                    }
                });
                }
          });
        });
  <?php } ?>
</script>

<!-- hapus data petugas -->
<script>
 $('.tombol-hapus').on('click', function (event) {
  event.preventDefault();

  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data petugas akan dihapus!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Hapus',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: 'Data Petugas',
        text: 'Berhasil DiHapus!',
        icon: 'success',
        allowOutsideClick: false, // Mencegah penutupan pesan secara otomatis
        didClose: () => {
          document.location.href = href; // Mengarahkan ke halaman penghapusan setelah pesan ditutup
        }
      });
    }
  });
});
</script>

<!-- terima surat -->
<script>
   $('.tombol-terima').on('click', function (event) {
  event.preventDefault();

  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data surat akan diterima!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, terima',
    allowOutsideClick: false
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: 'Data Surat',
        text: 'Berhasil Diterima!',
        icon: 'success',
        allowOutsideClick: false, // Mencegah penutupan pesan secara otomatis
        didClose: () => {
          document.location.href = href;
       }
      });
    }
  });
});
</script>

<!-- tambah data disposisi -->
<script>
  <?php if ($this->uri->segment(1) == 'lembar_disposisi' || $this->uri->segment(1) == 'pro_disposisi') { ?>
          $('form').submit(function (event) {
            event.preventDefault(); // Menghentikan aksi default submit form
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Data disposisi akan disimpan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28bb4b",
                cancelButtonColor: "#f34e4e",
                confirmButtonText: "Iya, Simpan!",
                allowOutsideClick: false // Mencegah penutupan pesan secara otomatis
            }).then(function (result) {
                if (result.isConfirmed) {
                // Jika pengguna memilih "Iya, Simpan!"
                Swal.fire({
                    title: 'Data Disposisi',
                    text: 'Berhasil Ditambahkan!',
                    icon: 'success',
                    didClose: () => {
                    $('form').unbind('submit').submit(); // Melanjutkan proses submit form setelah pesan ditutup
                    }
                });
                }
          });
        });
  <?php } ?>
</script>