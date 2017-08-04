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
// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

$moduleDirName = basename(__DIR__);

$modversion = array(

    'version'             => 1.0,
    'module_status'       => 'Beta 2',
    'release_data'        => '2017/07/20',
    'name'                => _MI_PRESENTER_NAME,
    'description'         => _MI_PRESENTER_DESC,
    'author'              => "Michael Beck (aka Mamba)",
    'author_mail'         => "mambax7@gmail.com",
    'author_website_url'  => "https://xoops.org",
    'author_website_name' => "XOOPS Project",
    'credits'             => 'XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html/',
    'help'                => 'page=help',

    'release_info' => 'release_info',
    'release_file' => XOOPS_URL . "/modules/{$moduleDirName}/docs/release_info file",
    'release_date' => '2013/08/28',

    'manual'              => 'Installation.txt',
    'manual_file'         => XOOPS_URL . "/modules/$moduleDirName/docs/install.txt",
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => array('mysql' => '5.5'),
    'image'               => "assets/images/logoModule.png",
    'dirname'             => $moduleDirName,
    // Local path icons
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',

    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    'release'             => '2013/08/28',

    // Admin system menu
    'system_menu'         => 1,
    // Admin things
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Menu
    'hasMain'             => 1,
    // Scripts to run upon installation or update
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php'
);

// Mysql file
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'][1] = 'presenter_categories';
$modversion['tables'][2] = 'presenter_slides';

// ------------------- Help files ------------------- //
$modversion['helpsection'] = array(
    ['name' => _MI_PRESENTER_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_PRESENTER_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_PRESENTER_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_PRESENTER_SUPPORT, 'link' => 'page=support'],
);


// Templates
$modversion['templates'][] = array('file' => 'presenter_header.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_index.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_categories.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_slides.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_footer.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_iframe.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'presenter_iframeslides.tpl', 'description' => '');

//Blocks
$modversion['blocks'][] = array(
    'file'        => 'slides.php',
    'name'        => _MI_PRESENTER_SLIDES_BLOCK,
    'description' => '',
    'show_func'   => 'b_presenter_slides_show',
    'edit_func'   => 'b_presenter_slides_edit',
    'options'     => 'slides|5|25|0',
    'template'    => 'slides_block.tpl'
);

// Config
xoops_load('xoopseditorhandler');
$editorHandler          = XoopsEditorHandler::getInstance();
$modversion['config'][] = array(
    'name'        => 'presenter_editor',
    'title'       => '_MI_PRESENTER_EDITOR',
    'description' => '_MI_PRESENTER_EDITOR_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => array_flip($editorHandler->getList()),
    'default'     => 'dhtml'
);

$modversion['config'][] = array(
    'name'        => 'keywords',
    'title'       => '_MI_PRESENTER_KEYWORDS',
    'description' => '_MI_PRESENTER_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'presenter, slides'
);

//Uploads : filesize of slides_mp3
$modversion['config'][] = array(
    'name'        => 'filesize',
    'title'       => '_MI_PRESENTER_SIZE',
    'description' => '_MI_PRESENTER_SIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10485760
);

//Uploads : filemimetypes of slides_mp3
$modversion['config'][] = array(
    'name'        => 'filemimetypes',
    'title'       => '_MI_PRESENTER_MIMETYPES',
    'description' => '_MI_PRESENTER_MIMETYPES_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => array('image/gif', 'image/jpeg', 'image/png'),
    'options'     => array(
        'bmp'   => 'image/bmp',
        'gif'   => 'image/gif',
        'pjpeg' => 'image/pjpeg',
        'jpeg'  => 'image/jpeg',
        'jpg'   => 'image/jpg',
        'jpe'   => 'image/jpe',
        'png'   => 'image/png'
    )
);

$modversion['config'][] = array(
    'name'        => 'adminpager',
    'title'       => '_MI_PRESENTER_ADMINPAGER',
    'description' => '_MI_PRESENTER_ADMINPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
);

$modversion['config'][] = array(
    'name'        => 'userpager',
    'title'       => '_MI_PRESENTER_USERPAGER',
    'description' => '_MI_PRESENTER_USERPAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
);

$modversion['config'][] = array(
    'name'        => 'advertise',
    'title'       => '_MI_PRESENTER_ADVERTISE',
    'description' => '_MI_PRESENTER_ADVERTISE_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
);

$modversion['config'][] = array(
    'name'        => 'bookmarks',
    'title'       => '_MI_PRESENTER_BOOKMARKS',
    'description' => '_MI_PRESENTER_BOOKMARKS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);

$modversion['config'][] = array(
    'name'        => 'fbcomments',
    'title'       => '_MI_PRESENTER_FBCOMMENTS',
    'description' => '_MI_PRESENTER_FBCOMMENTS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
);
