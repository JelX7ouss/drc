<?php

/**
 * @file
 * Contains \Drupal\drc\Controller\Rocket.
 *
 * The main controller of our module.
 */

namespace Drupal\drc\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\drc\WidgetHandler;


class Rocket extends ControllerBase {

  public function createWidget(){

  	$widget = new WidgetHandler('drc', 'drc_conf');
  	return $widget->renderWidgetWithJSKeys(['server', 'port']);

  }

}