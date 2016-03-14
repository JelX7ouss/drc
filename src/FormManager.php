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


	// I think there is a PORT problem
	public static function serverRun($url/*, $port*/){

		// make sure the port is either 'http' or 'https'
		// if($port == 80 || $port == 8080 || $port == 443){

			if(!empty($url)){

				// remove headers to ping the server
				if(strpos($url, 'http://') !== FALSE) 
					$url = str_replace('http://', '', $url);
				else if (strpos($url, 'https://') !== FALSE) 
					$url = str_replace('https://', '', $url);
				
				// server test
				if($ping = @fsockopen($url, 3000, $errCode, $errStr, 1)){
					fclose($ping);
					return true;	
				} else {
					return false;
				}	

			}

		// }
	}


	
}