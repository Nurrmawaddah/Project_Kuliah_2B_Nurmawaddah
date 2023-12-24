<?php 
include "connect.php";
$id = (isset($_POST['id_user'])) ? htmlentities($_POST['id_user']) : "";

if(!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../user"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../user"</script>';

    }
}echo $message;
?>