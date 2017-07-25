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
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GPL 2.0 or later
 * @package         presenter
 * @since           2.5.5
 * @author          XOOPS Development Team <name@site.com> - <https://xoops.org>
 * @version         $Id: 1.0 header.php 11532 Wed 2013/08/28 4:00:28Z XOOPS Development Team $
 */
require_once dirname(dirname(__DIR__)) . '/mainfile.php';
$dirname  = $GLOBALS['xoopsModule']->getVar('dirname');
$pathname = XOOPS_ROOT_PATH . '/modules/' . $dirname;
include_once $pathname . '/include/common.php';
include_once $pathname . '/include/functions.php';
$myts  = MyTextSanitizer::getInstance();
$style = PRESENTER_URL . '/assets/css/style.css';
if (file_exists($style)) {
    return true;
}

xoops_loadLanguage('modinfo', $dirname);
xoops_loadLanguage('main', $dirname);
