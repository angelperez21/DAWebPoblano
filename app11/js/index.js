function mano1(id){
    var r= Math.floor(Math.random()*3);
    mano("Jugador1",r);
    mano("Jugador2",id);
    document.getElementById("status").innerHTML=valida(id,r);
}

function mano2(id){
    var r= Math.floor(Math.random()*3);
    mano("Jugador1",r);
    mano("Jugador2",id);
    document.getElementById("status").innerHTML=valida(id,r);
}

function mano3(id){
    var r= Math.floor(Math.random()*3);
    mano("Jugador1",r);
    mano("Jugador2",id);
    document.getElementById("status").innerHTML=valida(id,r);
}

function mano(name,id){
    if(id==0){
        document.getElementById(name).innerHTML='<img src="images/0.png">';
    }else if(id == 1){
        document.getElementById(name).innerHTML='<img src="images/1.png">';
    }else if(id == 2){
        document.getElementById(name).innerHTML='<img src="images/2.png>';
    }
}

function valida(n1,n2){
    if(n1 == n2){
        return "Empate";
    }else if(n1 == 0 && n2 == 2){
        return "Ganas";
    }else if(n1 == 1 && n2 == 0){
        return "Ganas";
    }else if(n1 == 2 && n2 == 1){
        return "Ganas";
    }else{
        return "Pierdes"
    }
}