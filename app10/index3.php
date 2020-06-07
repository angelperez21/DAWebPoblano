<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/styles.css">
        <script>
            function color(dato){
                document.getElementById("id1").classList.remove("rojo");
                document.getElementById("id2").classList.remove("azul");
                document.getElementById("id3").classList.remove("verde");
                document.getElementById("id4").classList.remove("amarillo");
                
                if(dato > 10 && dato < 81){
                    document.getElementById("id1").classList.add("rojo");
                }
                if(dato < 41 || dato > 50){
                    document.getElementById("id2").classList.add("azul");
                }
                if((dato > 10 && dato < 21) || (dato > 30&& dato < 41) || (dato > 50 && dato < 61) || (dato > 70 && dato < 81)){
                    document.getElementById("id3").classList.add("verde");
                }
                if(dato < 20 || (dato > 40 && dato < 51) || dato > 70){
                    document.getElementById("id4").classList.add("amarillo");
                }
            }
        </script>
    </head>
    <body>
        <div style="text-aling: center;"> 
            <img src="images/logo.jpeg" />
        </div>
        <div style="text-aling: center;margin:0 auto;width:296px;background-color:blue;">
            <div id="id1" class="cuadro"></div>
            <div id="id2" class="cuadro"></div>
            <div id="id3" class="cuadro"></div>
            <div id="id4" class="cuadro"></div>
        </div>
    </body>
</html>