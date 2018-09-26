var numer=Math.floor(Math.random()*5)+1;
var timer1 = 0;
var timer2 = 0;
var timer3 = 0;

function setSlide(s_numb){
    clearTimeout(timer1);
    clearTimeout(timer2);
    clearTimeout(timer3);
    numer = s_numb - 1;
    ukryj();
    timer3 = setTimeout("slajder()", 500);
}

function Slide_left(){
    clearTimeout(timer1);
    clearTimeout(timer2);
    clearTimeout(timer3);
    for(i = 1; i<7; i++){
        numer --;
        if(numer <1) numer =7;
    
    }
    ukryj();
    timer3 = setTimeout("slajder()", 500);
}

function Slide_right(){
    clearTimeout(timer1);
    clearTimeout(timer2);
    clearTimeout(timer3);
    
    for(i = 0; i<7; i++){
        numer ++;
        if(numer >7) numer =1;
    
    }
    ukryj();
    timer3 = setTimeout("slajder()", 500);
}

function ukryj(){
    $("#slajd").fadeOut(500);
    $("#slajd1").fadeOut(500);
    $("#slajd2").fadeOut(500);

}
function slajder(){
    
    numer++; if (numer >7) numer =1;
    var plik = "<img src = \"slajdy/slajd"+numer+".png\" />";
    document.getElementById("slajd").innerHTML= plik;
    numer++; if (numer >7) numer =1;
    var plik = "<img src = \"slajdy/slajd"+numer+".png\" />";
    document.getElementById("slajd1").innerHTML= plik;
    numer++; if (numer >7) numer =1;
    var plik = "<img src = \"slajdy/slajd"+numer+".png\" />";
    document.getElementById("slajd2").innerHTML= plik;
    
    $("#slajd").fadeIn(500);
    $("#slajd1").fadeIn(500);
    $("#slajd2").fadeIn(500);

    timer1 = setTimeout("slajder()", 4000);
    timer2 = setTimeout("ukryj()", 3500);
}   
