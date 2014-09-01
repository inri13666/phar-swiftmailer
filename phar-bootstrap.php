<?php
/**
 * User  : Nikita.Makarov
 * Date  : 09/01/14
 * Time  : 7:32 AM
 * E-Mail: nikita.makarov@effective-soft.com
 */
if (!function_exists('__def')) {
    function __def($constant, $value)
    {
        if (strlen($constant) <= 0) {
            return false;
        }
        if (!defined($constant)) {
            define($constant, $value);
            return true;
        }
        //Already Defined
        return false;
    }
}
__def('DS', DIRECTORY_SEPARATOR);

if (version_compare(PHP_VERSION, '5.3.0') < 0) {
    exit("PHP must be 5.3.0+");
}

//if (!defined('SWIFT_CONFIG_DIR')) {
//    exit("Please Define Config DIR");
//}

Phar::mapPhar();
require_once 'phar://' . __FILE__ . DS . 'swift_required.php';

__HALT_COMPILER();
?>
