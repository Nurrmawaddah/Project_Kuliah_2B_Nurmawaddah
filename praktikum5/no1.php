<html>
    <title>Koneksi Database MySQL</title>
<body>
    <h1>Demo Koneksi Database MySQL</h1>
    <?php
    $conn=mysqli_connect ("localhost", "root");
    if ($conn){
        echo "Server terkoneksi";
    }else{
        echo "Server tidak terkoneksi";
    }
    ?>
</body>
</html>