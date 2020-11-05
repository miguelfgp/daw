function verificarEntrada()
{
  if (window.confirm('¿Desea abrir cajita.html?')){
    var ventana=open('cajita.html', '_blank', 'location=yes,height=400px,width=600px');
  }
  else{
    window.alert('No hay problema');
  }
}