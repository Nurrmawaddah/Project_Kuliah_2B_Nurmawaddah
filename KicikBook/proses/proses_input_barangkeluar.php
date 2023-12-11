<?php
include "connect.php";
$nama_pupuk = (isset($_POST['nama_pupuk'])) ? htmlentities($_POST['nama_pupuk']) : "";
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$stok = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";


$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../assets/img/" . $kode_rand;
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_menu_validate'])) {
    //cek apakah gambar atau bukan?
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf File yang Dimasukkan Telah Ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb
                $message = 'File foto yang diupload terlalu besar';
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf, hanya diperbolehkan gambar dengan format JPG, JPEG, PNG dan GIF";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ',Gambar tidak dapat diupload")
    window.location="../keluar"</script>
    </script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_keluar WHERE nama_pupuk = '$nama_pupuk'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama pupuk yang dimasukan telah ada")
        window.location="../keluar"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_keluar (foto,nama_pupuk,keterangan,pelanggan,kategori,jumlah)values('" . $kode_rand . $_FILES['foto']['name'] . "','$nama_pupuk','$keterangan','$pelanggan','$kategori','$stok')");
                if ($query) {
                    $message = '<script>alert("Data berhasil dimasukkan")
            window.location="../keluar"</script>';
                } else {
                    $message = '<script>alert("Data gagal dimasukkan")
            window.location="../keluar"</script>';
                }
            } else {
                $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload")
        window.location="../keluar"</script>';
            }
        }
    }
}
echo $message;
