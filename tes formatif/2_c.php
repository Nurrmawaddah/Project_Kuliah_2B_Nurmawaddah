<?php
function selesaikanDeret($n) {
    $deret = array();
    $i = 1;
    $j = 9;
    
    while (count($deret) < $n) {
        $deret[] = $i;
        $deret[] = $j;
        $i++;
        $j++;
    }
    
    return $deret;
}

$n = 7; // Ganti dengan jumlah angka yang ingin Anda tampilkan
$deretHasil = selesaikanDeret($n);

foreach ($deretHasil as $angka) {
    echo $angka . " ";
}
?>