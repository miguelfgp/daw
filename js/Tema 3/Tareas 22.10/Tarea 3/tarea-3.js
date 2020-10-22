/* 
estructuras secuenciales javascript
alumno:
fecha:
*/
  var cadena = " cadena rodeada de espacios    ";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');

  var cadena = "cadena NO rodeada de espacios";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');

  var cadena = " 1 cadena rodeada de espacios empieza con digito numerico.";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');

  var cadena = "1024cadena empieza con digito numerico decimal normal";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');

  var cadena = "075 cadena empieza con digito cero la toma como octal";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');
  numero*=2;
  document.write('(pero esta característica no funciona siempre bien porque está en desuso)');

  var cadena = "0xA39B cadena empieza con digito cero equis la toma como hexadecimal";
  var numero = parseInt(cadena);
  document.write('La cadena ***'+cadena+'*** equivale al número '+numero+'<br>');

