<!DOCTYPE html>
<html>
<head>
    <title>Tick Tack Toe</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="plantilla">
        <div class="linea">
            <div id="p00" class="cuadro" onclick="position(0,0)"></div>
            <div id="p01" class="cuadro" onclick="position(0,1)"></div>
            <div id="p02" class="cuadro" onclick="position(0,2)"></div>
        </div>
        <div class="linea">
            <div id="p10" class="cuadro" onclick="position(1,0)"></div>
            <div id="p11" class="cuadro" onclick="position(1,1)"></div>
            <div id="p12" class="cuadro" onclick="position(1,2)"></div>
        </div>
        <div class="linea">
            <div id="p20" class="cuadro" onclick="position(2,0)"></div>
            <div id="p21" class="cuadro" onclick="position(2,1)"></div>
            <div id="p22" class="cuadro" onclick="position(2,2)"></div>
        </div>
    </div>
    <script>
        var i = "o";
        var m=[
            ["","",""],
            ["","",""],
            ["","",""]
        ]
        function position(x,y){
            console.log("x="+x+" |y="+y);
            i= i=="o"?"x":"o";
            var line = "p" +x +y;
            m[x][y]=i;
            console.log(line+"-->"+i);
            console.log(m[x][y]);
            document.getElementById(line).removeAttribute("onclick");
            document.getElementById(line).innerHTML='<img src="images/'+i+'.png">';
            console.log(valida(i));
        }
        function valida(id){
            for(i=0;i<3;i++){
                if(m[i][2]!=""&&m[i][1]!=""&&m[i][0]!=""&&m[i][0]==m[i][1]&&m[i][2]==m[i][1]){
                    return "ganaste" + id;
                }
            }

            for(i=0;i<3;i++){
                if(m[2][i]!=""&&m[1][i]!=""&&m[0][i]!=""&&m[0][i]==m[1][i]&&m[2][i]==m[1][i]){
                    return "ganaste" + id;
                }
            }
        }
    </script>

</body>
</html>
