/* 
condicional multiple javascript
uso del switch..case..default

alumno:
fecha:
*/
do{
        var iniciales;
        iniciales=prompt('Ingrese las 2 primeras letras de un dia de la semana. Ingrese FIN en mayúsculas para finalizar','');
      
        switch (iniciales) {
          case 'lu': alert('lunes');
                  break;
          case 'ma': alert('martes');
                  break;
          case 'mi': alert('miercoles');
                  break;
          case 'ju': alert('jueves');
                  break;
          case 'vi': alert('viernes');
                  break;
          case 'sa': alert('sabado');
                  break;
          case 'do': alert('domingo');
                  break;
          case 'FIN': alert('Programa finalizado');
                  break;         
          default:alert('debe ingresar solo las letras en minusculas sin espacios.');
        }      
} while (iniciales.localeCompare('FIN'));