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
 * @version         $Id: 1.0 categories.php 11532 Wed 2013/08/28 4:00:27Z XOOPS Development Team $
 */
include_once __DIR__ . '/header.php';
$xoopsOption['template_main'] = 'presenter_categories.tpl';
include_once XOOPS_ROOT_PATH . '/header.php';
$start = presenter_CleanVars($_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet($style);
// Get Handler
$categoriesHandler =& xoops_getModuleHandler('categories', 'presenter');
$nb_categories     = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria         = new CriteriaCompo();
$categories_count = $categoriesHandler->getCount($criteria);
$categories_arr   = $categoriesHandler->getAll($criteria);
if ($categories_count > 0) {
    foreach (array_keys($categories_arr) as $i) {
        $cat['cat_id']     = $categories_arr[$i]->getVar('cat_id');
        $cat['cat_pid']    = $categories_arr[$i]->getVar('cat_pid');
        $cat['cat_title']  = $categories_arr[$i]->getVar('cat_title');
        $cat['cat_desc']   = strip_tags($categories_arr[$i]->getVar('cat_desc'));
        $cat['cat_image']  = $categories_arr[$i]->getVar('cat_image');
        $cat['cat_weight'] = $categories_arr[$i]->getVar('cat_weight');
        $cat['cat_color']  = $categories_arr[$i]->getVar('cat_color');
        $GLOBALS['xoopsTpl']->append('categories', $cat);
        $keywords[] = $categories_arr[$i]->getVar('cat_name');
        unset($cat);
    }
    // Display Navigation
    if ($categories_count > $nb_categories) {
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $nav = new XoopsPageNav($categories_count, $nb_categories, $start, 'start');
        $GLOBALS['xoopsTpl']->assign('pagenav', $nav->renderNav(4));
    }
}
//keywords
presenter_meta_keywords($GLOBALS['xoopsModuleConfig']['keywords'] . ', ' . implode(', ', $keywords));
//description
presenter_meta_description(_MA_PRESENTER_CATEGORIES_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', PRESENTER_URL . '/categories.php');
$GLOBALS['xoopsTpl']->assign('presenter_url', PRESENTER_URL);
$GLOBALS['xoopsTpl']->assign('adv', $GLOBALS['xoopsModuleConfig']['advertise']);
//
//$GLOBALS['xoopsTpl']->assign('social_bookmarks', $GLOBALS['xoopsModuleConfig']['social_bookmarks']);
//$GLOBALS['xoopsTpl']->assign('fbcomments', $GLOBALS['xoopsModuleConfig']['fbcomments']);
//
$GLOBALS['xoopsTpl']->assign('admin', PRESENTER_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
include_once XOOPS_ROOT_PATH . '/footer.php';
