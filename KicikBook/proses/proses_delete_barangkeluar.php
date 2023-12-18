<?php 
include "connect.php";
$id = (isset($_POST['id_keluar'])) ? htmlentities($_POST['id_keluar']) : "";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";

if(!empty($_POST['delete_order_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_keluar WHERE id_keluar='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../keluar"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../keluar"</script>';
    }
}echo $message;
?>