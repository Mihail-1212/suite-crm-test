<?php

if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}

ini_set('display_errors',0);
error_reporting(0);

define('ENTRY_POINT_TYPE', 'api');

set_include_path(dirname(__DIR__) . DIRECTORY_SEPARATOR);
chdir(dirname(__DIR__) . DIRECTORY_SEPARATOR);

require_once('include/entryPoint.php');

$sapi_type = php_sapi_name();

if (empty($current_language)) {
    $current_language = $sugar_config['default_language'];
}

$app_list_strings = return_app_list_strings_language($current_language);
$app_strings = return_application_language($current_language);

global $current_user;
$current_user = new User();
$current_user->getSystemUser();

if (substr($sapi_type, 0, 3) != 'cli') {
    sugar_die("quickRepair.php is CLI only.");
}
