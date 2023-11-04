<html>

<head>
    <title>Koneksi Database MySQL</title>
</head>

<body>
    <h1>Simpan Buku Tamu di Database MYSQL</h1>
        <?php
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $komentar = $_POST["komentar"];
        $conn = mysqli_connect ("localhost","root","","db_saya")
        or die ("koneksi gagal");
        echo "Nama : $nama <br>";
        echo "Email : $email <br>";
        echo "Komentar : $komentar <br>";
        
        $hasil =mysqli_query($conn, "insert into bukutamu (nama, email, komentar) values ('$nama', '$email', '$komentar') ");
        echo "Simpan bukutamu berhasil dilakukan";
        ?>
</body>
</html>
