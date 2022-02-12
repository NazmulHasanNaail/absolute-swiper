(function() {

var sliderSelector = '.swiper';


var nSlider = document.querySelectorAll(sliderSelector);

  [].forEach.call(nSlider, function( slider, index, arr ) {

	    dataOptions	= {},
		general		= slider.getAttribute('data-general'),
		autoplay	= slider.getAttribute('data-autoplay'),
		pagination 	= slider.getAttribute('data-pagination'),
		navigation 	= slider.getAttribute('data-navigation'),
		breakpoints	= slider.getAttribute('data-breakpoints');
	
		if(general){
			dataOptions= JSON.parse(general);
		}

 		if(autoplay){
			dataOptions.autoplay = JSON.parse(autoplay);
 		}
		 
		if(pagination){
			dataOptions.pagination = JSON.parse(pagination);
		}

		if(navigation){
			dataOptions.navigation = JSON.parse(navigation);
		}

		if(breakpoints){
			dataOptions.breakpoints = JSON.parse(breakpoints);
		}

		slider.options = Object.assign({},  dataOptions);
		
		const AbsoluteSwiper = new Swiper(slider, slider.options);

		slider.removeAttribute('data-general'), 
		slider.removeAttribute('data-autoplay'),
		slider.removeAttribute('data-pagination'),
		slider.removeAttribute('data-navigation'),
		slider.removeAttribute('data-breakpoints');
  });

})();



  
