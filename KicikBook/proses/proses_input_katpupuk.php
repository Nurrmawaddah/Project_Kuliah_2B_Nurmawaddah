<?php 
include "connect.php";
$namakategori = (isset($_POST['nama_kategori'])) ? htmlentities($_POST['nama_kategori']) : "";
$keterangan= (isset($_POST['deskripsi'])) ? htmlentities($_POST['deskripsi']) : "";


if(!empty($_POST['input_katmenu_validate'])){
    $select = mysqli_query($conn, "SELECT nama_kategori FROM tb_kat_pupuk WHERE nama_kategori= '$namakategori'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("kategori yang dimasukan telah ada")
        window.location="../katpupuk"</script>';
    }else{
        $query = mysqli_query($conn, "INSERT INTO tb_kat_pupuk(nama_kategori,deskripsi)values('$namakategori','$keterangan')");
        if($query){
            $message = '<script>alert("Data berhasil dimasukkan")
            window.location="../katpupuk"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../katpupuk"</script>';
        }
    }

}echo $message;
