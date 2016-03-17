<?php
/**
 * @file
 * Contains \Drupal\drc\Routing\Routes.
 */

namespace Drupal\drc\Routing;
use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes, instead of making static routes within .routing.yml
 */
class Routes {

  /**
   * {@inheritdoc}
   */
  public function routes() {

    $routes = array();
    // Declares a single route under the name 'your_path.content'.
    // Returns an array of Route objects. 
    $routes['path.content'] = new Route(
      // Path to attach this route to:
      '/' . \Drupal::config('drc.settings')->get('path'),
      // Route defaults:
      array(
        '_controller' => '\Drupal\drc\Controller\Rocket::createWidget'
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );

    return $routes;
  }

}
