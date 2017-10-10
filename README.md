*I [pushed](http://cgit.drupalcode.org/rocket_chat/) the module on [drupal.org](https://www.drupal.org/project/rocket_chat). Submit issues there. Feel free to contribute, collaborate and enhance.*
---------------------

This Module is the first Rocket.Chat Module for Drupal ever. I worked on version 8. After it gained a little of attention, I had to push it on Drupal.org and what happened is that now Rocket.Chat has a support version for Drupal 7, thanks to _Lawri_ as he is working on it seriously. I am one of the maintainers but I am not active in the Drupal community. Pushing it to Drupal.org will make the development always on. Please keep the good job!



# _Rocket.chat_ Module for Drupal 8.

CONTENTS OF THIS FILE
---------------------
   
 * Introduction
 * Requirements
 * Recommendations
 * Installation
 * Configuration
 * Troubleshooting
 * Maintainers

INTRODUCTION
------------

The Rocket.chat Module enables a drupal site to integrate Rocket.chat.  
it is currently in its ___ALPHA___ state.
The following Features of rocket chat are imiplemented. 

 * A page with the Livechat widget.
   This widget offer you the ability to communicate with
   your website 'guests'.


Requirements
------------

This module is designed for:
 - [Drupal 8.2.4+](https://www.drupal.org/project/drupal)
 - [Rocket.chat 0.48.1+](https://rocket.chat/)

It is tested with:
 - Drupal 8.2.4
 - Rocket.chat 0.48.1
 
It needs the following Rocket.chat modules enabled and configured.
 - Livechat

Recommendations
---------------

We strongly recommand you run your Drupal and your Rocket.chat behind a TLS/SSL proxy or webserver.
Currently it will only work when both the website and the webapp are in the same type of connection.
(so the drupal and rocket.chat are both reachable either over HTTP or HTTPS not one with HTTP and the other with HTTPS)

Furthermre we recommand you configure the Livechat to use Agents, and have some agents in the User mangement section of Livechat.

Installation
------------

- Install the module in your modules folder, then clear cache
- Submit installation on your website configuration, clear cache
- Switch to [web-site-url]/admin/config/rocket_chat and fill the config form,
  then clear cache (one more time)
- Visit [web-site-url]/[path-chosen] then the widget will appear 

Configuration
-------------

in the Configuration of the module (located under the 'Web services' in the configuration tab.)
 you set the address of the Rocket.chat server and the Patch on the drupal where the widget is enabled.
 
Troubleshooting
---------------
 
Leave a detailed report of your issue in the [issue queue](https://www.drupal.org/project/issues/search/2649818) and the maintainers will add it to the task list.
  
Maintainers
-----------
 
 - [Gabriel Engel](https://www.drupal.org/u/gabriel-engel) (Creator Rocket.chat)
 - [jelhouss](https://www.drupal.org/u/jelhouss) (Initial Module Creator)
 - [idevit](https://www.drupal.org/u/idevit) (Community Plumbing)
 - [sysosmaster](https://www.drupal.org/u/sysosmaster) (finalized first alpha release on d.o.)
