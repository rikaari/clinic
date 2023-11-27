// Variables to store cart items and total
    let cartItems = [];
    let cartTotal = 0;


   // Variable to track the unique number for each cart item
let itemCounter = parseInt(localStorage.getItem('itemCounter')) || 1;

// Function to add item to the cart
// Function to add item to the cart
function addToCart(productName, productPrice, productImg) {
    console.log('Adding to cart:', productName, productPrice);

    // Assign the currentSetIdentifier to the item
    const item = { setIdentifier: currentSetIdentifier, name: productName, price: productPrice, img: productImg };
    cartItems.push(item);

    // Log additional details for debugging
    console.log('Cart items after addition:', cartItems);
    console.log('Cart total before addition:', cartTotal);

    cartTotal += productPrice;
    updateCartDisplay();
    saveCartToLocalStorage();

    // Open the cart after adding an item
    const cartContainer = document.getElementById('cartContainer');
    const cartContainerStyle = window.getComputedStyle(cartContainer);

    if (cartContainerStyle.display === 'none') {
        // Open the cart after adding an item
        toggleCart();
    }
}


// Function to save the currentSetIdentifier to local storage
function saveCurrentSetIdentifierToLocalStorage() {
    localStorage.setItem('currentSetIdentifier', currentSetIdentifier.toString());
}

// Function to start a new set of items in the cart
function startNewSet() {
    currentSetIdentifier++;
    saveCurrentSetIdentifierToLocalStorage();
}



    // Function to update the cart display
function updateCartDisplay() {
    const cartContent = document.getElementById('cartContent');
    const cartTotalElement = document.getElementById('cartTotal');

    // Clear existing items
    cartContent.innerHTML = '';

    // Add new items
    cartItems.forEach((item, index) => {
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('cart-item');

        const imgElement = document.createElement('img');

        // Check if item.img is a valid URL
        if (item.img && typeof item.img === 'string') {
            imgElement.src = item.img;
        } else {
            // Provide a default image or handle the case where the URL is not valid
            imgElement.src = 'imgs/docimg4.jpeg'; // Replace 'default-image.jpg' with a suitable default image URL
        }

        const itemNameElement = document.createElement('p');
        itemNameElement.textContent = item.name;

        const itemPriceElement = document.createElement('p');

        // Check if item.price is a number before using toFixed
        if (typeof item.price === 'number') {
            itemPriceElement.textContent = `$${item.price.toFixed(2)}`;
        } else {
            itemPriceElement.textContent = `$${item.price}`;
        }

        // Add a remove button for each item
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.onclick = () => removeItem(index);

        cartItemElement.appendChild(imgElement);
        cartItemElement.appendChild(itemNameElement);
        cartItemElement.appendChild(itemPriceElement);
        cartItemElement.appendChild(removeButton);

        cartContent.appendChild(cartItemElement);
    });

    // Display total
    cartTotalElement.innerHTML = `<p>Total: $${cartTotal.toFixed(2)}</p><button id="purchase-button" onclick="purchase()">Checkout</button>`;
}



    // Function to remove an item from the cart
function removeItem(index) {
    const removedItem = cartItems.splice(index, 1)[0];
    console.log('Removing from cart:', removedItem.name, removedItem.price);

    // Log additional details for debugging
    console.log('Cart items after removal:', cartItems);
    console.log('Cart total before removal:', cartTotal);

    cartTotal -= removedItem.price;

    // Log updated cart total for debugging
    console.log('Cart total after removal:', cartTotal);

    updateCartDisplay();
    saveCartToLocalStorage();
}


   // Function to toggle the visibility of the cart
	function toggleCart() {
		const cartContainer = document.getElementById('cartContainer');
		cartContainer.style.display = (cartContainer.style.display === 'none' || cartContainer.style.display === '') ? 'block' : 'none';
	}

		// Function to save the cart to local storage
	function saveCartToLocalStorage() {
		localStorage.setItem('cartItems', JSON.stringify(cartItems));
		localStorage.setItem('cartTotal', cartTotal.toString()); // Convert to string to avoid the 'toFixed' error
	}

	// Function to retrieve the cart from local storage
	function loadCartFromLocalStorage() {
    const storedItems = localStorage.getItem('cartItems');
    const storedTotal = localStorage.getItem('cartTotal');

    if (storedItems && storedTotal) {
        cartItems = JSON.parse(storedItems);
        cartTotal = parseFloat(storedTotal);

        // If isNaN, set cartTotal to 0
        if (isNaN(cartTotal)) {
            cartTotal = 0;
        }

        updateCartDisplay();
    }
}


// Variable to track the common identifier for the current set of cart items
let currentSetIdentifier = parseInt(localStorage.getItem('currentSetIdentifier')) || 1;

// Function to simulate the purchase
// Function to simulate the purchase
function purchase() {
    // Check if the cart is empty
    if (cartItems.length === 0) {
        alert('Your cart is empty. Add items before checking out.');
        return;
    }

    // Send cart data to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful
            console.log('Response:', xhr.responseText); // Log the response
            const responseData = JSON.parse(xhr.responseText);
            // Handle the response data if needed
            console.log(responseData);

            // Clear the cart after successful purchase
            cartItems = [];
            cartTotal = 0;
            updateCartDisplay();
            saveCartToLocalStorage();

            // Start a new set of items in the cart
            startNewSet();

            // Redirect to the payment page
            window.location.href = 'checkout.html';
        } else {
            // Request failed
            console.error('Error:', xhr.statusText);
            alert('An error occurred during the AJAX request.');
        }
    };

    xhr.onerror = function () {
        console.error('Request failed');
        alert('An error occurred during the AJAX request.');
    };

    xhr.send(JSON.stringify({ cartItems, currentSetIdentifier }));
}



    // Function to close the cart
    function closeCart() {
        const cartContainer = document.getElementById('cartContainer');
        cartContainer.style.display = 'none';
    }

    // Load cart from local storage on page load
    window.addEventListener('load', loadCartFromLocalStorage);
