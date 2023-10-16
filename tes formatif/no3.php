<?php
// Matriks pertama
    $matrix1 = array(
        array(1, 2),
        array(3, 4)
    );

// Matriks kedua
    $matrix2 = array(
        array(5, 6),
        array(7, 8)
    );

// Inisialisasi matriks hasil
    $result = array(
        array(0, 0),
        array(0, 0)
    );

// Menghitung penjumlahan matriks
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
            $result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
        }
    }

// Menampilkan hasil penjumlahan matriks
    echo "Hasil Penjumlahan Matriks:<br>";
        for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
            echo $result[$i][$j] . " ";
        }
        echo "<br>";
    }
?>