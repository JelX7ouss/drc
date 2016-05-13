<?php


/**
 * @file
 * Contains \Drupal\drc\FormManager.
 */

namespace Drupal\drc;


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
