/*

This file is part of (drc) a Drupal 8 Module for Rocket.Chat 
Copyright (C) 2015  Houssam Jelliti <jelitihoussam@gmail.com>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

(function($){
	
	// Server params.
	var DEFAULT = {
		"url": "http://localhost",
		"port": "3000"
	};

	var USER = {
 		"url": drupalSettings.drc.drc_conf.server,
 		"port": drupalSettings.drc.drc_conf.port
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
