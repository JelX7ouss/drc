# Rocket.Chat Livechat Module for Drupal 8.



### Overview:

_drockchat_ (stupid name :bowtie:) is a _Drupal 8 Module_ which offer you the ability to communicate with your website guests. This Module has been tested on a local server with the default _http_ port, if you install a local Rocket.Chat server, please use localhost:3000 url, better _check_ your protocol as well.
This Module is still under developement. I will gladly accpet any _contribution_ request for more code and quality enhancement, please read the [todo](https://github.com/JelX7ouss/drockchat#todo) section.

Before installing drockchat, **make sure** you've already got a [Rocket.Chat](https://github.com/RocketChat/Rocket.Chat) server correctly installed, with a working server address and port.

After installing your Rocket.Chat server, create an account _(you'll have the admin role by default)_ and don't forget to:

- _Enable Livechat_: go to `Administration > Livechat` or quickly type `your.rocket.server:port/admin/Livechat` and set `Livechat enabled` to true.
- _Grant Yourself The `livechat-agent` Role_: go to `Livechat > User Management` or quickly type `your.rocket.server:port/livechat-manager/users` you can read about `roles and permissions`. [here](https://github.com/RocketChat/Rocket.Chat/wiki/Roles-and-Permissions)

### Install:

- Clone the repo: `git clone git@github.com:JelX7ouss/drockchat.git`
- `mkdir your_drupal_site/modules/custom`
- `cp -vr drockchat your_drupal_site_folder/modules/custom`
- Clear cache (do it quickly using _drush_ within `your_drupal_site_folder` type `drush cr`) 
- Install the module: go to your Drupal site dashboard `Extend` and type `Rocket.Live` and hit install
- `drush cr`
- Go to `your.website.domain/admin/config/drockchat`
- Type your server address and the server port (_reminder: check your server address and port_)
- Clear cache (one more time)
- Visit `your.website.domain/drockchat` and a nice red widget will appear


You can now enjoy writing random messages, don't be lazy and go back to your Rocket.Chat server and reply!
You can logout from your Drupal site, and visit `your.website.domain/drockchat` again, and use it as a guest.



### TODO:

- _Custom Rocket.Chat slach command for the admin, to offer the ability to communicate with a **Raspberry Pi/Beaglebone** (will create another separate repo for this)._
- _More features for the configuration of the module._
