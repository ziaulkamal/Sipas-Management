<?php

if (!function_exists('countdown')) {
    function countdown($tglSelesai)
    {
        // Format tanggal akhir harus Y-m-d
        $tanggalHariIni = date('Y-m-d');
        // $tanggalHariIni = '2023-09-30';

        // Menghitung selisih dalam hari antara tanggal akhir dan tanggal hari ini
        $selisihHari = strtotime($tglSelesai) - strtotime($tanggalHariIni);
        $selisihHari = max(0, $selisihHari); // Pastikan selisih tidak negatif

        // Menghitung jumlah hari, jam, menit, dan detik
        $hari = floor($selisihHari / (60 * 60 * 24));

        if ($hari == 0) {
            $pesanCountdown = ' Waktu Habis (batas penyelesain tanggal '.shortdate_indo($tglSelesai).')';
        }else {
            $pesanCountdown = " Batas waktu tinggal $hari hari ";
        }
        

        return $pesanCountdown;
    }
}
