<script>
  const btnTolaks = document.querySelectorAll('.buttonTolak');
  btnTolaks.forEach((btnTolak) => {
    btnTolak.addEventListener('click', function() {
      Swal.fire({
        input: 'textarea',
        inputLabel: 'Alasan Penolakan',
        inputPlaceholder: 'Masukkan alasan penolakan...',
        inputAttributes: {
          'aria-label': 'Masukkan alasan penolakan'
        },
        showCancelButton: true,
        preConfirm: (text) => {
          if (!text) {
            Swal.showValidationMessage('Alasan penolakan harus diisi')
          }
          return text
        }
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            title: 'Surat Ditolak',
            text: 'Alasan penolakan: ' + result.value,
          });
        }
      });
    });
  });
</script>
