
window.addEventListener("load", function(){
	// the field uesr change the input
	var userInput;
	
	// the field error message occur
	var errorMessage;
	
	// add onblur event to all the question. When element loses focus, the error message occur or not
	document.forms[0][0].onblur = checkFirstName;
    document.forms[0][1].onblur = checkLastName;
    document.forms[0][2].onblur = checkAge;
    document.forms[0][3].onblur = checkSt;
    document.forms[0][4].onblur = checkPC;
    document.getElementById("province").onblur = checkProv;
    document.forms[0][6].onblur = checkEmail;

    
    
    function checkFirstName(){
		userInput = document.forms['survey'][0];
		errorMessage = document.getElementById("error0");
        
		if (/^[a-zA-Z ][a-zA-Z ]+$/.test(userInput.value)){
			errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		    } else {
			errorMessage.innerHTML = "At least two characters!";
			userInput.style.background = "#BA324F";
		}
	};
	
	
	function checkLastName() {
		userInput = document.forms['survey'][1];
		errorMessage = document.getElementById("error1");
        
		if (/^[a-zA-Z ][a-zA-Z ]+$/.test(userInput.value)){
			errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		} else {
            errorMessage.innerHTML = "At least two characters!";
			userInput.style.background = "#BA324F";
		}
	};
	
	function checkAge() {
		userInput = document.forms['survey'][2];
		errorMessage = document.getElementById("error2");
        
		if (/^\d+$/.test(userInput.value)) {
            errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
			} else {
			errorMessage.innerHTML = "Must enter a positive number!";
			userInput.style.background = "#BA324F";
		}
	};
	
	function checkSt() {
		userInput = document.forms['survey'][3];
		errorMessage = document.getElementById("error3");
        
		if (/^[\d]+[ ](?:[A-Za-z]+[ ]?)+$/.test(userInput.value)) {
            errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		} else {
			errorMessage.innerHTML = "Must have a number plus a street name!";
			userInput.style.background = "#BA324F";
		}
	};
    
    function checkPC() {
		userInput = document.forms['survey'][4];
		errorMessage = document.getElementById("error4");
        
		if (/^[A-Za-z]\d[A-Za-z][ ]\d[A-Za-z]\d$/.test(userInput.value)) {
            errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		} else {
			errorMessage.innerHTML = "Postal Codes are in the format ‘A1A 1A1’!";
			userInput.style.background = "#BA324F";
		}
	};
	
	function checkProv(){
		userInput = document.forms['survey'].province;
		errorMessage = document.getElementById("error5");
		
        if (/no/.test(userInput.value)) {
            errorMessage.innerHTML = "Must choice a province!";
			userInput.style.background = "#BA324F";
		} else {
			errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		}
    };
    
    function checkEmail(){
		userInput = document.forms['survey'].email;
		errorMessage = document.getElementById("error6");
		
        if (/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(userInput.value)) {
            errorMessage.innerHTML = "";
			userInput.style.background = "transparent";
		} else {
			errorMessage.innerHTML = "Invaild E-mail";
			userInput.style.background = "#BA324F";
		}
    };
	
	// add onmouseout event to submit botton. when user click all the field whether or not have error
	document.getElementById("submit").onclick = function(event) {
        
        checkFirstName();
        checkLastName();
        checkAge();
        checkSt();
        checkPC();
        checkProv();
        checkEmail();
		// array of elements that named error
		var error = document.getElementsByClassName("error");
		// number of the field have error
		var question = 0;
		question = 0;
		for (var i = 0; i < error.length; i++) {
			if (error[i].innerHTML.length > 0)
				question++;
		}
		if (question > 0)
			return false;
	}; 
});