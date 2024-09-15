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
                  <select class="form-control" data-toggle="select2" data-width="100%" name="respon" id="review">
                              <option default selected>--Pilih--</option>
                              <option value="5">Asisten Pembinaaan</option>
                              <option value="6">Asisten Intelijen</option>
                              <option value="7">Asisten Tindak Pidana Umum</option>
                              <option value="8">Asisten Tindak Pidana Khusus</option>
                              <option value="9">Asisten Perdata dan Tata Usaha</option>
                              <option value="10">Asisten Pidana Militer</option>
                              <option value="11">Asisten Pengawasan</option>
                              <option value="12">Koordinator</option>
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

                      // Membuat elemen form
                      const form = document.createElement('form');
                      form.method = 'POST';
                      form.action = '<?= base_url("persuratan/go/final/") ?>' + idTrx;

                      // Menambahkan input tersembunyi ke dalam form
                      const idTrxInput = document.createElement('input');
                      idTrxInput.type = 'hidden';
                      idTrxInput.name = 'idTrx';
                      idTrxInput.value = idTrx;
                      form.appendChild(idTrxInput);

                      const reviewInput = document.createElement('input');
                      reviewInput.type = 'hidden';
                      reviewInput.name = 'respon';
                      reviewInput.value = review;
                      form.appendChild(reviewInput);

                      // Meletakkan form ke dalam body dan mengirimkannya
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
      <?php if ($this->uri->segment(3) == 'add_document' || $this->uri->segment(3) == 'prog_save') { ?>
        $('form').submit(function (event) {
        event.preventDefault(); // Menghentikan aksi default submit form
        Swal.fire({
            title: "Apakah anda yakin ?",
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

<!-- tambah disposisi surat -->
<script>
      <?php if ($this->uri->segment(3) == 'add_document' || $this->uri->segment(3) == 'prog_add_document') { ?>
        $('form').submit(function (event) {
        event.preventDefault(); // Menghentikan aksi default submit form
        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Data disposisi akan dikirim",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28bb4b",
            cancelButtonColor: "#f34e4e",
            confirmButtonText: "Iya, Kirim!",
            allowOutsideClick: true // Mencegah penutupan pesan secara otomatis
        }).then(function (result) {
            if (result.isConfirmed) {
            // Jika pengguna memilih "Iya, Simpan!"
            Swal.fire({
                title: 'Data Disposisi',
                text: 'Berhasil Dikirimkan!',
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

<!-- ubah data surat -->
<script>
      <?php if ($this->uri->segment(3) == 'update' || $this->uri->segment(3) == 'prog_update_surat') { ?>
        $('form').submit(function (event) {
        event.preventDefault(); // Menghentikan aksi default submit form
        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Data surat akan di ubah",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28bb4b",
            cancelButtonColor: "#f34e4e",
            confirmButtonText: "Iya, Ubah!",
            allowOutsideClick: true // Mencegah penutupan pesan secara otomatis
        }).then(function (result) {
            if (result.isConfirmed) {
            // Jika pengguna memilih "Iya, Simpan!"
            Swal.fire({
                title: 'Data Surat',
                text: 'Berhasil Diubah!',
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
  <?php if ($this->uri->segment(2) == 'create_user' || $this->uri->segment(3) == 'process') { ?>
          $('form').submit(function (event) {
            event.preventDefault(); // Menghentikan aksi default submit form
            Swal.fire({
                title: "Apakah anda yakin ?",
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
        text: 'Berhasil Dihapus!',
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
    title: 'Apakah anda yakin ?',
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
