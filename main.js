$( document ).ready(function() {

	var i;

	$('.logo').fadeIn("slow", function(){});

	var galleryContent = [
					{
						image: 'images/choc-strawberry-cake.jpg',
						review: 'Sweet strawberries and bitter chocolate. Absolutely delicious.'
					}, 
					{
						image: 'images/berry-layer-cake.jpg',
						review: 'Looks incredible and it tasted even better!.'
					}, 
					{
						image: 'images/choc-cake.jpg',
						review: 'Rich and tasty, just what we needed as chocaholics.'
					}, 
					{
						image: 'images/pizza.jpg',
						review: 'If you thought the cake was good, wait for the pizza.'
					}, 
					{
						image: 'images/macarons.jpg',
						review: 'Maybe the best macarons i\'ve ever had, Laduree included.'
					},
					{
						image: 'images/cupcakes.jpg',
						review: 'Light and fluffy, creamy frosting, just perfect.'
					}
				];

	function modulo(num, mod){
		return num - Math.floor( num / mod ) * mod;
	}



	var position = 0;

	function updateGallery(direction){
		if(direction === -1){
			position = modulo(position - 1, galleryContent.length);
			$('.gallery-image').attr("src", galleryContent[ position ].image);
			$('.gallery-review').text( galleryContent[ position ].review );
		}
		else {
			position = modulo(position + 1, galleryContent.length);
			$('.gallery-image').attr("src", galleryContent[ position ].image);
			$('.gallery-review').text( galleryContent[ position ].review );
		}
	}

	var productsOrdered = [];
	var formPrepared = '';

	$('#gallery-forward').click( function() {
		$('.gallery-image').fadeOut("slow", function(){});
		updateGallery(1);
		$('.gallery-image').fadeIn("fast", function(){});
	});

	$('#gallery-backward').click( function() {
		updateGallery(-1);
	} );

	$('.product-bar').click( function() {
		if($(this).css('border-color') === 'rgb(51, 51, 51)') {
			$(this).css( 'border-color', '#fff');
			productsOrdered.push( $(this).text() + ':\n\t\n\n' );
			formPrepared += productsOrdered[productsOrdered.length - 1];
			$('#the-order').val( formPrepared );
		}
		else {
			$(this).css({'color': '#333', 'border-color': '#333'});
			console.log(productsOrdered);
			for(i = 0; i < productsOrdered.length; i++) {
				if(productsOrdered[i] === $(this).text() + ':\n\n') {
					productsOrdered.splice(i, 1);
				}
			}
			formPrepared = '';
			console.log(productsOrdered);
			for(i = 0; i < productsOrdered.length; i++) {
				formPrepared += productsOrdered[i];
			}
			$('#the-order').val( formPrepared );
		}
	});

	

	

});