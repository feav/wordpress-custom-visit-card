jQuery( document ).ready( ($) => {

	/**
	 * ZOOM MANAGEMENT
	 */

	(function(){

		let current_value = 1;
		const step = 0.5;
		const max_zoom = 4;
		const min_zoom = 1;

		$( '.zoom .less' ).click( (event)=>{
			event.preventDefault();
			if( current_value > min_zoom ) // min scale 1
				current_value -= step;
			$('.main-content .rendering .container ').css('zoom',`${current_value}`);
		} );

		$( '.zoom .more' ).click( (event)=>{
			event.preventDefault();
			if( current_value <= max_zoom ) // max scale 2
				current_value += step;
			 $('.main-content .rendering .container ').css('zoom',`${current_value}`);
		} );	
	})();
	


});