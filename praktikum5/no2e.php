<HTML>
    <HEAD>
        <title>Koneksi Database MySQL</title>
</HEAD>
<BODY>
    <h1>Koneksi database dengan mysqli_fetch_assoc_row</h1>
    <?php
    $conn=mysqli_connect ("localhost","root","","db_saya") or die ("koneksi gagal");
    $hasil = mysqli_query($conn,"select * from liga");
    while ($row=mysqli_fetch_row($hasil)) {
        echo "Liga  " .$row[1];
        echo " mempunyai  " .$row[2];
        echo "  wakil di liga champion <br>";
    }
    ?>
    </BODY>
</HTML>