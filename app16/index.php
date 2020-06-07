<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <?php

        function mifuncion($num1, $num2){
            $obj = new stdClass();
            $obj->suma = $num1+$num2;
            $obj->resta = $num1-$num2;
            $obj->mul = $num1*$num2;
            $obj->div = $num1/$num2;
            $obj->num[0]= 00;
            $obj->num[1]= new stdClass();
            $obj->num[2]= 20;

            $obj->num[1]->alma = "hola mundo";
            $obj->num[1]->yaz[0] = "numero";
            $obj->num[1]->elena ="hola elena";
            return $obj;
        }

        $array = [];
        $array["elena"]="Hola";
        $array["alma"]="Mundo";

        echo $array["elena"]."<br>";
        echo $array["alma"]."<br>";

        echo "<pre>";
        print_r($array);
        echo "</pre>";

        $o=mifuncion(6,4);

        echo "<br>suma: ".$o->suma;
        echo "<br>resta: ".$o->resta;
        echo "<br>Multiplicación: ".$o->mul;
        echo "<br>División: ".$o->div;

        echo "<pre>";
        print_r($o);
        echo "</pre>";
    ?>
</body>
</html>