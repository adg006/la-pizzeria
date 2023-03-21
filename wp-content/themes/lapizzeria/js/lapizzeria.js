/***** FUNCTION FOR LOCATION OF A MAP *****/
document.addEventListener('DOMContentLoaded', () => {

	const lat = document.querySelector("#lat").value;
	const lng = document.querySelector("#lng").value;
	const address = document.querySelector("#address").value;

	if(lat && lng){
		var map = L.map('map').setView([lat, lng], 16);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker([lat, lng]).addTo(map)
		    .bindPopup(address)
		    .openPopup();
	}

});

$ = jQuery.noConflict();

$(document).ready(function(){

	/***** FOR TOGGLING MOBILE MENU *****/
	$('.mobile-menu a').on('click', function(){
		$('.site-nav').slideToggle('slow');
	});

	$(window).resize(function(){
		if($(document).width() >= 768){
			$('.site-nav').show();
		} else {
			$('.site-nav').hide();
		}
	});

	/***** FOR RESIZING THE MAP ACCORDING TO WINDOW SIZE *****/
	if($('#map').length>0){
		if($(document).width() >= 768){
			displayMap(0);
		} else {
			displayMap(300);
		}
	}

	function displayMap(value){
		if(value == 0){
			var locationheight = $('.location-reservation').height();
			var locationWidth = $('.map').width();
			$('#map').css('height', locationheight);
			$('#map').css('width', locationWidth);
		} else {
			$('#map').css('height', value);
			$('#map').css('width', value);
		}
	}

	/***** FLUIDBOX FOR GALLERY ****/
	// $('.gallery a').each(function(){
	// 	$(this).attr({'data-fluidbox': ''});
	// });

	// if($('[data-fluidbox]').length > 0) {
	// 	$('[data-fluidbox]').fluidbox();
	// }
});
