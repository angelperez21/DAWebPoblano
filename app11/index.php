<!DOCTYPE html>
<html>
<head>
    <title>Tijeras</title>

    <style type="">
        .cs1{
            border-radius: 10px;
            width: 361px;
            height: 274px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0.24);
        }
        #estatus{
            width: 100%;
            height: 77px;
            font-size: 50px;
            float: left;
            text-align: center;    
            padding-top: 10px;
        }
        .cs2{
            float: left;
            margin-top: 28px;
            height: 146px;
            width: 141px;
            text-align: center;
        }
        .cs3{
            float: left;
            width: 141px;
            margin-top: 28px;
            height: 146px;
            text-align: center;
        }
    </style>
        
    <script>
        function mano1(id){
            var r= Math.floor(Math.random()*3);
            mano("jugador1",r);
            mano("jugador2",id);
            document.getElementById("estatus").innerHTML=valida(id,r);
        }

        function mano2(id){
            var r= Math.floor(Math.random()*3);
            mano("jugador1",r);
            mano("jugador2",id);
            document.getElementById("estatus").innerHTML=valida(id,r);
        }

        function mano3(id){
            var r= Math.floor(Math.random()*3);
            mano("jugador1",r);
            mano("jugador2",id);
            document.getElementById("estatus").innerHTML=valida(id,r);
        }

        function mano(name,id){
            if(id==0){
                document.getElementById(name).innerHTML='<img src="images/0.png">';
            }else if(id==1){
                document.getElementById(name).innerHTML='<img src="images/1.png">';
            }else if(id==2){
                document.getElementById(name).innerHTML='<img src="images/2.png">';
            }
        }

        function valida(n1,n2){
            if(n1==n2){
                setTimeout('document.location.reload()',1000);
                return "Empate";
            }else if(n1==0 && n2==2){
                setTimeout('document.location.reload()',1000);
                return "Ganas";
            }else if(n1==1 && n2==0){
                setTimeout('document.location.reload()',1000);
                return "Ganas";
            }else if(n1==2 && n2==1){
                setTimeout('document.location.reload()',1000);
                return "Ganas";
            }else{
                setTimeout('document.location.reload()',1000);
                return "Pierdes"
            }
        }

    </script>
</head>
<body>
    <div class="cs1">
        <div id="estatus"></div>
        <div class="cs2" id="jugador1"> 
            <img src="images/hand1.png"> 
        </div>
        <div class="cs3" id="jugador2"> 
            <img src="images/hand2.png"> 
        </div>
        <div style="float: left; padding-left:8px;"> 
            <div>
                <a href="javascript:mano1(0)">
                    <img src="images/hand3.png" style="border-radius:18px">
                </a>
            </div>
            <div>
                <a href="javascript:mano2(1)">
                    <img src="images/hand4.png" style="border-radius:18px">
                </a>
            </div>
            <div>
                <a href="javascript:mano3(2)">
                    <img src="images/hand5.png" style="border-radius:18px">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
</html>