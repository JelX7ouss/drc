# Rocket.Chat Livechat Module for Drupal 8.



### Overview

drockchat (_stupid name_ :bowtie:) is a Drupal 8 Module which offer you the ability to communicate with your website guests. This module has been tested on a local server with the default port, if you install a local Rocket.Chat server, please use localhost:3000 url.
This module is still under developement. I will gladly accpet any request for more code and quality enhancement, please read the [todo](https://github.com/JelX7ouss/drockchat#todo) section.

Before installing drockchat, **make sure** you've already got a [Rocket.Chat](https://github.com/RocketChat/Rocket.Chat) server correctly installed, with a working server address and port.

After installing your Rocket.Chat server, create an account (you'll have the admin role by default) and don't forget to:
- Enable Livechat: go to `Administration > Livechat` or quickly type `your.rocket.server:port/admin/Livechat` and set `Livechat enabled` to true
- Grant yourself the `livechat-agent` role: go to `Livechat > User Management` or quickly type `your.rocket.server:port/livechat-manager/users` you can read about `roles and permissions` [here](https://github.com/RocketChat/Rocket.Chat/wiki/Roles-and-Permissions)

### Installation

- [x] Clone the repo: `git clone git@github.com:JelX7ouss/drockchat.git`
- [x] `cp -vr drockchat your_drupal_site_folder/modules/custom`
- [x] clear cache (drupal side)
- [x] Install the module: go to your Drupal site dashboard `Extend` and type `Rocket.Live` and hit install
- [x] clear cache (drupal side)
- [x] go to `your.website.domain/admin/config/drockchat`
- [ ] type your server address and the server port _(works only on the default Rocket.Chat server localhost:3000. Will fix this soon)_ :blush:
- [ ] clear cache (one more time)
- [x] visit `your.website.domain/drockchat` and a nice red widget will appear

You can now enjoy writing random messages, don't be lazy and go back to your Rocket.Chat server and reply!
You can logout from your Drupal site, and visit `your.website.domain/drockchat` again, and use it as a guest.


### TODO - will merge any new features

- Make the widget work on all the pages of your website
- Custom server/port configuration support, so that the Module work on the custom user server, not the local.
- Custom Rocket.Chat slach command for the admin, to offer the ability to communicate with a **Raspberry Pi/Beaglebone** (will create another separate repo for this)
- More features for the configuration of the module, rather than the server/port
