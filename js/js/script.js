
function printData() {
    var data = {
        nombre: prompt('Introduce tu nombre'),
        apellidos: prompt('Introduce tus apellidos'),
        edad: prompt('Introduce tu edad')
    };

    return "Mi nombre es " + data["nombre"] + " " + data["apellidos"] + " y tengo " + data["edad"] + " años";
}

document.getElementById("mensaje").innerHTML = printData();