function showText(number) {
    let x = number;
    let text;

    switch(x){
        case 1:
            text = "Tomare como referencia de paleta cromática la de la plantilla Indigo de w3schools. Para probarlo, he aplicado en esta misma web la plantilla de w3schools";
            break;
        case 2:
            text = "Utilizaria la fuente de letra Segoe UI, la misma utilizada por plantilla Indigo de w3schools."; break;
        default: 
            text ="Texto por defecto";
    }

    document.getElementById("text").innerHTML = text;
  }