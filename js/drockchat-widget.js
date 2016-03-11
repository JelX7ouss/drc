(function($){

	/**
	* note: port and url will be the submitted values of the configuration module form
	*/
	
	// Server params.
	var SERVER_MANAGER = {
		"url": "http://localhost",
		"port": "3000"
	};

	/**
	* The embed javascript livechat code.
	*/
	(function(w, d, s, f, u) {
		w[f] = w[f] || [];
		w[f].push(u);
		var h = d.getElementsByTagName(s)[0],
			j = d.createElement(s);
		j.async = true;
		j.src = SERVER_MANAGER["url"]
				+ ':' + SERVER_MANAGER["port"]
				+ '/packages/rocketchat_livechat/assets/rocket-livechat.js';
		h.parentNode.insertBefore(j, h);
	})(window, document, 'script', 'initRocket',
			 SERVER_MANAGER["url"]
			 + ':' +
			 SERVER_MANAGER["port"] +
			 '/livechat');


})(jQuery);
