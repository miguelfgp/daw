var op1;
var op2;

function insertNumber($num){
    var pantalla = document.getElementById('screen').innerHTML;
    if (pantalla.localeCompare("0")){
        document.getElementById('screen').innerHTML += $num;
    } else {
        document.getElementById('screen').innerHTML = $num;
    }
}

function deleteScreen(){
    document.getElementById('screen').innerHTML = '0';
}