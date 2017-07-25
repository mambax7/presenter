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
$GLOBALS['xoopsOption']['template_main'] = 'presenter_slides.tpl';
//$GLOBALS['xoopsOption']['template_main'] = 'presenter_iframe.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';
$start = presenter_CleanVars($_REQUEST, 'start', 0);
// Define Stylesheet
$xoTheme->addStylesheet($style);
// Get Handler
$slidesHandler = xoops_getModuleHandler('slides', 'presenter');
$nb_slides     = $GLOBALS['xoopsModuleConfig']['userpager'];

$criteria     = new CriteriaCompo();
$slides_count = $slidesHandler->getCount($criteria);
$slides_arr   = $slidesHandler->getAll($criteria);
foreach (array_keys($slides_arr) as $i) {
    $slides['slides_id']      = $slides_arr[$i]->getVar('slides_id');
    $slides['slides_cid']     = $slides_arr[$i]->getVar('slides_cid');
    $slides['slides_uid']     = $slides_arr[$i]->getVar('slides_uid');
    $slides['slides_title']   = $slides_arr[$i]->getVar('slides_title');
    $slides['slides_content'] = $slides_arr[$i]->getVar('slides_content');

    $slides['css_id']    = $slides_arr[$i]->getVar('css_id');
    $slides['css_class'] = $slides_arr[$i]->getVar('css_class');

    $slides['slides_transition_x'] = $slides_arr[$i]->getVar('slides_transition_x');
    $slides['slides_transition_y'] = $slides_arr[$i]->getVar('slides_transition_y');
    $slides['slides_transition_z'] = $slides_arr[$i]->getVar('slides_transition_z');
    $slides['slides_rotation_x']   = $slides_arr[$i]->getVar('slides_rotation_x');
    $slides['slides_rotation_y']   = $slides_arr[$i]->getVar('slides_rotation_y');
    $slides['slides_rotation_z']   = $slides_arr[$i]->getVar('slides_rotation_z');
    $slides['slides_scale_x']      = $slides_arr[$i]->getVar('slides_scale_x');
    $slides['slides_scale_y']      = $slides_arr[$i]->getVar('slides_scale_y');
    $slides['slides_scale_z']      = $slides_arr[$i]->getVar('slides_scale_z');
    $slides['slides_created']      = $slides_arr[$i]->getVar('slides_created');
    $slides['slides_published']    = $slides_arr[$i]->getVar('slides_published');
    $slides['slides_position']     = $slides_arr[$i]->getVar('slides_position');
    $slides['slides_online']       = $slides_arr[$i]->getVar('slides_online');
    $slides['slides_type']         = $slides_arr[$i]->getVar('slides_type');
    $slides['slides_notes']        = strip_tags($slides_arr[$i]->getVar('slides_notes'));
    $slides['slides_mp3']          = $slides_arr[$i]->getVar('slides_mp3');
    $slides['slides_time']         = $slides_arr[$i]->getVar('slides_time');
    $slides['slides_status']       = $slides_arr[$i]->getVar('slides_status');
    $slides['slides_waiting']      = $slides_arr[$i]->getVar('slides_waiting');
    $slides['slides_online']       = $slides_arr[$i]->getVar('slides_online');
    $GLOBALS['xoopsTpl']->append('slides', $slides);
    $keywords[] = $slides_arr[$i]->getVar('slides_name');

    //    $GLOBALS['xoopsTpl']->assign('slides_title', $slides_arr[$i]->getVar('slides_title'));
    //    $GLOBALS['xoopsTpl']->assign('slides_content', $slides_arr[$i]->getVar('slides_content'));
    //    $GLOBALS['xoopsTpl']->assign('slides_transition_x', $slides_arr[$i]->getVar('slides_transition_x'));
    //    $GLOBALS['xoopsTpl']->assign('slides_transition_y', $slides_arr[$i]->getVar('slides_transition_y'));
    //    $GLOBALS['xoopsTpl']->assign('slides_transition_z', $slides_arr[$i]->getVar('slides_transition_z'));
    //    $GLOBALS['xoopsTpl']->assign('slides_rotation_x', $slides_arr[$i]->getVar('slides_rotation_x'));
    //    $GLOBALS['xoopsTpl']->assign('slides_rotation_y', $slides_arr[$i]->getVar('slides_rotation_y'));
    //    $GLOBALS['xoopsTpl']->assign('slides_rotation_z', $slides_arr[$i]->getVar('slides_rotation_z'));
    //    $GLOBALS['xoopsTpl']->assign('slides_scale_x', $slides_arr[$i]->getVar('slides_scale_x'));
    //    $GLOBALS['xoopsTpl']->assign('slides_scale_y', $slides_arr[$i]->getVar('slides_scale_y'));
    //    $GLOBALS['xoopsTpl']->assign('slides_scale_z', $slides_arr[$i]->getVar('slides_scale_z'));

    unset($slides);
}

// Display Navigation
if ($slides_count > $nb_slides) {
    require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
    $nav = new XoopsPageNav($slides_count, $nb_slides, $start, 'start');
    $GLOBALS['xoopsTpl']->assign('pagenav', $nav->renderNav(4));
}
//keywords
presenter_meta_keywords($GLOBALS['xoopsModuleConfig']['keywords'] . ', ' . implode(', ', $keywords));
//description
presenter_meta_description(_MA_PRESENTER_SLIDES_DESC);
//
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', PRESENTER_URL . '/slides.php');
$GLOBALS['xoopsTpl']->assign('presenter_url', PRESENTER_URL);
$GLOBALS['xoopsTpl']->assign('adv', $GLOBALS['xoopsModuleConfig']['advertise']);
//
$GLOBALS['xoopsTpl']->assign('social_bookmarks', $GLOBALS['xoopsModuleConfig']['social_bookmarks']);
$GLOBALS['xoopsTpl']->assign('fbcomments', $GLOBALS['xoopsModuleConfig']['fbcomments']);
//
$GLOBALS['xoopsTpl']->assign('admin', PRESENTER_ADMIN);
$GLOBALS['xoopsTpl']->assign('copyright', $copyright);
//
require_once XOOPS_ROOT_PATH . '/footer.php';
