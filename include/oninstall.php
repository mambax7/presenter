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
 * @version         $Id: 1.0 install.php 11532 Wed 2013/08/28 4:00:28Z XOOPS Development Team $
 */
$indexFile = XOOPS_UPLOAD_PATH . '/index.html';
$blankFile = XOOPS_UPLOAD_PATH . '/blank.gif';

// Making of "uploads" folder
$presenter = XOOPS_UPLOAD_PATH . '/presenter';
if (!is_dir($presenter)) {
    mkdir($presenter, 0777);
}
chmod($presenter, 0777);
copy($indexFile, $presenter . '/index.html');

// Making of categories uploads folder
$categories = $presenter . '/categories';
if (!is_dir($categories)) {
    mkdir($categories, 0777);
}
chmod($categories, 0777);
copy($indexFile, $categories . '/index.html');

// Making of "cat_image" images folder
$categories = $presenter . '/images';
if (!is_dir($categories)) {
    mkdir($categories, 0777);
}
chmod($categories, 0777);
copy($indexFile, $categories . '/index.html');
copy($blankFile, $categories . '/blank.gif');

// Making of "cat_image" images folder
$categories = $presenter . '/images/categories';
if (!is_dir($categories)) {
    mkdir($categories, 0777);
}
chmod($categories, 0777);
copy($indexFile, $categories . '/index.html');
copy($blankFile, $categories . '/blank.gif');

// Making of slides uploads folder
$slides = $presenter . '/slides';
if (!is_dir($slides)) {
    mkdir($slides, 0777);
}
chmod($slides, 0777);
copy($indexFile, $slides . '/index.html');

// Making of "slides_mp3" files folder
$slides = $presenter . '/files';
if (!is_dir($slides)) {
    mkdir($slides, 0777);
}
chmod($slides, 0777);
copy($indexFile, $slides . '/index.html');

// Making of "slides_mp3" files folder
$slides = $presenter . '/files/slides';
if (!is_dir($slides)) {
    mkdir($slides, 0777);
}
chmod($slides, 0777);
copy($indexFile, $slides . '/index.html');
