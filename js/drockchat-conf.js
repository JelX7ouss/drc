(function($){

	var FORM_CONFIG_VARS = {
		"server_conf": drupalSettings.drockchat.json.server,
		"port_conf": drupalSettings.drockchat.json.port
	};
	
	/**
	* Made for testing stuff
	* I wanted to make sure all values in drupalSettings Object are safe
	* Will cast them later to JSON and get data from the drockchat-widget.js file
	* However a Drupal way to do this is highly recommended
	*/

	console.log(FORM_CONFIG_VARS["server_conf"]);
	console.log(FORM_CONFIG_VARS["port_conf"]);
	


})(jQuery);
