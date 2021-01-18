function randomPallette(){
  let redColor = Math.floor(Math.random() * 255);
  let greenColor = Math.floor(Math.random() * 255);
  let blueColor = Math.floor(Math.random() * 255);

  let redColor2 = 255 - redColor;    
  let greenColor2 = 255 - greenColor;
  let blueColor2 = 255 - blueColor; 

  let backgroundColor = 'rgb('+(redColor)+', '+(greenColor)+', '+(blueColor)+')'; 
  let fontColor = 'rgb('+(redColor2)+', '+(greenColor2)+', '+(blueColor2)+')'; 

  document.body.style.background = backgroundColor;
  document.body.style.color = fontColor;

}

function openCalc()
{
  if (window.confirm('¿Desea probar la calculadora?')){
    var ventana = open('pages/Calculadora/index.html', '_blank', 'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=467px,width=334px');
  }
  else{
    window.alert('No hay problema');
  }
}

