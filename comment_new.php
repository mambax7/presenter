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
include __DIR__ . '/../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/modules/presenter/class/slides.php';
$com_itemid = isset($_REQUEST['com_itemid']) ? (int)$_REQUEST['com_itemid'] : 0;
if ($com_itemid > 0) {
    $slidesHandler  = xoops_getModuleHandler('slides', 'presenter');
    $slides         = $slideshandler->get($com_itemid);
    $com_replytitle = $slides->getVar('slides_cid');
    include XOOPS_ROOT_PATH . '/include/comment_new.php';
}
