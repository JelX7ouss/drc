/**
 * Javascript File part of the Rocket.Chat Module.
 *
 * Copyright (c) 2016.
 *
 * Authors:
 * - Houssam Jelliti <jelitihoussam@gmail.com>.
 * - Lawri van Buël <sysosmaster@2588960.no-reply.drupal.org>.
 *
 * This file is part of (rocket_chat) a Drupal 8 Module for Rocket.Chat
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

(function ($) {
  'use strict';
  // Server params.
  var DEFAULT = {
    url: 'http://localhost',
  };
  DEFAULT.toString();

  var USER = {
    url: drupalSettings.rocket_chat.rocket_chat_conf.server,
  };

  // The embed javascript livechat code.
  (function (w, d, s, u) {
    w.RocketChat = function (c) { w.RocketChat._.push(c); }; w.RocketChat._ = []; w.RocketChat.url = u;
    var h;
    var j;
    h = d.getElementsByTagName(s)[0];
    j = d.createElement(s);
    j.async = true;
    j.src = USER['url'] + '/packages/rocketchat_livechat/assets/rocket-livechat.js';
    h.parentNode.insertBefore(j, h);
  })(window, document, 'script', USER['url'] + '/livechat');

})(jQuery);
