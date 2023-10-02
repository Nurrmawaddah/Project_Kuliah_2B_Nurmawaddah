<?php
    echo"Menampilkan Array dengan foreach";
    echo"<br>";
    echo"<br>";

    $anak[0] = "Faruq";
    $anak[1] = "Alya";
    $anak[2] = "Zahro";
    foreach ($anak as $value) {
        echo "Nama anak : $value";
        echo "<br>";
    }
?>