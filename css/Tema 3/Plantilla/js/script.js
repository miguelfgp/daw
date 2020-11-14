function randomPallette(){
    let r = 100 + Math.floor(Math.random() * 150);
    let g = 100 + Math.floor(Math.random() * 150);
    let b = 100 + Math.floor(Math.random() * 150);

    let font = 'rgb('+(r-100)+', '+(g-100)+', '+(b-100)+')';   
    let border = 'rgb('+(r-50)+', '+(g-50)+', '+(b-50)+')';  
    let menu =  'rgb('+(r+25)+', '+(g+25)+', '+(b+25)+')';
    let background = 'rgb('+(r+100)+', '+(g+100)+', '+(b+100)+')';
    let column = 'rgb('+(r+50)+', '+(g+50)+', '+(b+50)+')';

    
    document.getElementById('header').style.backgroundColor = menu;
    document.getElementById('header').style.borderColor = border;
    //document.getElementById('footer').style.backgroundColor = menu;
    //document.getElementById('footer').style.borderColor = border;
    document.getElementById('nav').style.backgroundColor = column;
    document.getElementById('menu').style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[0].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[1].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[2].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[3].style.borderColor = border;
    document.getElementById('list').getElementsByTagName('ul')[0].getElementsByTagName('li')[4].style.borderColor = border;
    document.getElementById('button').style.borderColor = border;
    document.getElementById('hidden-list').style.backgroundColor = column;
    document.getElementById('hidden-list').style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[0].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[1].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[2].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[3].style.borderColor = border;
    document.getElementById('hidden-list').getElementsByTagName('ul')[0].getElementsByTagName('li')[4].style.borderColor = border;    
    document.getElementById('main').style.backgroundColor = background;
    document.getElementById('logo').style.backgroundColor = column;
    document.getElementById('logo').style.borderColor = border;    
    document.body.style.color = font;
    //document.getElementById('footer').style.color = font;
}