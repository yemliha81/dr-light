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

/*LOGIN URLS*/
define( 'LOGIN', FATHER_BASE.'login/index/' );
define( 'LOGIN_POST', FATHER_BASE.'login/login_post/' );
define( 'LOGOUT', FATHER_BASE.'login/logout/' );
/*LOGIN URLS*/

/* PRODUCT URLS */
define( 'PRODUCT_LIST', FATHER_BASE.'product/product_list/' );
define( 'ADD_PRODUCT', FATHER_BASE.'product/add_product/' );
define( 'ADD_PRODUCT_POST', FATHER_BASE.'product/add_product_post/' );
define( 'UPDATE_PRODUCT', FATHER_BASE.'product/update_product/' );
define( 'UPDATE_PRODUCT_POST', FATHER_BASE.'product/update_product_post/' );
define( 'UPDATE_GOVDE_IMAGE_POST', FATHER_BASE.'product/update_govde_image_post/' );
define( 'DELETE_PRODUCT', FATHER_BASE.'product/delete_product/' );
define( 'SEARCH_PRODUCT', FATHER_BASE.'product/search/' );

/* PRODUCT URLS */

/* CATEGORY URLS */
define( 'CATEGORY_LIST', FATHER_BASE.'category/category_list/' );
define( 'ADD_CATEGORY', FATHER_BASE.'category/add_category/' );
define( 'ADD_CATEGORY_POST', FATHER_BASE.'category/add_category_post/' );
define( 'UPDATE_CATEGORY', FATHER_BASE.'category/update_category/' );
define( 'UPDATE_CATEGORY_POST', FATHER_BASE.'category/update_category_post/' );
define( 'DELETE_CATEGORY', FATHER_BASE.'category/delete_category/' );
/* CATEGORY URLS */

/* BANNER URLS */
define( 'BANNER_LIST', FATHER_BASE.'banner/banner_list/' );
define( 'ADD_BANNER', FATHER_BASE.'banner/add_banner/' );
define( 'ADD_BANNER_POST', FATHER_BASE.'banner/add_banner_post/' );
define( 'UPDATE_BANNER', FATHER_BASE.'banner/update_banner/' );
define( 'UPDATE_BANNER_POST', FATHER_BASE.'banner/update_banner_post/' );
define( 'DELETE_BANNER', FATHER_BASE.'banner/delete_banner/' );
/* BANNER URLS */

/* PAGE URLS */
define( 'PAGE_LIST', FATHER_BASE.'page/page_list/' );
define( 'ADD_PAGE', FATHER_BASE.'page/add_page/' );
define( 'ADD_PAGE_POST', FATHER_BASE.'page/add_page_post/' );
define( 'UPDATE_PAGE', FATHER_BASE.'page/update_page/' );
define( 'UPDATE_PAGE_POST', FATHER_BASE.'page/update_page_post/' );
define( 'DELETE_PAGE', FATHER_BASE.'page/delete_page/' );
/* PAGE URLS */

/* VARIANT URLS */
define( 'VARIANT_LIST', FATHER_BASE.'variant/variant_list/' );
define( 'ADD_VARIANT', FATHER_BASE.'variant/add_variant/' );
define( 'ADD_VARIANT_POST', FATHER_BASE.'variant/add_variant_post/' );
define( 'UPDATE_VARIANT', FATHER_BASE.'variant/update_variant/' );
define( 'UPDATE_VARIANT_POST', FATHER_BASE.'variant/update_variant_post/' );
define( 'DELETE_VARIANT', FATHER_BASE.'variant/delete_variant/' );
/* VARIANT URLS */

/* VARIANT URLS */
define( 'GOVDE_LIST', FATHER_BASE.'govde_rengi/variant_list/' );
define( 'ADD_GOVDE', FATHER_BASE.'govde_rengi/add_variant/' );
define( 'ADD_GOVDE_POST', FATHER_BASE.'govde_rengi/add_variant_post/' );
define( 'UPDATE_GOVDE', FATHER_BASE.'govde_rengi/update_variant/' );
define( 'UPDATE_GOVDE_POST', FATHER_BASE.'govde_rengi/update_variant_post/' );
define( 'DELETE_GOVDE', FATHER_BASE.'govde_rengi/delete_variant/' );
/* VARIANT URLS */

/* VARIANT URLS */
define( 'CAM_RENGI_LIST', FATHER_BASE.'cam_rengi/variant_list/' );
define( 'ADD_CAM_RENGI', FATHER_BASE.'cam_rengi/add_variant/' );
define( 'ADD_CAM_RENGI_POST', FATHER_BASE.'cam_rengi/add_variant_post/' );
define( 'UPDATE_CAM_RENGI', FATHER_BASE.'cam_rengi/update_variant/' );
define( 'UPDATE_CAM_RENGI_POST', FATHER_BASE.'cam_rengi/update_variant_post/' );
define( 'DELETE_CAM_RENGI', FATHER_BASE.'cam_rengi/delete_variant/' );
/* VARIANT URLS */

/*ORDER URLS*/
define( 'ORDER_LIST', FATHER_BASE.'order/order_list/' );
define( 'ORDER_DETAIL', FATHER_BASE.'order/order_detail/' );
define( 'ORDER_UPDATE_POST', FATHER_BASE.'order/order_update_post/' );
/*ORDER URLS*/

/*CAMPAIGN URLS*/
define( 'NEW_CAMPAIGN', FATHER_BASE.'campaign/new_campaign/' );
define( 'NEW_CAMPAIGN_POST', FATHER_BASE.'campaign/new_campaign_post/' );
/*CAMPAIGN URLS*/




