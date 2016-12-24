<?php

/*

This file is part of (rocket_chat) a Drupal 8 Module for Rocket.Chat 
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

/**
 * @file
 * Contains \Drupal\rocket_chat\FormManager.
 */

namespace Drupal\rocket_chat;


/**
* Check the form values.
*/

class FormManager {

	public static function isPort($port){
		return ($port > 0 && $port < 65536);
	}

	public static function serverRun($url, $port){
		if($port === 80 || $port === 443 || $port === 3000){
			if(strpos($url, 'http://') !== FALSE) 
				$url = str_replace('http://', '', $url);
			else if (strpos($url, 'https://') !== FALSE) 
				$url = str_replace('https://', '', $url);
				
			// server test
			if($ping = @fsockopen($url, $port, $errCode, $errStr, 1)){
				fclose($ping);
				return true;	
			} else {
				return false;
			}
		}
	}

	public static function isLowerCaseLetters($value){
		return ctype_lower($value);	
	}	
	
}
