(function($){
	
	// Server params.
	var DEFAULT = {
		"url": "http://localhost",
		"port": "3000"
	};

	var USER = {
 		"url": drupalSettings.rocket_chat.rocket_chat_conf.server,
 		"port": drupalSettings.rocket_chat.rocket_chat_conf.port
 	};

	
	// The embed javascript livechat code.
	(function(w, d, s, u) {
		w.RocketChat = function(c) { w.RocketChat._.push(c) }; w.RocketChat._ = []; w.RocketChat.url = u;
		var h = d.getElementsByTagName(s)[0], j = d.createElement(s);
		j.async = true;
		j.src = USER["url"]
				+ ':'
				+ USER["port"]
				+ '/packages/rocketchat_livechat/assets/rocket-livechat.js';
		h.parentNode.insertBefore(j, h);
	})(window, document, 'script', 'initRocket',
			 USER["url"]
			 + ':' +
			 USER["port"] +
			 '/livechat');

})(jQuery);
