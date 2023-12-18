<?php 
include "connect.php";
$id = (isset($_POST['id_pupuk'])) ? htmlentities($_POST['id_pupuk']) : "";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_barang WHERE id_pupuk='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../stokbarang"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../stokbarang"</script>';
    }
}echo $message;
?>