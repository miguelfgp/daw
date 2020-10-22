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
  document.write('Ha estudiado ');
  document.write(hsd);
  document.write(' horas<br>');
  document.write('(a lo largo del día)');