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
 * @version         $Id: 1.0 notification.inc.php 11532 Wed 2013/08/28 4:00:27Z XOOPS Development Team $
 * @param $category
 * @param $item_id
 * @return string
 */
// comment callback functions
function presenter_notify_iteminfo($category, $item_id)
{
    global $xoopsModule, $xoopsModuleConfig, $xoopsConfig;

    if (empty($xoopsModule) || $xoopsModule->getVar('dirname') !== 'presenter') {
        $module_handler =& xoops_gethandler('module');
        $module         =& $module_handler->getByDirname('presenter');
        $config_handler =& xoops_gethandler('config');
        $config         =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
    } else {
        $module =& $xoopsModule;
        $config =& $xoopsModuleConfig;
    }

    xoops_loadLanguage('main', 'presenter');

    if ($category === 'global') {
        $item['name'] = '';
        $item['url']  = '';

        return $item;
    }

    global $xoopsDB;
    if ($category === 'category') {
        // Assume we have a valid category id
        $sql          = 'SELECT slides_cid FROM ' . $xoopsDB->prefix('presenter_slides') . ' WHERE slides_cid = ' . $item_id;
        $result       = $xoopsDB->query($sql); // TODO: error check
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['slides_cid'];
        $item['url']  = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/slides.php?slides_cid=' . $item_id;

        return $item;
    }

    if ($category === 'slides') {
        // Assume we have a valid link id
        $sql          = 'SELECT slides_cid, slides_cid FROM ' . $xoopsDB->prefix('slides') . ' WHERE slides_id = ' . $item_id;
        $result       = $xoopsDB->query($sql); // TODO: error check
        $result_array = $xoopsDB->fetchArray($result);
        $item['name'] = $result_array['title'];
        $item['url']  = XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/slides.php?slides_cid=' . $result_array['slides_cid'] . '&amp;slides_id=' . $item_id;

        return $item;
    }

    return '';
}
