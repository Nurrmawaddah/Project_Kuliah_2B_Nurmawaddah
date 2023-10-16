<!DOCTYPE html>
<html>
<head>
    <title>Hasil Kalkulasi</title>
</head>
<body>
    <h1>Hasil Kalkulasi</h1>
    <?php
    if(isset($_GET['angka1']) && isset($_GET['angka2']) && isset($_GET['operasi'])) {
        $angka1 = $_GET['angka1'];
        $angka2 = $_GET['angka2'];
        $operasi = $_GET['operasi'];

        switch ($operasi) {
            case 'penjumlahan':
                $hasil = $angka1 + $angka2;
                echo "Hasil penjumlahan: $hasil";
                break;
            case 'pengurangan':
                $hasil = $angka1 - $angka2;
                echo "Hasil pengurangan: $hasil";
                break;
            case 'pembagian':
                if($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                    echo "Hasil pembagian: $hasil";
                } else {
                    echo "Pembagian oleh nol tidak valid.";
                }
                break;
            case 'perkalian':
                $hasil = $angka1 * $angka2;
                echo "Hasil perkalian: $hasil";
                break;
            default:
                echo "Operasi tidak valid.";
        }
    } else {
        echo "Masukkan kedua angka dan pilih operasi terlebih dahulu.";
    }
    ?>
</body>
</html>
