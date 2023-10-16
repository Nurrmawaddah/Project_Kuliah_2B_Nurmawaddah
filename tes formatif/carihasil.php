<!DOCTYPE html>
<html>

<head>
    <title>Koneksi Database MySQL</title>
</head>

<body>
    <h1>Hasil Cari Buku Tamu</h1>
    <?php
        $kolom = $_POST['kolom']; // Remove the $ sign here
        $cari = $_POST['cari']; // Remove the $ sign here
        $conn = mysqli_connect("localhost", "root", "", "db_saya");
        $hasil = mysqli_query($conn, "SELECT * FROM bukutamu WHERE $kolom LIKE '$cari'");

        $jumlah = mysqli_num_rows($hasil);

        echo "<br>";
        echo "Ditemukan: $jumlah";
        echo "<br>";

        while ($baris = mysqli_fetch_array($hasil)) {
            echo "Nama : " . $baris[0];
            echo "<br>";
            echo "Email : " . $baris[1];
            echo "<br>";
            echo "Komentar : " . $baris[2];
        }
    ?>
</body>

</html>
