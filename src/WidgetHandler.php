<?php


/**
 * @file
 * Contains \Drupal\drc\WidgetHandler.
 */

namespace Drupal\drc;


/**
* Provides handling to render the livechat widget.
*/

class WidgetHandler {

  private  $widgetLibraryName, $widgetLibraryRoute, $form;


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

    /*
    | get the .js file by getting the route
    | and it's library route
    | drc.libraries.yml has drc_conf which has the app.js file
    | output: drc/drc_conf
    */
  	private function setAssets(){
  		$this->form['#attached']['library'][] = 
  		$this->getWidgetLibraryName() . '/' . $this->getWidgetLibraryRoute();
  	}

  	private function setJavascriptParams($key = NULL){
		
  		if(!empty($key) && !is_null($key)){
  				switch ($key) {
  					case 'server':
  							$this->buildJSArray('server', \Drupal::config('drc.settings')->get('server'));
  						break;
  					
  					case 'port':
  							$this->buildJSArray('port', \Drupal::config('drc.settings')->get('port'));
  						break;
  				}
  		}

  	}

    /*
    | The values to send to the Javascript file declared in your library's route
    | drupalSettings is a javascript global object declared by the Drupal API
    | to get values within your js file, use
    | e.g. drupalSettings.library.route.key
    */
  	private function buildJSArray($key, $value){
  		$this->form['#attached']['drupalSettings']
  		[$this->getWidgetLibraryName()][$this->getWidgetLibraryRoute()]
  		[$key] = $value; 		
  	}

}