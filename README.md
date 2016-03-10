# Rocket.Chat Livechat Module for Drupal 8.



### Overview

drockchat is a Drupal 8 Module which offer you the ability to communicate with your website guests. This module has been tested on a local server with the default port, if you install a local Rocket.Chat server, please use localhost:3000 url.
This module is still under developement. I will gladly accpet any request for more code and quality enhancement, please read the [todo](https://github.com/JelX7ouss/drockchat#todo) section.

Before installing drockchat, MAKE SURE you've already got a [Rocket.Chat](https://github.com/RocketChat/Rocket.Chat) server correctly installed, with a working server address and port.

After installing your Rocket.Chat server, create an account (you'll have the admin role by default) and don't forget to:
- Enable Livechat: go to `Administration > Livechat` or quickly type `your.rocket.server:port/admin/Livechat` and set `Livechat enabled` to true
- Grant yourself the `livechat-agent` role: go to `Livechat > User Management` or quickly type `your.rocket.server:port/livechat-manager/users` you can read about `roles and permissions` [here](https://github.com/RocketChat/Rocket.Chat/wiki/Roles-and-Permissions)

### Installation

- Clone the repo: `git@github.com:JelX7ouss/drockchat.git`
- `cp drockchat your_drupal_site_folder/modules/custom`
- Install the module: go to your Drupal site dashboard `Extend` and type `Rocket.Live` and hit install
- clear cache (drupal side)
- go to `your.website.domain/admin/config/drockchat`
- type your server address and the server port
- clear cache (one more time)
- visit `your.website.domain/drockchat` and the widget will appear

Now you can enjoy writing random messages for yourself, don't be lazy and go back to your Rocket.Chat server and reply!
You can logout from your Drupal site, and visit `your.website.domain/drockchat` again, and use it as a guest.


### Todo

- Fix the custom server address and server port, in the config form, so that the Module work on the desired server, not the local.
- Add a custom Rocket.Chat slach command for the admin, to offer the ability to communicate with a Raspberry Pi/Beaglebone (will create another separate repo for this)
- Add more features for the configuration of the module, expect the server/port
