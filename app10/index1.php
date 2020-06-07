<!DOCTYPE html>
<html lang="en">
<head>
    <title>Metodo</title>
    <script>
        function color(dato){
            if(dato > 10 && dato < 81){
                console.log("Rojo");
            }
            if(dato < 41 || dato > 50){
                console.log("Azul");
            }
            if((dato > 10 && dato < 21) || (dato > 30 && dato < 41) || (dato > 50 && dato < 61) || (dato > 70 && dato < 81)){
                console.log("Verde");
            }
            if(dato < 20 || (dato > 40 && dato < 51) || dato > 70){
                console.log("Amarillo");
            }
        }
    </script>
</head>
<body>
    <div>
        <center>
        <img src="images/logo.jpeg">
        </center>
    </div>
</body>
</html>