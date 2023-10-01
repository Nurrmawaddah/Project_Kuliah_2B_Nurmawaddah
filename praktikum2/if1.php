<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $d = date("D");
    $date = date("d-m-Y H:i:s");
    if ($d == "Mon") {
        $d = "Senin";
        echo "Selamat belajar <br>";
    }else
        echo "Ini hari $d <br>";
    echo $d. " ". $date;
    ?>
    
</body>
</html>