<?php 
include "connect.php";
$jenispupuk = (isset($_POST['jenispupuk'])) ? htmlentities($_POST['jenispupuk']) : "";
$katpupuk= (isset($_POST['katpupuk'])) ? htmlentities($_POST['katpupuk']) : "";


if(!empty($_POST['input_katmenu_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_pupuk FROM tb_kat_pupuk WHERE kategori_pupuk= '$katpupuk'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("kategori yang dimasukan telah ada")
        window.location="../katpupuk"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_kat_pupuk(jenis_pupuk,kategori_pupuk)values('$jenismenu','$katmenu')");
        if($query){
            $message = '<script>alert("Data berhasil dimasukkan")
            window.location="../katpupuk"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../katpupuk"</script>';
        }
    }

}echo $message;
