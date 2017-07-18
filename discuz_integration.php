<?php
/*
Plugin Name: Discuz Integration
Plugin URI:  http://blog.the17th.net/2007/11/16/discuz-integration/
Description:  User integration with Discuz.
Author:  Alex
Version: 0.2.1
Author URI:  http://the17th.net
*/
require_once( ABSPATH . WPINC . '/registration.php');

$dz_prefix = 'uc_';
$members_table = $dz_prefix . "members";

        function add_user_from_discuz()
        {
			global $members_table;

			if ( validate_username( $_POST['log'] ) && !username_exists( $_POST['log'] ) )
			{
					$sql = 'SELECT `username`, `password`, `email`, `salt`
									   FROM `' . $members_table . '`
									   WHERE `username` = \'' . $_POST['log'] . '\'
									   LIMIT 1';
					$result = mysql_query($sql);

					while($row = mysql_fetch_array($result)){
						if (md5(md5($_POST['pwd']).$row['salt']) == $row['password'])
						{
							$username = $_POST['log'];
							$password = $_POST['pwd'];
							$email = $row['email'];
							wp_create_user($username, $password, $email);
							return true;
						}
					}
			}
			return false;
        }

        function loose_sanitize($username, $strict = false)
        {
			return $strict;
        }


add_action('wp_authenticate', 'add_user_from_discuz');

/* uncomment to add support to non-ASCII characters in usernames. */
// add_filter('sanitize_user', 'loose_sanitize', 1, 2);

?>