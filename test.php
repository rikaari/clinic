<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
   
    <title>Payment Method</title>
</head>
<body>
<div class="container">
    <h6>Checkout</h6>
    <span>x</span>
    <h1>Payment Method</h1>
    <form action="/">
	
     <label for="location">Your Current Location:</label>
    <button onclick="getUserLocation()">Get My Location</button>
    <input type="text" id="location" name="location" readonly>
	
    <label for="cardno">Card Number
    <input type="text" name="cardno" id="cardno" maxlength="19" onkeypress="cardspace()"/>
    </label>
	
    <div class="float">
    <label for="validtill">Valid till
        <input type="text" name="validtill" id="validtill" maxlength="7" onkeypress="addSlashes()"/>
    </label>
	
  <label for="cvv">Cvv
        <input type="text" name="cvv" id="cvv" maxlength="3"/>
    </label></div>
    <label for="checkbox">
    <input type="checkbox" name="checkbox" id="checkbox"/>
    <p>Payment Address is the same as the Delivery Address</p></label> 
    <button>Pay 89.00 $</button>
    </form>
	 <script>
			function getUserLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(
						function (position) {
							// Success callback
							const latitude = position.coords.latitude;
							const longitude = position.coords.longitude;
							const locationInput = document.getElementById('location');
							locationInput.value = `Latitude: ${latitude}, Longitude: ${longitude}`;
						},
						function (error) {
							// Error callback
							console.error(`Error getting location: ${error.message}`);
							alert('Error getting your location. Please select your country manually.');
						}
					);
				} else {
					alert('Geolocation is not supported by your browser. Please select your country manually.');
				}
			}
	</script>
</body>
</html>