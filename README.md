# WordPress trojan scripts

Repository to host simple list of scripts to trojanize WordPress themes.

In some cases Apache allows you to directy access PHP files in themes, in these
cases you can just directy access the script through the
/wp-content/themes/theme-directory/script.php URL.

To disable the execution of php files accessed directly, put a `.htaccess` file with the following instructions:

```.htaccess
<Files ~ ".ph(?:p[345]?|t|tml)$">
	deny from all
</Files>
```

The above code will stop any execution of PHP, PHP3, PHP4, PHP5, PHT and PHTML files that are being directly accessed through their absolut paths.

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

## Sources

* [How to Protect the wp-content Folder of Your WordPress Website](https://hostadvice.com/how-to/how-to-protect-the-wp-content-folder-of-your-wordpress-website/)