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
 * Contains \Drupal\rocket_chat\WidgetHandler.
 */

namespace Drupal\rocket_chat;


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
    | rocket_chat.libraries.yml has rocket_chat_conf which has the app.js file
    | output: rocket_chat/rocket_chat_conf
    */
  	private function setAssets(){
  		$this->form['#attached']['library'][] = 
  		$this->getWidgetLibraryName() . '/' . $this->getWidgetLibraryRoute();
  	}

  	private function setJavascriptParams($key = NULL){
		
  		if(!empty($key) && !is_null($key)){
  				switch ($key) {
  					case 'server':
  							$this->buildJSArray('server', \Drupal::config('rocket_chat.settings')->get('server'));
  						break;
  					
  					case 'port':
  							$this->buildJSArray('port', \Drupal::config('rocket_chat.settings')->get('port'));
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