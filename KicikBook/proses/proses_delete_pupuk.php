<?php 
include "connect.php";
$id = (isset($_POST['id_masuk'])) ? htmlentities($_POST['id_masuk']) : "";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_masuk WHERE id_masuk='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../masuk"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../masuk"</script>';
    }
}echo $message;
?>