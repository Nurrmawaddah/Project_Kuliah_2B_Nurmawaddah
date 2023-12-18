<?php
session_start();
include "connect.php";

$nama_pupuk = (isset($_POST['nama_pupuk'])) ? htmlentities($_POST['nama_pupuk']) : "";
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$stock = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
$id_user_sesi = $_SESSION['id_user_kicikbook'];

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_menu_validate'])) {
    // Cek apakah gambar atau bukan?
    $cek = getimagesize($_FILES['foto']['tmp_name']);

    if ($cek === false) {
        $message = "Ini bukan file gambar";
    } else {
        // Create the target directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $statusUpload = 1;

            $select = mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama_pupuk = '$nama_pupuk'");

            if (mysqli_num_rows($select) > 0) {
                $message = '<script>alert("Nama pupuk yang dimasukkan telah ada")
                    window.location="../masuk"</script>';
            } else {
                // Mulai transaksi
                mysqli_begin_transaction($conn);

                // Extract only the filename
                $uploaded_filename = basename($_FILES["foto"]["name"]);

                // Insert data ke tb_barang
                $query_tb_barang = mysqli_query($conn, "UPDATE tb_barang (foto, nama_pupuk, keterangan, id_kategori, stock) VALUES ('$uploaded_filename','$nama_pupuk','$keterangan','$kategori','$stock')");

                // Ambil id_pupuk yang baru saja dimasukkan
                $id_pupuk = mysqli_insert_id($conn);

                // Insert data ke tb_masuk
                $query_tb_masuk = mysqli_query($conn, "UPDATE tb_masuk (id_pupuk, id_user, jumlah_masuk) VALUES ('$id_pupuk', '$id_user_sesi', '$stock')");

                // Commit transaksi jika semua query berhasil
                if ($query_tb_barang && $query_tb_masuk) {
                    mysqli_commit($conn);
                    $message = '<script>alert("Data berhasil dimasukkan")
                        window.location="../masuk"</script>';
                } else {
                    // Rollback transaksi jika ada yang gagal
                    mysqli_rollback($conn);
                    $message = '<script>alert("Data gagal dimasukkan")
                        window.location="../masuk"</script>';
                }
            }
        } else {
            $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload")
                window.location="../masuk"</script>';
        }
    }
}

echo $message;
