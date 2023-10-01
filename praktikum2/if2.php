<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    $d=date("D");
    if ($d=="Sat")
        echo "Selamat berakhir pekan!";
    elseif ($d=="Fri")
        echo "Selamat Menunaikan Sholat Jum'at bagi yang muslim!"; 
    else
        echo "Selamat belajar!";
    ?>
</body>
</html>