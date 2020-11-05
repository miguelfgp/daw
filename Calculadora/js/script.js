var expression = "";
var op1;
var op2;
var sign;
var inserting = false;
var operating = false;

document.addEventListener('keydown', function(event) {

    let code = event.code;

    if (code == 'Delete'){
        deleteScreen();
    } else {
        let type = code.slice(0,-1);
        let number = parseInt(code.slice(-1));

        if (type == "Digit"){
            insertNumber(number);
        } else if (type == "Numpad"){
            
            if (number >= 0 || number <= 9){
                insertNumber(number);
            }

        } else {

            let operator = code.slice(6);

            switch (operator){
                case 'Add': operate('+'); break;
                case 'Subtract': operate('-'); break;
                case 'Multiply': operate('*'); break;
                case 'Divide': operate('/'); break;
                case 'Enter': operate('='); break;
            }
        }
    }

  });


function insertNumber(num){
    
    var screenNumber = document.getElementById('screen').value;

    if (screenNumber.localeCompare("0") && inserting){
        if (screenNumber.length < 5){
            document.getElementById('screen').value += num;
        }
    } else {
        document.getElementById('screen').value = num;
        inserting = true;
    }
}

function deleteScreen(){
    document.getElementById('screen').value = '0';
    result = 0;
    op1 = 0;
    op2 = 0;
    sign = "";
}

function operate(key){
    let text;
    let evaluation;
    inserting = false;

    // Aquí va el código comentado abajo

    if (operating){
        
        op2 = document.getElementById('screen').value;
         
        expression += op2.toString();
        evaluation = eval(expression);

        text = checkLength(evaluation);
        document.getElementById('screen').value = text;
        expression = "";
        operating = false;
        
    } else {
        op1 = document.getElementById('screen').value;
        expression += op1.toString();

        if (key != '='){
            expression += key;
        }

        operating = true;
    }
}

function checkLength(number){

    if (number >= 99999){
        number = 99999;
    }
        
    number = number.toString();
    number = number.substring(0, 5);
    return number;
}


/*
    if (!operating){
        sign = key;
        op1 = parseInt(document.getElementById('screen').value);
        operating = true;
    } else {
        if (result != 0){
            op1 = parseInt(result);
        }
        op2 = parseInt(document.getElementById('screen').value);
        switch (sign){
            case '+': 
                result = op1 + op2;
                break;
            case '-': 
                result = op1 - op2; 
                break;
            case '*': 
                result = op1 * op2; 
                break;
            case '/': 
                result = op1 / op2;
                break;
        }
        sign = key;
        text = checkLength(result);
        document.getElementById('screen').value = text;
    }
    */