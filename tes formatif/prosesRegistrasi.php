<?php
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jurusan = $_POST["jurusan"];
    $alamat = $_POST["alamat"];
    $agama = $_POST["agama"];
    
    $conn = mysqli_connect("localhost", "root", "", "db_saya") or die("Koneksi gagal: " . mysqli_connect_error());
    echo "NIM : $nim <br>";
    echo "Nama : $nama <br>";
    echo "jenis kelamin : $jenis_kelamin <br>";
    echo "jurusan : $jurusan <br>";
    echo "alamat: $alamat <br>";
    echo "agama : $agama <br>";
    $hasil = mysqli_query($conn, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, jurusan, alamat, agama) VALUES ('$nim', '$nama', '$jenis_kelamin', '$jurusan', '$alamat', '$agama')");
    echo "Simpan bukutamu berhasil dilakukan";
?>