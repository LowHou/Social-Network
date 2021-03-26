function genCharArray(charA, charZ) {
    var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
    for (; i <= j; ++i) {
        a.push(String.fromCharCode(i));
    }
    return a;
}



function validateForm() {
    var nickname = document.forms["register"]["username"].value;
    
    var chars_1 = genCharArray('a', 'z');
    var chars_2 = genCharArray('A', 'Z');
    var chars_3 = genCharArray('0', '9');
    var allowed_char = [];
    for (var i = chars_1.length - 1; i >= 0; i--) {
        allowed_char.unshift(chars_1[i]);
        allowed_char.unshift(chars_2[i]);
    }
    for (var i = chars_3.length - 1; i >= 0; i--) {
        allowed_char.push(chars_3[i]);
    }

	for (var i = nickname.length - 1; i >= 0; i--) {
	 	if(!(nickname[i] in allowed_char)){
            
	 		alert("Please, only numbers and letters");
	 		return false;
	 	}

	}
	
	var passW = document.forms["register"]["password"].value;	
	for (var i = passW.length - 1; i >= 0; i--) {
	 	if(!(nickname[i] in allowed_char)){
	 		alert("Please, only numbers and letters");
	 		return false;
	 	}
	}

}

function checkPass()
{

    //Store the password field objects into variables ...
    var password = document.forms['register']['password'];
    var confirm  = document.forms['register']['confirm'];
    //Store the Confirmation Message Object ...
    var message = document.getElementById('confirm-message');
    //Set the colors we will be using ...
    var good_color = "#17A2B8";
    var bad_color  = "#DC3545";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirm.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirm.style.backgroundColor = good_color;
        message.style.color           = good_color;
        message.innerHTML             = '<span>Passwords match</span>';
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirm.style.backgroundColor = bad_color;
        message.style.color           = bad_color;
        message.innerHTML             = "<span>Passwords don't match</span>";
        return false;
    }
}  
