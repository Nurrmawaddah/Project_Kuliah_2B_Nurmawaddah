<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- header -->
    <?php  include "header.php";?>
    <!-- end header -->
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-3 ">
                <!-- sidebar -->
                <?php  include "sidebar.php";?>
            <!-- end sidebar -->

            <!-- content -->
            <?php 
            if(isset ($_GET['x']) && $_GET['x']== 'home') {
                include "home.php";
            }
            elseif(isset ($_GET['x']) && $_GET['x']== 'user') {
                include "user.php";
            }elseif(isset ($_GET['x']) && $_GET['x']== 'masuk') {
                include "masuk.php";
            }elseif(isset ($_GET['x']) && $_GET['x']== 'keluar') {
                include "keluar.php";
            }elseif(isset ($_GET['x']) && $_GET['x']== 'report') {
                include "report.php";
            }
            ?>
            <!-- end content -->
        </div>
        <div class="fixed-bottom text-center mb-2">
            Copyright 2023 Nurmawaddah
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>