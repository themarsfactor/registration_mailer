function check(){
	//alert("yes");
	let count = 1;
	let password = document.getElementById("login-pw").value;
	console.log(password);
	let mail = document.getElementById("login-mail").value;

	
	if (password== "password" && mail =="mail" ) {
		alert("login successfully");
	}
	else{
		if ((password && mail)> 1) {
			password.disabled = true;
			mail.disabled = true;
		}
	}
}