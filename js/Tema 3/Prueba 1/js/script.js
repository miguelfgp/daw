function print() {

    var navegador = {
        codigo: navigator.appCodeName,
        nombre: navigator.appName,
        version: navigator.appVersion,
        cookies: navigator.cookieEnabled,
        plataforma: navigator.platform,
        agente: navigator.userAgent  
    }
}

document.getElementById("demo").innerHTML = print();