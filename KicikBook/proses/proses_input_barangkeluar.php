<?php
session_start();

include "connect.php";

$id_pupuk = (isset($_POST['id_pupuk'])) ? htmlentities($_POST['id_pupuk']) : "";
$stok = (isset($_POST['jumlah_keluar'])) ? intval($_POST['jumlah_keluar']) : 0;
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['input_order_validate'])) {
    // Mulai transaksi
    mysqli_begin_transaction($conn);

    // Ambil id_user dari sesi (Anda perlu menyimpan id_user saat login ke dalam session)
    $id_user_sesi = $_SESSION['id_user_kicikbook'];

    // Insert data ke tb_keluar
    $query_insert_keluar = mysqli_query($conn, "INSERT INTO tb_keluar (id_pupuk, id_user, tanggal_keluar, jumlah_keluar, pelanggan) VALUES ('$id_pupuk','$id_user_sesi', NOW(), '$stok','$pelanggan')");

    // Update stok di tb_barang
    $query_update_stok = mysqli_query($conn, "UPDATE tb_barang SET stock = stock - '$stok' WHERE id_pupuk = '$id_pupuk'");

    // Commit transaksi jika semua query berhasil
    if ($query_insert_keluar && $query_update_stok) {
        mysqli_commit($conn);
        $message = '<script>alert("Data berhasil dimasukkan")
            window.location="../keluar"</script>';
    } else {
        // Rollback transaksi jika ada yang gagal
        mysqli_rollback($conn);
        $message = '<script>alert("Data gagal dimasukkan")
            window.location="../keluar"</script>';
    }
}

echo $message;
