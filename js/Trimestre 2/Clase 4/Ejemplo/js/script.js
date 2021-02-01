var title = document.getElementById("DOM");

title.addEventListener('mouseover', function(){
    textMod(true);
});

title.addEventListener('mouseout', function(){
    textMod(false);
});

function textMod(write){

    let text = "";

    if (write){
        text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed magna nisl, tincidunt nec enim ac, consectetur semper arcu. Suspendisse potenti. Aenean sit amet mi orci. Nunc sit amet nulla nibh. Sed risus ante, elementum quis tortor at, pharetra lacinia sapien. Proin purus dui, porttitor ac scelerisque et, ullamcorper a est";
    }

    document.getElementById('demo').innerHTML = text;
}