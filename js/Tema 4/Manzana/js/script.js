function Manzana(tipo){
    this.tipo = tipo;
    this.color = 'Roja';
}

var golden = new Manzana('Golden');
document.getElementById('resultado').innerHTML = "El objeto manzana es de tipo: " + golden.tipo;