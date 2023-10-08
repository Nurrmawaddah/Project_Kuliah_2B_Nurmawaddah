<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get</title>
</head>
<body>
    <form methode="get" action = "proses.php">
        <label> Nama :</label>
        <input type=" text" name="nama">
        <br>
        <label> Alamat :</label>
        <input type=" text" name="Alamat">
        <br>

        <input type="submit" name="submit" value="KIRIM">
    </form>
</body>
</html>
<!-- proses -->
<?php 
    echo $_GET['nama'];
    echo "<br>";
    echo $_GET['Alamat'];
?>