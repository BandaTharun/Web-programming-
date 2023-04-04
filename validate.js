

// validation for Password

		function validatePassword() {
			const passwordInput = document.getElementById("password");
			const passwordValue = passwordInput.value;
			const passwordError = document.getElementById("password-error");
			let errorMessage = "";

			if (passwordValue.length < 8) {
				errorMessage = "Password must be at least 8 characters long.";
			} else if (!/[!@#$%^&*(),.?":{}|<>]/.test(passwordValue)) {
				errorMessage = "Password must contain at least one symbol.";
			}

			if (errorMessage) {
				passwordError.innerHTML = errorMessage;
				passwordError.style.display = "block";
			} else {
				passwordError.style.display = "none";
			}
		}


// validation for email

		function validateEmail() {
			const emailInput = document.getElementById("email");
			const emailValue = emailInput.value;
			const emailError = document.getElementById("email-error");
			let errorMessage = "";
		
			if (emailValue.length < 8) {
			errorMessage = "Email must contain at @ symbol.";
			} else if (!/[!@#$%^&*(),.?":{}|<>]/.test(emailValue)) {
				
			}
		
			if (errorMessage) {
				emailError.innerHTML = errorMessage;
				emailError.style.display = "block";
			} else {
				emailError.style.display = "none";
			}
		}


// validation mobile number
		function validateMobile() {
			const emailInput = document.getElementById("phone");
			const emailValue = emailInput.value;
			const emailError = document.getElementById("phone-error");
			let errorMessage = "";
		
			if (emailValue.length < 10) {
			errorMessage = "enter a valid 10-digit Mobile number.";
			} else if (!/[!@#$%^&*(),.?":{}|<>]/.test(emailValue)) {
				
			}
		
			if (errorMessage) {
				emailError.innerHTML = errorMessage;
				emailError.style.display = "block";
			} else {
				emailError.style.display = "none";
			}
		}


