<?php


/**
 * @file
 * Contains \Drupal\drockchat\FormManager.
 */

namespace Drupal\drockchat;


/**
* Check the form values.
*/

class FormManager {

	public static function isPort($port){
		return ($port > 0 && $port < 65536);
	}
	
	
	// This method check if user have typed the server:port
	// which have been pointed to on one the Config page
	public static function serverRun($url, $port){

		// user running on http, https, or local
		// thought of using an array of custom ports but
		// '===' and '||' operators are better to use
		if($port === 80 || $port === 443 || $port === 3000){

			if(!empty($url)){

				// remove headers to ping the server 
				// e.g. ping www.example.com without http(s)://
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
	}


	
}
