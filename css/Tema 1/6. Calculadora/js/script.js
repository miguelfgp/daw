var op1;
var op2;
var sign;
var operating = false;

function insertNumber(num){
    var screenNumber = document.getElementById('screen').innerHTML;

    if (screenNumber.length < 5){
        if (screenNumber.localeCompare("0") && !operating){
            document.getElementById('screen').innerHTML += num;
        } else {
            document.getElementById('screen').innerHTML = num;
            operating = false;
        }
    }
}

function deleteScreen(){
    document.getElementById('screen').innerHTML = '0';
    op1 = 0;
    sign = "";
}

function operate(key){
    let text;
    operating = true;

    if (!sign){
        sign = key;
        op1 = parseInt(document.getElementById('screen').innerHTML);
    } else {
        op2 = parseInt(document.getElementById('screen').innerHTML);
        switch (sign){
            case '+': 
                op1 += op2;
                break;
            case '-': 
                op1 -= op2; 
                break;
            case 'X': 
                op1 *= op2; 
                break;
            case '/': 
                op1 /= op2; 
                break;
        }
        sign = key;

        text = checkLength(op1);

        document.getElementById('screen').innerHTML = text;
    }
}

function checkLength(number){
    number = number.toString();
    number = number.substring(0, 5);
    return number
}
