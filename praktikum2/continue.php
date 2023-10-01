<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    for($a=0; $a < 100; $a++){
        if($a %2 == 0) 
        continue;
        else 
        echo "$, ";
    }
    ?>
</body>
</html>