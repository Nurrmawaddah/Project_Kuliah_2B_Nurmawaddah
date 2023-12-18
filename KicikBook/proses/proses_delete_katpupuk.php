<?php 
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";


if(!empty($_POST['hapus_kategori_validate'])){
    $select = mysqli_query($conn, "SELECT id_kategori FROM tb_barang WHERE id_kategori    = '$id'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("kategori telah digunakan pada daftar kategori . kategori tidak dapat di hapus")
        window.location="../katpupuk"</script>';
    }else{
    $query = mysqli_query($conn, "DELETE FROM `tb_kat_pupuk` WHERE  `id_kategori`='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../katpupuk"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../katpupuk"</script>';

    }
}
}echo $message;
?>