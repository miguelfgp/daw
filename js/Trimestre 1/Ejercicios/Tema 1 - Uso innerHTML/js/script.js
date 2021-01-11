var id = document.getElementById('saludo');
var clase1 = document.getElementsByClassName('saludo')[0];
var clase2 = document.getElementsByClassName('saludo')[1];
var texto = document.getElementsByTagName('p')[0];

id.innerHTML = "Saludo desde la ID";
clase1.innerHTML = "Saludo desde la primera clase";
clase2.innerHTML = "Saludo desde la segunda clase";
texto.innerHTML = "Saludo desde la etiqueta <p>";