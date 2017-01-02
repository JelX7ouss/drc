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
 * Contains \Drupal\rocket_chat\FormManager.
 */
use Drupal\Component\Utility\UrlHelper;
use Drupal\rocket_chat\Form\LiveChatForm;

/**
 * Check the form values.
 */
class FormManager {

  /* *
   * Check if given value is a port value.
   *
   * @param int $port
   *    Port to check.
   *
   * @return bool
   *    True if in range false if not.
   *
   *    TODO check for integer.
   */
//  public static function isPort($port) {
//    return ($port > 0 && $port < 65536);
//  }

    /**
     * Helper function to split an URL into its base components including the underlying stream handlers.
     *
     * @param string $url Url to parse
     *
     * @return array Url in its seperated Parts.
     *
     * @throws \HttpUrlException when scheme is missing.
     */
   public static function parseUrl($url){
       $ret = parse_url($url);
       if(!isset($ret['scheme'])){
//           $ret['scheme'] = 'http';
           throw new \HttpUrlException("Missing Scheme.",404);
       }
       if(!isset($ret['host'])){
           $ret['hosts'] = 'localhost';
       }
       if(!isset($ret['path'])){
           $ret['path'] = "";
       }
       if(!isset($ret['port'])){
           switch($ret['scheme']) {
               case "http":
                   $ret['port'] = 80;
                   break;
               case "https":
                   $ret['port'] = 443;
                   break;
           }
       }
       $ret['baseUrl'] = $ret['host'].$ret['path'];
       switch($ret['scheme']) {
           default:
               $ret['url'] = "tcp://".$ret['baseUrl'];
               break;
           case "https":
               $ret['url'] = "tls://".$ret['baseUrl'];
               break;
       }
       return $ret;
   }


  /**
   * ServerRun.
   *
   * @param string $url
   *    Url to use.
   *
   * @return bool
   *    Connection Worked?
   */
  public static function serverRun($url) {
      $urlSplit = FormManager::parseUrl($url);

      // Server test.
      //$supportedStreams = stream_get_transports();

      if ($ping = fsockopen($urlSplit['url'], $urlSplit['port'], $errCode, $errStr, 1)) {
        fclose($ping);
        return TRUE;
      }
      else {
        return FALSE;
      }
      //TODO IMplement Exception!
  }

  /**
   * Check for lowercase.
   *
   * @param string $value
   *    Value to check.
   *
   * @return bool
   *    Result.
   */
  public static function isLowerCaseLetters($value) {
    return ctype_lower($value);
  }

}
