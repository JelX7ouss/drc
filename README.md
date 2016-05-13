# Rocket.Chat Livechat Module for Drupal 8.

### Overview:

drc is a Drupal 8 Module which offer you the ability to communicate with your website guests.
This Module has been tested on a local server with the default http protocol and default 3000 port and still under developement.

You could just bring the embed javascript code and install a livechat widget in your Drupal website with less time than having a module. Why all this? Because installing a widget that way is simple, no features, nothing, just the already built-in widget with normal behaviour, what if you want to use some features with the widget? That's what the module for. 
Please request for more code and quality enhancement, read the [todo](https://github.com/JelX7ouss/drc#todo) section.

Before installing drc, make sure you've already got a [Rocket.Chat](https://github.com/RocketChat/Rocket.Chat) server correctly installed, with a working server address and port.

. Enable "Livechat" in your Rocket.Chat server.
. Enable the "livechat-agent" Role by switching to "Livechat > User Management".

### Install:

. Switch to your "/modules" folder in your drupal root files and "mkdir custom" folder <br />
. git clone git@github.com:JelX7ouss/drc.git <br />
. Clear your drupal cache with "drush cr" <br />
. In your site-management bar, hit "Extend", install "drc" <br />
. switch to [web-site-url]/admin/config/drc <br />
. Fill the config form <br />
. Clear your drupal cache one more time <br />
. Visit [web-site-url]/[path-chosen] and a nice widget will appear

### TODO:

. Custom Rocket.Chat slach-command, to offer the ability to connect to a _Raspberry Pi/Beaglebone_ <br />
. More features to enhance the Widget Design and Theming, Drupal Authentication with Rocket.Chat, [add-more]
