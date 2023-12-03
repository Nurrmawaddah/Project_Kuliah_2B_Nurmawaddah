<?php
session_start();
if (isset($_GET['x'])){
    include "main.php";
}elseif (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_kicikbook'] == 1 ) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'katpupuk') {
        if ($_SESSION['level_kicikbook'] == 1 || $_SESSION['level_kicikbook'] == 2  || $_SESSION['level_kicikbook'] == 3) {
            $page = "katpupuk.php";
            include "main.php";
        } else {
            $page = "home.php";
            include "main.php";
        }
} elseif (isset($_GET['x']) && $_GET['x'] == 'masuk') {
    if ($_SESSION['level_kicikbook'] == 1 || $_SESSION['level_kicikbook'] == 2  || $_SESSION['level_kicikbook'] == 3) {
        $page = "masuk.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'keluar') {
    if ($_SESSION['level_kicikbook'] == 1  || $_SESSION['level_kicikbook'] == 2  || $_SESSION['level_kicikbook'] == 3) {
        $page = "keluar.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    if ($_SESSION['level_kicikbook'] == 1  || $_SESSION['level_kicikbook'] == 2) {
        $page = "report.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
}  elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
}
