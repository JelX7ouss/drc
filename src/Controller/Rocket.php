<?php

/**
 * @file
 * Contains \Drupal\drockchat\Controller\Rocket.
 *
 * The main controller of our module.
 */

namespace Drupal\drockchat\Controller;

use Drupal\Core\Controller\ControllerBase;


class Rocket extends ControllerBase {

  public function createWidget(){

      	$form['#attached']['library'][] = 'drockchat/drockchat_conf';

	    $form['#attached']['drupalSettings']
	    
	    ['drockchat']['drockchat_conf']['server'] = \Drupal::config('drockchat.settings')->get('server');

	    $form['#attached']['drupalSettings']
	    ['drockchat']['drockchat_conf']['port'] = \Drupal::config('drockchat.settings')->get('port');

	    return $form;

  }

}