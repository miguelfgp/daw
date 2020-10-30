var result = 0;
var evaluation;
var op1;
var op2;
var sign;
var operating = false;


document.addEventListener('keydown', function(event) {

    let code = event.code;
    let type = code.slice(0,-1);
    let number = parseInt(code.slice(-1));
    let operator = code.slice(6);

    if (type == "Digit"){
        insertNumber(number);
    }
    
    if (type == "Numpad"){
        if (number >= 0 || number <= 9){
            insertNumber(number);
        }
    }

    switch (operator){
        case 'Add': operate('+'); break;
        case 'Subtract': operate('-'); break;
        case 'Multiply': operate('*'); break;
        case 'Divide': operate('/'); break;
        case 'Enter': operate('='); break;
    }
  });


function insertNumber(num){
    var screenNumber = document.getElementById('screen').value;

    if (screenNumber.localeCompare("0") && !operating){
        if (screenNumber.length < 5){
            document.getElementById('screen').value += num;
        }
    } else {
        document.getElementById('screen').value = num;
        operating = false;
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
    operating = true;

    /*
    if (!sign){
        sign = key;
        op1 = parseInt(document.getElementById('screen').value);
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

    if (!sign){
        sign = key;
        op1 = document.getElementById('screen').value;
    } else {
        if (sign == '='){

            // Que hacer en caso de =

        } else {
            op2 = document.getElementById('screen').value;
            expression = op1 + sign + op2;
            evaluation = eval(expression);
            if (evaluation != 0){
                sign = key;
                text = checkLength(evaluation);
                document.getElementById('screen').value = text;
                op1 = parseInt(text);
                result = parseInt(text);
            } else {
                sign = key;
                op1 = parseInt(result);
            }
        }
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
