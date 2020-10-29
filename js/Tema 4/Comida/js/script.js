var fruta = ['Uva', 'Manzana', 'Pera', 'Sandia'];
var comida = new Array('Arroz', 'Pasta', 'Carne', 'Postres');

for (var i = 0; i < fruta.length; i++){
    console.log('La fruta de la posición '+ i + ' es: ' + fruta[i]);
}

comida[2] = 'Helado';
console.log('La comida de la posición '+ 2 + ' es: ' + comida[2]);
console.log('El array comida tiene una longitud de ' + comida.length);
comida.push('Desayunos');
console.log('El array comida tiene una longitud de ' + comida.length);
console.log('La comida de la posición '+ (comida.length - 1) + ' es: ' + comida[comida.length - 1]);
console.log('El índice dentro de comida del emento Pasta es: ' + comida.indexOf('Pasta'));

function orden_a_z(array){
    array.sort();
}

function orden_z_a(array){
    array.reverse();
}

function imprimir(array, id){
    
    var mensaje = "";

    for (var i = 0; i < array.length; i++){
        mensaje += 'La fruta de la posición '+ i + ' es: ' + array[i] + '<br>';
    }

    document.getElementById(id).innerHTML = mensaje;
}