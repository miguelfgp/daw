// Ejercicio 1: Mostrar versión del navegador con JavaScript.

var navegador = {
    nombre: navigator.appName,
    version: navigator.appVersion,
    imprimir: function(){
        return "El navegador es: " + this.nombre + " " + this.version;
    }
};

document.getElementById("nav").innerHTML = navegador.imprimir();

// Ejercicio 2: Mostrar URL actual.

var direccion = {
    url: location.href,
    imprimir: function(){
        return "La URL es: " + this.url;
    }
};

document.getElementById("url").innerHTML = direccion.imprimir();

// Ejercicio 3. Escribir un titulo y un parrafo, y al presionar un botón indicar cuántas letras tiene cada uno de ellos.

function cuentaLetras(){
    tamañoTitulo = document.getElementById("titulo").innerHTML.length;
    tamañoParrafo = document.getElementById("parrafo").innerHTML.length;

    document.getElementById('totalLetras').innerHTML = "El título tiene " + tamañoTitulo + " letras y el párrafo tiene " + tamañoParrafo;
}

// Ejercicio 4. Tecla para invertir el color de frente y fondo.

function invertirColor(){
    colorTexto = document.html.innerHTML.fontcolor;
    colorFondo = document.getElementById("parrafo").innerHTML

    document.getElementById('totalLetras').innerHTML = "El título tiene " + tamañoTitulo + " letras y el párrafo tiene " + tamañoParrafo;
}