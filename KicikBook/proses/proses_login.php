<?php
session_start();
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['username_decafe'] = $username;
        $_SESSION['level_decafe'] = $hasil['level'];
        $_SESSION['id_decafe'] = $hasil['id'];

        header('location:../home');
    } else { ?>
        <script>
alert('username atau password anda salah');
window.location='../login'
        </script>
<?php
    }
}
?>