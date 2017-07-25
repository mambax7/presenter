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
 * @version         $Id: 1.0 about.php 11532 Wed 2013/08/28 4:00:28Z XOOPS Development Team $
 */
include_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$currentFile = basename(__FILE__);
$aboutAdmin = new ModuleAdmin();

echo $aboutAdmin->addNavigation($currentFile);
echo $aboutAdmin->renderAbout('xoopsfoundation@gmail.com', false);

include_once __DIR__ . '/admin_footer.php';
