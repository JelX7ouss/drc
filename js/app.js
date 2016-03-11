(function($){
	
	// Server params.
	var DEFAULT = {
		"url": "http://localhost",
		"port": "3000"
	};

	var USER = {
 		"url": drupalSettings.drockchat.drockchat_conf.server,
 		"port": drupalSettings.drockchat.drockchat_conf.port
 	};

 	console.log("USER: " + USER["url"] + ":" + USER["port"]);

	
	// The embed javascript livechat code.
	(function(w, d, s, f, u) {
		w[f] = w[f] || [];
		w[f].push(u);
		var h = d.getElementsByTagName(s)[0],
			j = d.createElement(s);
		j.async = true;
		j.src = USER["url"]
				+ ':' + USER["port"]
				+ '/packages/rocketchat_livechat/assets/rocket-livechat.js';
		h.parentNode.insertBefore(j, h);
	})(window, document, 'script', 'initRocket',
			 USER["url"]
			 + ':' +
			 USER["port"] +
			 '/livechat');


})(jQuery);
