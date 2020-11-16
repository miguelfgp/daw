function randomPallette(){
    let r = 100 + Math.floor(Math.random() * 150);
    let g = 100 + Math.floor(Math.random() * 150);
    let b = 100 + Math.floor(Math.random() * 150);

    let font = 'rgb('+(r-125)+', '+(g-125)+', '+(b-125)+')'; 
    let border = 'rgb('+(r-75)+', '+(g-75)+', '+(b-75)+')';
    let menu = 'rgb('+(r-25)+', '+(g-25)+', '+(b-25)+')';
    let logo =  'rgb('+r+', '+g+', '+b+')'; 
    let link = 'rgb('+(r+25)+', '+(g+25)+', '+(b+25)+')';
    let column1 = 'rgb('+(r+50)+', '+(g+50)+', '+(b+50)+')'; 
    let column2 = 'rgb('+(r+75)+', '+(g+75)+', '+(b+75)+')';   
    let background = 'rgb('+(r+100)+', '+(g+100)+', '+(b+100)+')';



    for (i = 0; i < document.getElementsByTagName('a').length; i++){
        document.getElementsByTagName('a')[i].style.color = font;
    }
    document.body.style.color = font;
    document.getElementById('header').style.backgroundColor = menu;
    document.getElementById('header').style.borderColor = border;
    document.getElementById('nav').style.backgroundColor = link;
    document.getElementById('menu').style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[0].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[1].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[2].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[3].style.borderColor = border;
    document.getElementById('button').style.borderColor = border;
    document.getElementById('hidden-list').style.backgroundColor = column1;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[0].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[1].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[2].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[3].style.borderColor = border;
    document.getElementById('logo').style.backgroundColor = logo;
    document.getElementById('logo').style.borderColor = border;   
    document.getElementById('content').style.borderColor = border; 
    document.getElementById('aside').style.backgroundColor = column1;
    document.getElementById('aside').style.borderColor = border;  
    document.getElementById('section').style.backgroundColor = background;
    document.getElementById('footer').style.backgroundColor = menu;
    document.getElementById('footer').style.borderColor = border;
    document.getElementById('footer').style.color = font;
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

