=== Discuz Integration ===
Contributors: Alex
Author URI: http://the17th.net
Plugin URI: http://blog.the17th.net/2007/11/16/discuz-integration/
Tags: forum, discuz, database, user, login
Version: 0.2.1
Requires at least: 2.1
Tested up to: 2.6.1
Stable tag: 0.2.1

This plguin integrates username and password with Discuz! Board.

== Description ==

What does this plugin do:

1. On login, it looks for the username enter at Discuz! user database.
1. If it finds identical entry, it checks for password.
1. If both usernames and passwords are identical, it creates a new user with the excat data at wordpress database.
1. Wordpress will show preference panel.

Users do not see the internal processing. If data matches, it's simply a successful login.

This plugin only works with tables in the same MySql database at this time.

== Installation ==

1. Open 'discuz_integration.php' with text editor.
1. In '$dz\_prefix' and '$members_table' make apporipriate changes depend on your setup.
1. Upload 'plugin-name.php' to the '/wp-content/plugins/' directory.

Optional: Turn off user registration on Wordpress to avoid duplicate users.