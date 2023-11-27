const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".chat input"),
errorText = form.querySelector(".error-msg");

form.onsubmit = (e)=>{
		e.preventDefault(); //preventing form submission
}

continueBtn.onclick = ()=>{
	//starting ajax
	let xhr = new XMLHttpRequest();
	xhr.open("POST","php/login.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				console.log(data);
				if(data == "success"){
					window.location.href = "users.php";
				
				}else{
					errorText.style.display = "block";
					errorText.textContent = data; 
				}
			}
		}
	}
	//sending form through ajax to php
	let formData = new FormData(form);
	xhr.send(formData);
}