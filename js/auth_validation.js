
var email_error = document.getElementById("email_error");
	var password_error = document.getElementById("password_error");


function validate_auth(){
	var email = document.getElementById("email").on;
	var password = document.getElementById("password");

	var email_result = validate_email(email.value);
	var password_result = validate_password(password.value);



	return email_result && password_result;
}

//checks password
function validate_password(password_string){
	//check if length is not zero
	//check if password is longer than 5;
	//check if password contains at least one number
	if(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password_string)){
		//passes password validation
		password_error.innerText = "";
		return true;
	}
	password_error.innerText = "Password must be 8 characters with at least one number with no special characters"
	return false;
}


//checks the email
function validate_email(email_string){
	//check if length is not zero
	//check if it matches the email regex

	// if (/^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/.test(email_string)){
		// email_error.style.display = 'none';
		// return true;
	// }

	if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email_string)){
		email_error.innerText = "";
		return true;
	}

	email_error.innerText =  "Enter a valid email";
	return false;
}
