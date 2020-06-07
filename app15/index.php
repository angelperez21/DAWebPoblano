<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
    <?php
    $var = isset($_POST["id"])?$_POST["id"]:"0";
    echo "La variable es: ".$var."<br>";

    for ($i=0; $i < $var; $i++){
        $r=rand(0,255);
        $g=rand(0,255);
        $b=rand(0,255);
        $r1=rand($r,255);
        $g1=rand($g,255);
        $b1=rand($b,255);
        $a=rand(3,7);
        echo "<div style= \"background-color: rgba(".$r1.",".$g1.",".$b1.",".$a.");\">(".$r1.",".$g1.",".$b1.",".$a.")</div>";
    }

    ?>
</body>
</html>