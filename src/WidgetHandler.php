<?php


/**
 * @file
 * Contains \Drupal\drockchat\WidgetHandler.
 */

namespace Drupal\drockchat;


/**
* Provides handling to render the livechat widget.
*/

class WidgetHandler {

	private  $widgetLibraryName,
			     $widgetLibraryRoute,
			     $form;

	public function __construct($widgetLibraryName = NULL, $widgetLibraryRoute = NULL) {

		if(!empty($widgetLibraryName) && !is_null($widgetLibraryName)){
			if(!empty($widgetLibraryRoute) && !is_null($widgetLibraryRoute)){
					$this->widgetLibraryName = $widgetLibraryName;
				    $this->widgetLibraryRoute = $widgetLibraryRoute;
				    $this->form = [];					
			}
		}

  	}

  	public function renderWidgetWithJSKeys(array $keys = NULL){

  		if(!empty($keys)){

  			$this->setAssets();

  			foreach ($keys as $value) {
  				$this->setJavascriptParams($value);
  			}
 	 		return $this->WidgetParams();
  		}

  	}


  /**
	* Class setters and getters.
  */

  	public function setWidgetLibraryRoute($LRoute = NULL){
  		$this->widgetLibraryRoute = $LRoute;
  	}

  	public function setWidgetLibraryName($LName = NULL){
  		$this->widgetLibraryName = $LName;
  	}

  	public function getWidgetLibraryRoute(){
  		return $this->widgetLibraryRoute;
  	}

  	public function getWidgetLibraryName(){
  		return $this->widgetLibraryName;
  	}

  	// return $form array
  	public function WidgetParams(){
  		return $this->form;
  	}

  	// set the JS file we're going to use
  	// if you want to use foo.js
  	// declare a route in name.libraries.yml
  	// and set foo.js in js key
  	private function setAssets(){
  		$this->form['#attached']['library'][] = 
  		$this->getWidgetLibraryName() . '/' . $this->getWidgetLibraryRoute();
  	}

  	private function setJavascriptParams($key = NULL){
		
		// MUST know your keys before setting them
		// SEE file.settings.yml
		// IMPORTANT: Add every key in your file.settings.yml here
		// I know it's a shitty design pattern, sorry
		if(!empty($key) && !is_null($key)){
				switch ($key) {
					case 'server':
							$this->buildJSArray('server', \Drupal::config('drockchat.settings')->get('server'));
						break;
					
					case 'port':
							$this->buildJSArray('port', \Drupal::config('drockchat.settings')->get('port'));
						break;
				}
		}

  	}

  	// The values to send to the Javascript file declared in your library's route
  	// drupalSettings is a javascript global object declared by the Drupal API 
  	// to use values within your js file, use
  	// e.g. drupalSettings.library.route.key
  	private function buildJSArray($key, $value){
  		$this->form['#attached']['drupalSettings']
  		[$this->getWidgetLibraryName()][$this->getWidgetLibraryRoute()]
  		[$key] = $value; 		
  	}

}