
	// Check if there are saved cart items in localStorage when the page loads
	document.addEventListener('DOMContentLoaded', () => {
	const cartItems = document.querySelector('.cart-items');
	const cartCount = document.getElementById('cart-count');

	// Load cart items from localStorage
	const savedCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

	savedCartItems.forEach((savedCartItem) => {
	const cartItem = document.createElement('div');
	cartItem.className = 'cart-item';
	cartItem.innerHTML = savedCartItem;

	const removeButton = cartItem.querySelector('.remove-button');
	removeButton.addEventListener('click', () => {
	cartItems.removeChild(cartItem);
	updateCartTotal();
	saveCartItems();
	updateCartCount();
	});

	cartItems.appendChild(cartItem);
	});

	updateCartTotal();
	updateCartCount();
	});


	// Function to save cart items to localStorage
	function saveCartItems() {
	const cartItems = document.querySelector('.cart-items');
	const cartItemElements = cartItems.querySelectorAll('.cart-item');
	const savedCartItems = [];

	cartItemElements.forEach((cartItemElement) => {
	savedCartItems.push(cartItemElement.innerHTML);
	});

	localStorage.setItem('cartItems', JSON.stringify(savedCartItems));
	}

	function isProductInLocalStorage(productId) {
	const savedCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
	return savedCartItems.includes(productId);
	}
	function isProductInCart(productId) {
	const savedCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
	return savedCartItems.includes(productId);
	}

	function removeFromLocalStorage(productId) {
	const savedCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
	const updatedCartItems = savedCartItems.filter((item) => item !== productId);
	localStorage.setItem('cartItems', JSON.stringify(updatedCartItems));
	}
	function updateCartCount() {
	const cartItemElements = document.querySelectorAll('.cart-item');
	const cartCount = document.getElementById('cart-count');

	if (cartCount) {
	cartCount.textContent = cartItemElements.length;
	}
	}

	document.addEventListener('DOMContentLoaded', () => {
	updateCartTotal();
	});

	const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
	const cartContainer = document.querySelector('.cart-container');
	const cartItems = document.querySelector('.cart-items');
	const cartButton = document.querySelector('.cart-button');
	const closeCartButton = document.querySelector('.close-cart');

	function removeCartItem(item) {
	cartItems.removeChild(item);
	updateCartTotal(); // Call the updateCartTotal function after removing the item
	}

	function resetAddToCartButton(button) {
	button.textContent = 'Add to Cart';
	button.disabled = false;
	}


	// Function to update the cart total
	function updateCartTotal() {
	const cartItemElements = cartItems.querySelectorAll('.cart-item');
	let total = 0;

	cartItemElements.forEach((cartItemElement) => {
	const priceString = cartItemElement.querySelector('p').textContent;
	const priceMatch = priceString.match(/\d+\.\d+/); // Extract the numeric part (e.g., 19.99)

	if (priceMatch) {
		const price = parseFloat(priceMatch[0]);
		total += price;
	}
	});

	// Display the total in the cart
	const cartTotalElement = document.querySelector('.cart-total');
	cartTotalElement.textContent = `Total: $${total.toFixed(2)}`;

	// Show/hide the cart total and purchase button based on cart items
    if (cartItemElements.length > 0) {
        // Items are in the cart, so show the total and purchase button
        cartTotalElement.style.display = 'block';
        purchaseButton.style.display = 'block';
    } else {
        // No items in the cart, so hide the total and purchase button
        cartTotalElement.style.display = 'none';
        purchaseButton.style.display = 'none';
    }
	}

	// Define an array of supported image extensions
	const supportedImageExtensions = ['webp', 'png', 'jpg', 'jpeg', 'gif'];

	// Function to get the image URL based on the product ID and supported extensions
	function getProductImageURL(productId, extensions) {
		for (const extension of extensions) {
			const imageUrl = `img/${productId}.${extension}`;
			const image = new Image();
			image.src = imageUrl;
			if (image.width > 0 && image.height > 0) {
				return imageUrl;
			}
		}
		// If no valid image found, return a placeholder image URL or handle it as needed
		return 'img/placeholder.jpg'; // You can customize this fallback
	}


	addToCartButtons.forEach((button) => {
	button.addEventListener('click', () => {
	// Get the product container for the clicked button
	const productContainer = button.closest('.product-container');

	// Get the product details using the data-product-id attribute
	const productId = productContainer.getAttribute('data-product-id');
	const productName = productContainer.querySelector('h1').textContent;
	const productPrice = productContainer.querySelector('p:nth-child(2)').textContent;

	// Call getProductImageURL with the supported image extensions
	const imageUrl = getProductImageURL(productId, supportedImageExtensions);


	// Create a new cart item element
	const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <img src="${imageUrl}" alt="${productName} Image" width="150" height="150">
            <p>${productName} - ${productPrice}</p>
            <button class="remove-button">Remove</button>
        `;
	// Append the cart item to the cart container
	cartItems.appendChild(cartItem);

	// Show the cart container
	cartContainer.style.right = '0';

	// Change the button text
	button.textContent = 'Added to Cart';
	button.disabled = false; // Disable the button to prevent multiple clicks

	// Add an event listener to the "Remove" button inside the cart item
	const removeButton = cartItem.querySelector('.remove-button');
	removeButton.addEventListener('click', () => {
	removeCartItem(cartItem);

	// Reset the "Add to Cart" button state
	button.textContent = 'Add to Cart';
	button.disabled = false;

	// Update the cart total
	updateCartTotal();
	updateCartCount();
	saveCartItems(); // Move saveCartItems() here
	});

	// Update the cart total after adding the item
	updateCartTotal();
	updateCartCount();
	saveCartItems(); // Move saveCartItems() here as well
	});
	});


	function toggleCart() {
	if (cartContainer.style.right === '0px') {
	cartContainer.style.right = '-400px'; // Hide the cart
	cartButton.textContent = 'Open Cart'; // Change button text to "Open Cart"
	} else {
	cartContainer.style.right = '0'; // Show the cart
	cartButton.textContent = 'Close Cart'; // Change button text to "Close Cart"
	}
	}

	// Add this function to handle opening the cart when an item is added
	function openCart() {
	cartContainer.style.right = '0'; // Show the cart
	cartButton.textContent = 'Close Cart'; // Change button text to "Close Cart"
	}

	// Modify the event listener for adding items to call openCart function
	addToCartButtons.forEach((button) => {
	button.addEventListener('click', () => {
	// ... (other code)
	openCart(); // Call openCart function to open the cart
	});
	});

	function closeCart() {
	cartContainer.style.right = '-400px'; // Hide the cart
	cartButton.textContent = 'Open Cart'; // Change button text to "Open Cart"
	}

	// Add an event listener to the "Purchase" button
	const purchaseButton = document.getElementById('purchase-button');
	purchaseButton.addEventListener('click', function() {
		showPopup(); // Show the pop-up message
		clearCart();
	});


	// Function to clear the cart (you can define your own logic here)
	function clearCart() {
		const cartItems = document.querySelector('.cart-items');
		cartItems.innerHTML = ''; // Clear the cart items
		updateCartTotal(); // Update the cart total
		updateCartCount(); // Update the cart count
		saveCartItems(); // Save the updated cart to localStorage
	}

	// Function to show the pop-up message
	function toggleBlur() {
		const body = document.querySelector('body');
		body.classList.toggle('blur');
	}
	
	// Function to show the pop-up message
	function showPopup() {
		const popup = document.getElementById('popup');
		popup.style.display = 'block';
		// Automatically close the popup after 3 seconds (adjust as needed)
		setTimeout(() => {
			closePopup();
		}, 3000); 
	}
	
	// Function to close the pop-up message
	function closePopup() {
		const popup = document.getElementById('popup');
		popup.style.display = 'none';
	}
	

	// Add an event listener to the Purchase button
	

	// Add an event listener to the close button within the pop-up
	
