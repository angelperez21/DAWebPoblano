<!DOCTYPE html>
<html>
<head>
    <title>Memorama</title>
    <style>
        body{
            background-image: url(images/ladrillo.jpg);
        }
        #estatus{
            width: 100%;
            height: 77px;
            font-size: 50px;
            float: left;
            text-align: center;    
            padding-top: 10px;
            color: seashell;
        }
        .tablero{
            margin: 0 auto;
            width: 1200px;
            height: 2050px;
            background-image: url(images/madera.jpg);
            background-size: 820px,820px, auto;
            background-position: 0px -26px;
        }
        .linea{
            height: 500px;
            margin-top: 14px;
            margin-left: 87px;
            margin-bottom: 23px;
            text-align: center;
        }

        .carta{
            width: 223px;
            height: 477px;
            float: left;
            margin-left: 30px;
            text-align: center;
            background-image: url(images/0.jpg);
        }
    </style>
</head>
<body>
    <div id="estatus"> Jugador 1: 0
Jugador 2: 0 </div>
    <div class="tablero" id="t">
        <div class="linea">
            <div id="p00" class="carta" onclick="validaClick(0,0)"></div>
            <div id="p01" class="carta" onclick="validaClick(0,1)"></div>
            <div id="p02" class="carta" onclick="validaClick(0,2)"></div>
            <div id="p03" class="carta" onclick="validaClick(0,3)"></div>
        </div>
        <div class="linea">
            <div id="p10" class="carta" onclick="validaClick(1,0)"></div>
            <div id="p11" class="carta" onclick="validaClick(1,1)"></div>
            <div id="p12" class="carta" onclick="validaClick(1,2)"></div>
            <div id="p13" class="carta" onclick="validaClick(1,3)"></div>
        </div>
        <div class="linea">
            <div id="p20" class="carta" onclick="validaClick(2,0)"></div>
            <div id="p21" class="carta" onclick="validaClick(2,1)"></div>
            <div id="p22" class="carta" onclick="validaClick(2,2)"></div>
            <div id="p23" class="carta" onclick="validaClick(2,3)"></div>
        </div>
        <div class="linea">
            <div id="p30" class="carta" onclick="validaClick(3,0)"></div>
            <div id="p31" class="carta" onclick="validaClick(3,1)"></div>
            <div id="p32" class="carta" onclick="validaClick(3,2)"></div>
            <div id="p33" class="carta" onclick="validaClick(3,3)"></div>
        </div>
    </div>
    <script>
        /*------------------------Variables------------------------------------------------*/
        var mat=[new Array(4),new Array(4),new Array(4),new Array(4)];
        var cont=0,nclick=0;
        var xaux,yaux,vx,vy;
        var jugador=1;
        var conJ1=0;
        var conJ2=0;
        var igual;
        window.onload = loadMat();
        /*-------------------------Funciones iniciales------------------------------------*/ 
        function loadMat(){
            for(var i = 0;i<mat.length;i++ ){
                for(var j = 0;j<mat[i].length;j++){
                    mat[i][j]="";
                }
            }
            randomMat();
        }
        function randomMat(){
            var j=0;
            for(var i =1; i<9; i++){
                while(isnullMat((Math.floor(Math.random()*4)),(Math.floor(Math.random()*4)),i)!=1);
                while(isnullMat((Math.floor(Math.random()*4)),(Math.floor(Math.random()*4)),i)!=1);
            }
            console.log(mat);
        }
        function isnullMat(i,j,num){
            if(mat[i][j]==""){
                mat[i][j]=num;
                return 1;
            }
            return 0;
        }
        /*----------------------------------------Validaciones------------------------------------*/
        function validaClick(x,y){
            nclick++;
            if(nclick==3){
                nclick=0;
            }else{
                if(nclick==1){
                vx=x;
                vy=y;
                vCarta(x,y)
                }else if(nclick==2){
                    if(vx==x&&vy==y){
                        nclick--;
                    }else{
                        vCarta(x,y);
                        nclick=0;
                    }
                }
            }
        }
        function vCarta(x,y){
            var line= "p"+x+y;
            document.getElementById(line).innerHTML='<img src="images/'+mat[x][y]+'.jpg">';
            valida(x,y);
        }
        function valida(x,y){
            var line= "p"+x+y;
            var line2= "p"+xaux+yaux;
            if(cont==0){
                xaux=x;
                yaux=y;
                cont++;
            }else if(cont == 1){
                if(mat[xaux][yaux]==mat[x][y]&&(xaux!=x&&yaux!=y)){
                    document.getElementById(line).removeAttribute("onclick");
                    document.getElementById(line2).removeAttribute("onclick");
                    igual=1;
                    mat[x][y]=0;
                    mat[xaux][yaux]=0;
                    puntosJugador1(jugador,igual);
                    document.getElementById("estatus").innerHTML=puntosJugador();
                }else{
                    cont--;
                    setTimeout(NotEqual,1000,x,y);
                    igual=0;
                    puntosJugador1(jugador,igual);
                    document.getElementById("estatus").innerHTML=puntosJugador();
                }
                if(jugador==1){
                    jugador=2;
                }else{
                    jugador=1;
                }
                cont=0;
            }
        }
        function puntosJugador1(jugador,igual){

            if(jugador==1){
                if(igual==1){
                    conJ1++;
                }
            }else{
                if(igual==1){
                    conJ2++;
                }
            }
            winner();            
        }
        function puntosJugador(){
            return "Jugador 1: "+conJ1+"\nJugador 2: "+conJ2; 
        }
        function winner(){
            var winer=0;
            for(var i = 0;i<mat.length;i++ ){
                for(var j = 0;j<mat[i].length;j++){
                    winer+=mat[i][j];

                }
            }
            if(winer==0){
                if(conJ1>conJ2){
                    alert("El jugador 1 es el ganador con "+conJ1+" puntos\nMientras jugador 2 tuvo "+conJ2+" puntos");
                }else if(conJ1==conJ2){
                    alert("Empate jugador 1: "+conJ1+" puntos y jugador 2 "+conJ2+" puntos");
                }else if(conJ2>conJ1){
                    alert("El jugador 2 es el ganador con "+conJ2+" puntos\nMientras jugador 1 tuvo "+conJ1+" puntos");
                }
            } 
        }
        /*-----------------------Funcion de no iguaes--------------------------------------------*/
        function NotEqual(x,y){
            document.getElementById("p"+x+y).innerHTML='<img src="images/0.jpg">';
            document.getElementById("p"+xaux+yaux).innerHTML='<img src="images/0.jpg">';
        }
    </script>
</body>
</html>