// Tipo Navegador

nombre = navigator.appName;
version = navigator.appVersion;

document.getElementById('navegador').innerHTML = nombre + " " + version;

// Operaciones

function calc(){

    let num1;
    let num2;
    let op;

    do{
        num1 = prompt('Introduzca el primer número');
        if (isNaN(num1)){
            alert('Introduzca un número');
        }
    } while (num1 != undefined && isNaN(num1))

    if (num1 != undefined){
        do{
            op = prompt('Introduzca un operador \n' +
            'Para sumar: + \n' +
            'Para restar: - \n' +
            'Para multiplicar: * \n' +
            'Para dividir: /');
            if (op != undefined && op != '+' && op != '-' && op != '*' && op != '/'){
                alert('Introduzca un operador válido');
            }
        } while (op != undefined && (op != '+' && op != '-' && op != '*' && op != '/'))
    }

    if (num1 != undefined && op != undefined){
        do{
            num2 = prompt('Introduzca el segundo número');
            if (isNaN(num2)){
                alert('Introduzca un número');
            }
        } while (num2 != undefined && isNaN(num2))
    }    
    
    if (num1 != undefined && op != undefined && num2 != undefined){
        alert('El resultado es: ' + eval(num1 + op + num2));
    }   

}

function lista(){

    let num;
    let lista = "";

    do {
        if (isNaN(num)) {
            num = prompt('Introduzca un número');
        }
    } while (num != undefined && isNaN(num));

    for (i = 0; i <= num; i++) {
        lista += i + '<br>';
    }

    document.getElementById('lista').innerHTML = lista
}