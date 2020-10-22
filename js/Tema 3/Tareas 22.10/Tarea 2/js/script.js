/* 
estructuras secuenciales javascript
alumno:
fecha:
*/
  var hsm;
  var hst;
  hsm=prompt('Horas de estudio por la mañana:','');
  hst=prompt('Horas de estudio por la tarde:','');
  var hsd=parseInt(hsm)+parseInt(hst);
  var mensaje;
  mensaje = 'Ha estudiado ' +hsd+ ' horas<br> (a lo largo del día)';

  document.getElementById("text").innerHTML = mensaje;