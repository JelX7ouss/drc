<?php

namespace Drupal\rocket_chat;

/**
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

/**
 * @file
 * Contains \Drupal\rocket_chat\WidgetHandler.
 *
 * Provides handling to render the livechat widget.
 */
class WidgetHandler {

  /**
   * WidgetLibraryName.
   *
   * @var mixed|string
   */
  private $widgetLibraryName;

  /**
   * WidgetLibraryRoute.
   *
   * @var mixed|string
   */
  private $widgetLibraryRoute;

  /**
   * Form.
   *
   * @var array
   */
  private $form;

  /**
   * WidgetHandler constructor.
   *
   * @param string|mixed $widgetLibraryName
   *   Library Name.
   * @param string|mixed $widgetLibraryRoute
   *   Library Route.
   */
  public function __construct($widgetLibraryName, $widgetLibraryRoute) {
    if (!empty($widgetLibraryName) && !is_null($widgetLibraryName)) {
      if (!empty($widgetLibraryRoute) && !is_null($widgetLibraryRoute)) {
        $this->widgetLibraryName = $widgetLibraryName;
        $this->widgetLibraryRoute = $widgetLibraryRoute;
        $this->form = [];
      }
    }
  }

  /**
   * Render Widget.
   *
   * @param array|null $keys
   *   Array to render.
   *
   * @return array
   *   Rendered Widget.
   */
  public function renderWidgetWithJavaScriptKeys(array $keys) {
    if (!empty($keys)) {
      $this->setAssets();
      foreach ($keys as $value) {
        $this->setJavascriptParams($value);
      }
      return $this->widgetParams();
    }
  }

  /**
   * Setter for widgetLibraryRoute.
   *
   * @param mixed|string $widgetLibraryRoute
   *   Widget library route.
   */
  public function setWidgetLibraryRoute($widgetLibraryRoute) {
    $this->widgetLibraryRoute = $widgetLibraryRoute;
  }

  /**
   * Setter for widgetLibraryName.
   *
   * @param mixed|string $widgetLibraryName
   *    Widget library name.
   */
  public function setWidgetLibraryName($widgetLibraryName) {
    $this->widgetLibraryName = $widgetLibraryName;
  }

  /**
   * Get widgetLibraryRoute.
   *
   * @return mixed|string
   *   widgetLibraryRoute.
   */
  public function getWidgetLibraryRoute() {
    return $this->widgetLibraryRoute;
  }

  /**
   * Get widgetLibraryName.
   *
   * @return mixed|string
   *   widgetLibraryName.
   */
  public function getWidgetLibraryName() {
    return $this->widgetLibraryName;
  }

  /**
   * Get widgetParams.
   *
   * @return array
   *   Form Array
   */
  public function widgetParams() {
    return $this->form;
  }

  /*
   * get the .js file by getting the route
   * and it's library route
   * rocket_chat.libraries.yml has rocket_chat_conf which has the app.js file
   * output: rocket_chat/rocket_chat_conf
   */

  /**
   * Extract the intended javascript based on the route and the Library route.
   */
  private function setAssets() {
    $this->form['#attached']['library'][] =
      $this->getWidgetLibraryName() . '/' . $this->getWidgetLibraryRoute();
  }

  /**
   * Setter Javascript Parameters.
   *
   * @param string $key
   *   String representing the key.
   *
   *   TODO Reimplement this!
   */
  private function setJavascriptParams($key) {
    if (!empty($key) && !is_null($key)) {
      switch ($key) {
        case 'server':
          $this->buildJavaScriptArray('server', \Drupal::config('rocket_chat.settings')->get('server'));
          break;

        case 'port':
          $this->buildJavaScriptArray('port', \Drupal::config('rocket_chat.settings')->get('port'));
          break;

      }
    }
  }

  /**
   * Build Javascript Settings Array.
   *
   * The values to send to the Javascript file declared in your library's route
   * drupalSettings is a javascript global object declared by the Drupal API
   * to get values within your js file, use
   * e.g. drupalSettings.library.route.key.
   *
   * @param string $key
   *    Key to set the value in.
   * @param mixed $value
   *    Value to set in the key register.
   */
  private function buildJavaScriptArray($key, $value) {
    $ds = $this->form['#attached']['drupalSettings'][$this->getWidgetLibraryName()][$this->getWidgetLibraryRoute()][$key] = $value;
//    $ws != $ds;
      return $ds;
  }

}
