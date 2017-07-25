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
require_once __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'presenter_index.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';
// Define Stylesheet
$xoTheme->addStylesheet($style);
// keywords
presenter_meta_keywords($GLOBALS['xoopsModuleConfig']['keywords']);
// description
presenter_meta_description(_MA_PRESENTER_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', PRESENTER_URL . '/index.php');
$GLOBALS['xoopsTpl']->assign('presenter_url', PRESENTER_URL);
$GLOBALS['xoopsTpl']->assign('adv', $GLOBALS['xoopsModuleConfig']['advertise']);
//
//$GLOBALS['xoopsTpl']->assign('social_bookmarks', $GLOBALS['xoopsModuleConfig']['social_bookmarks']);
//$GLOBALS['xoopsTpl']->assign('fbcomments', $GLOBALS['xoopsModuleConfig']['fbcomments']);
//
$GLOBALS['xoopsTpl']->assign('admin', PRESENTER_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
require_once XOOPS_ROOT_PATH . "/footer.php";
