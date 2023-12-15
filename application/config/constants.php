<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



define( 'ASSETS', FATHER_BASE.'assets/' );
define( 'BANNER_PATH', FATHER_BASE.'files/banner/img/' );
define( 'CATEGORY_IMAGE_PATH', FATHER_BASE.'files/category/img/' );
define( 'PRODUCT_IMAGE_PATH', FATHER_BASE.'files/product/img/' );
define( 'VARIANT_IMG_PATH', FATHER_BASE.'files/variant/img/100/' );
define( 'PAGE_PATH', FATHER_BASE.'files/page/img/' );

define( 'CHANGE_LANG', FATHER_BASE.'welcome/change_lang/' );
define( 'PRODUCT_DETAIL', FATHER_BASE.'product/detail/' );
define( 'CATEGORY_DETAIL', FATHER_BASE.'kategori/' );
define( 'SEARCH_PRODUCT', FATHER_BASE.'product/search/' );

define( 'CART', FATHER_BASE.'cart/');
define( 'SHOW_CART', FATHER_BASE.'cart/show/');
define( 'ADD_TO_CART', FATHER_BASE.'cart/add/');
define( 'REMOVE_FROM_CART', FATHER_BASE.'cart/remove/');
define( 'EMPTY_CART', FATHER_BASE.'cart/empty/');
define( 'CHECKOUT', FATHER_BASE.'cart/checkout/');
define( 'ORDER_SAVE_POST', FATHER_BASE.'cart/order_save_post/');
define( 'PAYMENT_PAGE', FATHER_BASE.'cart/payment/');
define( 'PAYMENT_CALLBACK', FATHER_BASE.'cart/payment_callback/');



define( 'USER_ACCOUNT', FATHER_BASE.'user/account/');
define( 'LOGIN', FATHER_BASE.'user/login/');
define( 'LOGOUT', FATHER_BASE.'user/logout/');
define( 'LOGIN_POST', FATHER_BASE.'user/login_post/');
define( 'SIGNUP', FATHER_BASE.'user/signup/');
define( 'SIGNUP_POST', FATHER_BASE.'user/signup_post/');
define( 'UPDATE_ACCOUNT_POST', FATHER_BASE.'user/update_account_post/');
define( 'ORDER_DETAILS', FATHER_BASE.'user/order_details/');

define( 'PAGE_DETAIL', FATHER_BASE.'page/index/');
define( 'CONTACT_PAGE', FATHER_BASE.'page/contact/');
define( 'SUPPORT_PAGE', FATHER_BASE.'page/support/');







