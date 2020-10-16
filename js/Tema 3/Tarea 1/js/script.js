// Ejercicio 1: Mostrar versión del navegador con JavaScript.

function navegador(){

    nombre = navigator.appName;
    version = navigator.appVersion;

    document.getElementById('enunciado').innerHTML = "Mostrar versión del navegador con JavaScript.";
    document.getElementById('solucion').innerHTML = "El navegador es: " + nombre + " " + version;
}

// Ejercicio 2: Mostrar URL actual.

function ruta(){
    
    url = location.href;

    document.getElementById('enunciado').innerHTML = "Mostrar URL actual.";
    document.getElementById('solucion').innerHTML = "La URL es: " + url;
}

// Ejercicio 3. Escribir un titulo y un parrafo, y al presionar un botón indicar cuántas letras tiene cada uno de ellos.

function numeroLetras(){

    tamanhoTitulo = document.getElementById("enunciado").innerHTML.length;
    tamanhoParrafo = document.getElementById("solucion").innerHTML.length;    

    document.getElementById('enunciado').innerHTML = "Escribir un titulo y un parrafo, y al presionar un botón indicar cuántas letras tiene cada uno de ellos.";
    document.getElementById('solucion').innerHTML = "El título tiene " + tamanhoTitulo + " letras y el párrafo tiene " + tamanhoParrafo + " letras";
}

// Ejercicio 4. Tecla para invertir el color de frente y fondo.

function invertirColor(){

    colorFondo = window.getComputedStyle(document.body).backgroundColor;
    colorTexto = window.getComputedStyle(document.body).color;
    
    document.body.style.color = colorFondo;
    document.body.style.backgroundColor = colorTexto;

    document.getElementById('enunciado').innerHTML = "Tecla para invertir el color de frente y fondo.";
}

// Ejercicio 5. Tecla para invertir el color de frente y fondo.

function aumentarTamanho(){
    
    document.getElementById('enunciado').innerHTML = "Tecla para aumentar tamaño de letra";

    elemento = document.getElementById('solucion');

    tamanhoLetra = parseInt(window.getComputedStyle(elemento, null).getPropertyValue('font-size'));

    tamanhoLetra++;

    document.getElementById('solucion').style.fontSize = tamanhoLetra;

}

// Ejercicio 6. Asignar margen en puntos.

function aumentarMargen(){
    
    document.getElementById('enunciado').innerHTML = "Asignar margen en puntos.";   
    
    if (document.getElementById('solucion').style.margin != "250px"){
        document.getElementById('solucion').style.margin = "250px";
    } else {
        document.getElementById('solucion').style.margin = "0px";
    }

}

// Ejercicio 7. Usar console.log() para mostrar el tamaño de la ventana actual.

function tamanhoVentana(){
    
    document.getElementById('enunciado').innerHTML = "Usar console.log() para mostrar el tamaño de la ventana actual."; 
    console.log(screen.availWidth + " x " + screen.availHeight);

}

// Ejercicio 8. Ocultar el parrafo al pinchar un botón.

function esconderParrafo(){
    
    colorFondo = window.getComputedStyle(document.body).backgroundColor;
    document.getElementById('solucion').style.color = colorFondo;

    document.getElementById('enunciado').innerHTML = "Ocultar el parrafo al pinchar un botón.";

}

// Ejercicio 9. Mostrar un parrafo que está oculto al pinchar un botón.

function mostrarParrafo(){

    colorTexto = window.getComputedStyle(document.body).color;    
    document.getElementById('solucion').style.color = colorTexto;

    document.getElementById('enunciado').innerHTML = "Mostrar un parrafo que está oculto al pinchar un botón.";

}

// Ejercicio 10. Al pinchar un botón abrir google.com.

function abrirGoogle(){

    window.open('http://www.google.com', '_blank');

    document.getElementById('enunciado').innerHTML = "Al pinchar un botón abrir google.com.";

}