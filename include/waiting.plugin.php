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
function b_waiting_presenter()
{
    $db  = XoopsDatabaseFactory::getDatabaseConnection();
    $ret = array();

    // waiting categories
    $block  = array();
    $result = $db->query('SELECT COUNT(*) FROM ' . $db->prefix('presenter_categories') . ' WHERE cat_waiting = 1');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/presenter/admin/categories.php?op=list_waiting';
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_PRESENTER_CATEGORIES_WAITING;
    }
    $ret[] = $block;

    // waiting slides
    $block  = array();
    $result = $db->query('SELECT COUNT(*) FROM ' . $db->prefix('presenter_slides') . ' WHERE slides_waiting = 1');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/presenter/admin/slides.php?op=list_waiting';
        list($block['pendingnum']) = $db->fetchRow($result);
        $block['lang_linkname'] = _MB_PRESENTER_SLIDES_WAITING;
    }
    $ret[] = $block;

    return $ret;
}
