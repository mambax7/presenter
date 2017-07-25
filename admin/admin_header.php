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
 */
require_once __DIR__ . '/../../../include/cp_header.php';
$thisPath = dirname(__DIR__);
require_once $thisPath . '/include/common.php';
require_once $thisPath . '/include/functions.php';

$thisModule = $GLOBALS['xoopsModule']->getVar('dirname');

$pathIcon16      = \Xmf\Module\Admin::iconUrl('', 16);
$pathIcon16      = \Xmf\Module\Admin::iconUrl('', 32);
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');
//load handlers
$categoriesHandler = xoops_getModuleHandler('categories', $thisModule);
$slidesHandler     = xoops_getModuleHandler('slides', $thisModule);
$myts = MyTextSanitizer::getInstance();
if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new XoopsTpl();
}

$xoopsTpl->assign('pathIcon16', $pathIcon16);
$xoopsTpl->assign('pathIcon32', $pathIcon32);
//Load languages
xoops_loadLanguage('admin', $thisModule);
xoops_loadLanguage('modinfo', $thisModule);
xoops_loadLanguage('main', $thisModule);
// Local admin menu class
require_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');

xoops_cp_header();
//$adminObject = \Xmf\Module\Admin::getInstance();
//load handlers
$categoriesHandler =& xoops_getModuleHandler('categories', $moduleDirName);
$slidesHandler     =& xoops_getModuleHandler('slides', $moduleDirName);
