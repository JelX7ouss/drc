<?php

/**
 * @file
 * Contains \Drupal\drockchat\Controller\Rocket.
 */

namespace Drupal\drockchat\Controller;

use Drupal\Core\Controller\ControllerBase;


class Rocket extends ControllerBase {

  public function createWidget(){

      return array(
        '#attached' => array(
            'library' => array(
            'drockchat/drockchat'
            )
        )
      );

  }

}