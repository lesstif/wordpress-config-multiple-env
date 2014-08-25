wordpress-config-multiple-env
=============================

This is a wp-config replacement for Wordpress on Multiple Environment.


### apache httpd setting
setting WP_ENV envrionment variable per Virtual Host

```apache
LoadModule env_module modules/mod_env.so

<VirtualHost *:80>
    ServerName dev-wordpress.example.com

    SetEnv WP_ENV devel
    
    DocumentRoot /var/www/dev-wordpress/
    ErrorLog logs/dev-wp-error_log
    CustomLog logs/dev-wp-access_log common
</VirtualHost>

<VirtualHost *:80>
    ServerName test-wordpress.example.com

    SetEnv WP_ENV test
    
    DocumentRoot /var/www/test-wordpress/
    ErrorLog logs/test-wp-error_log
    CustomLog logs/test-wp-access_log common
</VirtualHost>
```

### edit wp-config.${WP_ENV}.php

Edit custom wp-config.${WP_ENV}.php

- local : wp-config.local.php
- devel : wp-config.devel.php
- production : wp-config.production.php
