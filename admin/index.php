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
require_once __DIR__ . '/admin_header.php';
// Display Admin header
xoops_cp_header();
//count "total cat"
$count_cat = $categoriesHandler->getCount();
//count "total slides"
$count_slides = $slidesHandler->getCount();
// InfoBox slides
$adminObject->addInfoBox(_AM_PRESENTER_STATISTICS);
// InfoBox cat
$adminObject->addInfoBoxLine(_AM_PRESENTER_STATISTICS, _AM_PRESENTER__THEREARE_CATEGORIES, $count_cat);
// InfoBox slides
$adminObject->addInfoBoxLine(_AM_PRESENTER_STATISTICS, _AM_PRESENTER__THEREARE_SLIDES, $count_slides);
// Render Index
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->displayIndex();
require_once __DIR__ . '/admin_footer.php';
