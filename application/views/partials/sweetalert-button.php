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