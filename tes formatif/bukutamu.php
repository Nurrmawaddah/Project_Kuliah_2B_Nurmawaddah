<!DOCTYPE html>
<html>

<head>
    <title>Koneksi Database MySQL</title>
</head>

<body>
    <h1>Buku Tamu untuk Database MYSQL</h1>
    <form action="bukutamuadd.php" method="post">
        Nama anda : <input type="text" name="nama" size="25">
        Email address : <input type="text" name="email" maxlength="25">
        Komentar : <input type="text" name="komentar" cols="40">
        <input type="submit" value="Kirim">
        <input type="reset" value="ulangi">
    </form>

    <h1>Cari Buku Tamu</h1>
    <form action="carihasil.php" method="post">
        <select name="kolom">
            <option value="nama">nama</option>
            <option value="email">email</option>
        </select>

        Masukkan kata yang anda Cari
        <input type="text" name="cari">
        <input type="submit" name="submit"> <!-- Change the name attribute of the submit button -->
    </form>

    <h1>Lihat Buku Tamu</h1>
    <?php
$conn = mysqli_connect("localhost", "root", "", "db_saya") or die("koneksi gagal");
    $hasil = mysqli_query($conn, "select * from bukutamu");

    $jumlah = mysqli_num_rows($hasil);

    echo "<p>Jumlah pengunjung = $jumlah</p>";

    echo "<table border='1'>";
    echo "<tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Komentar</th>
        </tr>";

    $a = 1;

    while ($baris = mysqli_fetch_array($hasil)) {
        echo "<tr>";
        echo "<td>$a</td>";
        echo "<td>" . $baris[0] . "</td>";
        echo "<td>" . $baris[1] . "</td>";
        echo "<td>" . $baris[2] . "</td>";
        echo "</tr>";
        $a++;
    }
    ?>
</body>
</html>