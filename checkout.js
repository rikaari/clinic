$(document).ready(function () {
    $.ajax({
        url: 'php/checkout.php',
        type: 'GET',
        success: function (data) {
            $('#cart-container').html(data);
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status, error);
        }
    });
});


// JavaScript code to handle active state on hover
			$(document).ready(function(){
				$('.navlink').hover(function(){
					// Remove active class from all links
					$('.navlink').removeClass('active');
					// Add active class to the hovered link
					$(this).addClass('active');
				});
			});