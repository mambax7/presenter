<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
/**
 * presenter module for xoops
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GPL 2.0 or later
 * @package         presenter
 * @since           2.5.5
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @version         $Id: 1.0 common.php 11532 Wed 2013/08/28 4:00:28Z XOOPS Development Team $
 */

if (!defined("XOOPS_ROOT_PATH")) {
    exit;
}

//$thisPath = dirname(__DIR__);
//include_once $thisPath.'/admin/header.php';
global $pathIcon32;

if (!defined('PRESENTER_MODULE_PATH')) {
    define('PRESENTER_DIRNAME', 'presenter');
    define('PRESENTER_PATH', XOOPS_ROOT_PATH . '/modules/' . PRESENTER_DIRNAME);
    define('PRESENTER_URL', XOOPS_URL . '/modules/' . PRESENTER_DIRNAME);
    define('PRESENTER_UPLOAD_PATH', XOOPS_UPLOAD_PATH . '/' . PRESENTER_DIRNAME);
    define('PRESENTER_UPLOAD_URL', XOOPS_UPLOAD_URL . '/' . PRESENTER_DIRNAME);
    define('PRESENTER_IMAGE_PATH', PRESENTER_PATH . '/images');
    define('PRESENTER_IMAGE_URL', PRESENTER_URL . '/images/');
    define('PRESENTER_ADMIN', PRESENTER_URL . '/admin/index.php');
    $local_logo = PRESENTER_IMAGE_URL . '/xoopsproject_logo.png';
    if (is_dir(PRESENTER_IMAGE_PATH) && file_exists($local_logo)) {
        $logo = $local_logo;
    } else {
        $logo = $pathIcon32 . '/xoopsmicrobutton.gif';
    }
    define('PRESENTER_AUTHOR_LOGOIMG', $logo);
}
// module information
$copyright = "<a href='http://xoops.org' title='XOOPS Project' target='_blank'>
                     <img src='" . PRESENTER_AUTHOR_LOGOIMG . "' alt='XOOPS Project' /></a>";
