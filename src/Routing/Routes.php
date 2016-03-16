<?php
/**
 * @file
 * Contains \Drupal\drockchat\Routing\Routes.
 */

namespace Drupal\drockchat\Routing;
use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes.
 */
class Routes {

//  $path = \Drupal::config('drockchat.settings')->get('path');

  /**
   * {@inheritdoc}
   */
  public function routes() {

    // 'Test' path works!
    $routes = array();
    // Declares a single route under the name 'your_path.content'.
    // Returns an array of Route objects. 
    $routes['path.content'] = new Route(
      // Path to attach this route to:
      '/' . 'Test', // \Drupal::config('drockchat.settings')->get('path')
      // Route defaults:
      array(
        '_controller' => '\Drupal\drockchat\Controller\Rocket::createWidget'
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );

    return $routes;
  }

}
