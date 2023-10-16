<?php
function selesaikanDeret($n) {
    $deret = array();
    $i = 2;
    while (count($deret) < $n) {
        $deret[] = $i;
        $deret[] = $i;
        $i++;
    }
    return $deret;
}

$n = 7; // Ganti dengan jumlah angka yang ingin Anda tampilkan
$deretHasil = selesaikanDeret($n);

foreach ($deretHasil as $angka) {
    echo $angka . " ";
}

?>


