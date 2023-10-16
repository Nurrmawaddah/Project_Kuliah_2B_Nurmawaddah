<?php
    $deret = [];
    $angka = 4; // Angka awal
    $selisih = 2; // Selisih awal

    for ($i = 0; $i < 10; $i++) { // Menghasilkan 5 angka dalam deret
        $deret[] = $angka;
        $angka += $selisih; // Menambahkan selisih ke angka sebelumnya
        $selisih++; // Menambahkan selisih dengan 1
    }

    echo implode(' ', $deret); // Menampilkan deret angka sebagai string
?>