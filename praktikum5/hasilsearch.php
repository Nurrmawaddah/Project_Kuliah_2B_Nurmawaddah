<?php
    $kolom = $_POST['kolom'];
    $cari = $_POST['cari'];
    $conn = mysqli_connect("localhost","root","","db_saya");
    $hasil = mysqli_query($conn, "SELECT * FROM bukutamu WHERE $kolom LIKE '$cari'");
    $jumlah = mysqli_num_rows($hasil);
    echo "<br>";
    echo "Ditemukan: $jumlah";
    echo "<br>";
    while($baris = mysqli_fetch_array($hasil))
    {
        echo "Nama : ";
        echo $baris[0];
        echo "<br>";
        echo "Email : ";
        echo $baris[1];
        echo "<br>";
        echo "komentar :";
        echo $baris[2];
    }
?>
