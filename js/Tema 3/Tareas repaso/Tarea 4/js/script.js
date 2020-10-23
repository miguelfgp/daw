/* 
estructuras secuenciales y repetitivas javascript
además del do..while están el while y el for

alumno:
fecha:
*/
  var hsm;
  var hst;
  do{
    hsm=prompt('Horas de estudio por la mañana:','');
    if (hsm < 0 || hsm > 8){
      alert('El valor debe estar entre 0 y 8')
    }
  } while (hsm < 0 || hsm > 8);

  do{
    hst=prompt('Horas de estudio por la tarde:','');
    if (hst < 0 || hst > 8){
      alert('El valor debe estar entre 0 y 8')
    }
  } while (hst < 0 || hst > 8);
  

  var hsd=parseInt(hsm)+parseInt(hst);
  var mensaje='Ha estudiado '+hsd+' horas<br>(a lo largo del día)';
  if (hsm>hst)
  {
    var mensaje2='.<br>Ha estudiado más por la mañana';
  }
  else
  {
    var mensaje2='.<br>Por la tarde estudió al menos tanto como por la mañana';
  }
  
  var valor=1;
  do {
	  valor=prompt('Ingrese el nro. cero para mostrar el resultado:','');
  } while(valor!=0);
  
  document.getElementById("ubicacion1").innerHTML = mensaje+mensaje2;
	  
			
			
  