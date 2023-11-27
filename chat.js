const forms = document.querySelector(".typing-area"),
    inputField = forms.querySelector(".input-field"),
    sendBtn = forms.querySelector("button"),
	chatBox = document.querySelector(".chat-box");

forms.onsubmit = (e) => {
    e.preventDefault();
};

sendBtn.onclick = () => {
    // starting ajax
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
				inputField.value = ""; //clearing the field once message is sent
				scrollToBottom();
                try {
					const response = JSON.parse(xhr.responseText);

					// Check if the response is JSON
					if (response.success) {
						// Handle successful JSON response
						//alert("Message sent successfully!");

						if (response.redirect) {
							// Redirect manually
							window.location.href = response.redirect;
						} else {
							// Handle other successful response logic
							console.log(response);
						}
					} else {
						// Handle failure
						console.log(response.error);
					}
				} catch (error) {
					// Check if the response is HTML
					if (xhr.responseText.includes('<html>')) {
						console.error("HTML response from server:", xhr.responseText);
					} else {
						// Handle other non-JSON responses
						console.error("Error parsing JSON response", error);
						console.log("Error from server:", xhr.responseText);
					}
				}
            }
        }
    };

    // sending form through ajax to php
    let formData = new FormData(forms);
    xhr.send(formData);
};

chatBox.onmouseenter = ()=>{
	chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
	chatBox.classList.remove("active");
}


setInterval(()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST","php/getChats.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				chatBox.innerHTML = data;
				if(!chatBox.classList.contains("active")){
					scrollToBottom();
				}
			}
		}
	}
	let formData = new FormData(forms);
    xhr.send(formData);
},500);//this will run every 500ms

function scrollToBottom(){
	chatBox.scrollTop = chatBox.scrollHeight;
}