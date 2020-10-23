/* 
condicional multiple javascript
uso del switch..case..default

alumno:
fecha:
*/

var saldo;
var destino;
var coste;
var saldoCargado = false;
var destinoIncorrecto = false;


while (!saldoCargado){

        saldo=prompt('Introduzca el saldo que va a introducir en su bonobús (Entre 1 y 10 euros)','');
        if(saldo <= 0 || saldo > 10){
                alert("Introduzca por favor un saldo correcto");
        } else {
                saldoCargado = true;
        }

}

while (saldo > 0){
        destino = prompt('Elija su destino: Mijas (1 €), Marbella (2 €) u Otro (3 €). Saldo actual: ' + saldo,'');;
        switch (destino){
                case 'Mijas': coste = 1;
                        mensaje = "Ha elegido: Mijas";
                        destinoIncorrecto = false;
                        break;
                case 'Marbella': 
                        coste = 2;
                        mensaje = "Ha elegido: Marbella";
                        destinoIncorrecto = false;
                        break;
                case 'Otro': 
                        coste = 3;
                        mensaje = "Ha elegido: Otro";
                        destinoIncorrecto = false;
                        break;     
                default: destinoIncorrecto = true; 
                        break;
              }

        if (saldo - coste >= 0){
                saldo -= coste;
        } else {
                mensaje = 'No puede hacer el viaje, su saldo actual es: ' + saldo;
        }

        if (destinoIncorrecto){
                mensaje = 'Elija un destino correcto';
        }

        alert(mensaje);
        

} ;

alert('Ya no puede realizar más viajes, ha agotado su saldo');