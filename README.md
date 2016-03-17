# Rocket.Chat Livechat Module for Drupal 8.



### Overview:

**_drc_** :bowtie: is a _Drupal 8 Module_ which offer you the ability to communicate with your website guests.

> I could just bring the embed javascript code and install a livechat widget in my Drupal website with less time than building a module. Why all this?

Because installing a widget that way is simple, no features, nothing, just the already built-in widget with normal behaviour, what if you want to use some features with the widget? That's what the module for, I will gladly accpet any _contribution_ request for more code and quality enhancement, please read the [todo](https://github.com/JelX7ouss/drc#todo) section, please open a feature issue If you think something cool can be done.

This Module has been tested on a local server with the default _http_ protocol and default 3000 port `localhost:3000`
This Module is still under developement.

Before installing drc, **make sure** you've already got a [Rocket.Chat](https://github.com/RocketChat/Rocket.Chat) server correctly installed, with a working server address and port.

After installing your Rocket.Chat server, create an account _(you'll have the admin role by default)_ and don't forget to:

- _Enable Livechat_: go to `Administration > Livechat` or quickly type `your.rocket.server:port/admin/Livechat` and set `Livechat enabled` to true.
- _Grant Yourself The `livechat-agent` Role_: go to `Livechat > User Management` or quickly type `your.rocket.server:port/livechat-manager/users` you can read about `roles and permissions`. [here](https://github.com/RocketChat/Rocket.Chat/wiki/Roles-and-Permissions)

### Install:

- Clone the repo: `git clone git@github.com:JelX7ouss/drc.git`
- `mkdir your_drupal_site/modules/custom`
- `cp -vr drc your_drupal_site_folder/modules/custom`
- Clear cache (do it quickly using _drush_ within `your_drupal_site_folder` type `drush cr`) 
- Install the module: go to your Drupal site dashboard `Extend` and type `Rocket.Live` and hit install
- `drush cr`
- Go to `your.website.domain/admin/config/drc`
- Fill the Configuration Form (_reminder: check your server address and port_)
- Clear cache (one more time)
- Visit `your.website.domain/your_path` and a nice widget will appear


You can now enjoy writing random messages, don't be lazy and go back to your Rocket.Chat server and reply!
You can logout from your Drupal site, and visit `your.website.domain/your_path` again, and use it as a guest.



### TODO:

- _Custom Rocket.Chat slach command for the admin, to offer the ability to communicate with a **Raspberry Pi/Beaglebone** (will create another separate repo for this)._
- _More features for the configuration of the module such as: Widget Design, Drupal Authentication with Rocket.Chat, Notification for livechat-agent availability, etc._
