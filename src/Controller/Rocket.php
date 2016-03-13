<?php

/**
 * @file
 * Contains \Drupal\drockchat\Controller\Rocket.
 *
 * The main controller of our module.
 */

namespace Drupal\drockchat\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\drockchat\WidgetHandler;


class Rocket extends ControllerBase {

  public function createWidget(){

  	$widget = new WidgetHandler('drockchat', 'drockchat_conf');
  	return $widget->renderWidgetWithJSKeys(['server', 'port']);

  }

}