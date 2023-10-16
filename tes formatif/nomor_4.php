<?php

function maxValue($a, $b, $c) {
  if ($a > $b && $a > $c) {
    return $a;
  } else if ($b > $a && $b > $c) {
    return $b; 
  } else {
    return $c;
  }
}

$val1 = 10;
$val2 = 30;
$val3 = 20;

$max = maxValue($val1, $val2, $val3);

echo "Nilai maksimum adalah $max";

?>