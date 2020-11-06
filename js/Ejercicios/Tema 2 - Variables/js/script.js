// Tipo variables

var tipos;

tipos = [typeof(x)];
tipos.push(typeof('Casa'));
tipos.push(typeof(3));
tipos.push(typeof(true));
tipos.push(typeof(''));
tipos.push(typeof(null));
tipos.push(typeof(tipos));

text = '<ul>';
for (i = 0; i < tipos.length; i++){
    text += '<li>' + tipos[i] + '</li>';
}
text += '</ul>';

document.getElementById('tipos').innerHTML = text

// Operaciones

function calc(){

    let num1;
    let num2;
    let op;

    do{
        num1 = prompt('Introduzca el primer número');
        if (num1 != undefined && isNaN(num1)){
            alert('Introduzca un número');
        }
    } while (num1 == undefined || isNaN(num1))

    if (num1 != undefined){
        do{
            op = prompt('Introduzca un operador \n' +
            'Para sumar: + \n' +
            'Para restar: - \n' +
            'Para multiplicar: * \n' +
            'Para dividir: /');
            if (op != undefined && (op != '+' && op != '-' && op != '*' && op != '/')){
                alert('Introduzca un operador válido');
            }
        } while (op == undefined || (op != '+' && op != '-' && op != '*' && op != '/'))
    }

    if (num1 != undefined && op != undefined){
        do{
            num2 = prompt('Introduzca el segundo número');
            if (num2 != undefined && isNaN(num2)){
                alert('Introduzca un número');
            }
        } while (num2 == undefined || isNaN(num2))
    }    
    
    if (num1 != undefined && op != undefined && num2 != undefined){
        alert('El resultado es: ' + eval(num1 + op + num2));
    }

        

}