<?php

namespace Drupal\rocket_chat\Routing;

use Symfony\Component\Routing\Route;

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
 * Contains \Drupal\rocket_chat\Routing\Routes.
 */

/**
 * Defines dynamic routes, instead of making static routes within .routing.yml.
 */
class Routes {
  /*
   *   public function routes() {
   */

    /**
     * {@inheritdoc}
     */
  public static function routes() {
    $routes = array();
    // Declares a single route under the name 'your_path.content'.
    // Returns an array of Route objects.
    $routes['path.content'] = new Route(
      // Path to attach this route to:
      '/' . \Drupal::config('rocket_chat.settings')->get('path'),
      // Route defaults:
      array(
        '_controller' => '\Drupal\rocket_chat\Controller\Rocket::createWidget',
      ),
      // Route requirements:
      array(
        '_permission'  => 'access content',
      )
    );

    return $routes;
  }

}
