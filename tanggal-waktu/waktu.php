<?php
    function translateDayToIndonesian($day)
    {
        $days = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );

        if (array_key_exists($day, $days)) {
            return $days[$day];
        } else {
            return $day; // Jika tidak ada terjemahan, kembalikan apa adanya
        }
    }

    function translateMonthToIndonesian($month)
    {
        $months = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );

        if (array_key_exists($month, $months)) {
            return $months[$month];
        } else {
            return $month; // Jika tidak ada terjemahan, kembalikan apa adanya
        }
    }
    // Waktu Wilayah WIB
    date_default_timezone_set("Asia/Jakarta");
    
    // Mengonversi tanggal dan waktu
    $timestamp = time(); // Mengambil timestamp saat ini

    $englishDay = date('l', $timestamp);
    $tanggal = date(', d ', $timestamp);
    $englishMonth = date('F', $timestamp);
    $indonesianMonth = translateMonthToIndonesian($englishMonth);
    $indonesianDay = translateDayToIndonesian($englishDay);
    $tanggal_waktu = $indonesianDay . $tanggal . $indonesianMonth . date(' Y H:i:s', $timestamp); // Format tanggal dan waktu
    ?>