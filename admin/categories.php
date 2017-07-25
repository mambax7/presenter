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
xoops_cp_header();
//It recovered the value of argument op in URL$
$op = presenter_CleanVars($_REQUEST, 'op', 'list', 'string');
$adminObject->displayNavigation(basename(__FILE__));

switch ($op) {
    case 'list':
    default:
        $adminObject->addItemButton(_AM_PRESENTER_ADD_CATEGORIES, 'categories.php?op=new', 'add');
        $adminObject->displayButton('left');
        $criteria = new CriteriaCompo();
        $criteria->setSort('cat_id ASC, cat_id');
        $criteria->setOrder('ASC');
        $numrows        = $categoriesHandler->getCount();
        $categories_arr = $categoriesHandler->getAll($criteria);

        // Table view
        if ($numrows > 0) {
            echo "<table width='100%' cellspacing='1' class='outer'>
                    <tr>
                        <th class='center'>" . _AM_PRESENTER_CAT_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_DESC . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_IMAGE . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_WEIGHT . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_COLOR . "</th>
                        <th class='center width5'>" . _AM_PRESENTER_FORMACTION . '</th>
                    </tr>';

            $class = 'odd';

            foreach (array_keys($categories_arr) as $i) {
                echo "<tr class='" . $class . "'>";
                $class = ($class === 'even') ? 'odd' : 'even';
                echo "<td class='left'><img src='" . PRESENTER_URL . "/assets/images/icons/16/arrow.gif'>&nbsp;" . $categories_arr[$i]->getVar('cat_title') . '</td>';
                echo "<td class='center'>" . strip_tags($categories_arr[$i]->getVar('cat_desc')) . '</td>';
                $cat_image = $categories_arr[$i]->getVar('cat_image');
                if (file_exists($image = XOOPS_UPLOAD_URL . '/presenter/images/categories/' . $cat_image)) {
                    echo "<td class='center'><img src='" . $image . "' height='30px' alt='cat_image'></td>";
                } else {
                    echo "<td class='center'><img src='../images/categories/" . $cat_image . "' height='30px' alt='cat_image'></td>";
                }
                echo "<td class='center'>" . strip_tags($categories_arr[$i]->getVar('cat_weight')) . '</td>';
                echo "<td class='center'><span style='background-color:" . $categories_arr[$i]->getVar('cat_color') . "'>&nbsp;&nbsp;&nbsp;</span> -> " . $categories_arr[$i]->getVar('cat_color') . '</td>';

                echo "<td class='center width5'>
                    <a href='categories.php?op=edit&cat_id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                    <a href='categories.php?op=delete&cat_id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
                    </td>";
                echo '</tr>';
            }
            echo '</table><br><br>';
        } else {
            echo "<table width='100%' cellspacing='1' class='outer'>
                    <tr>
                        <th class='center'>" . _AM_PRESENTER_CAT_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_DESC . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_IMAGE . "</th>
                        <th class='center'>" . _AM_PRESENTER_CAT_WEIGHT . "</th>
//                      <th class='center'>" . _AM_PRESENTER_CAT_COLOR . "</th>
                        <th class='center width5'>" . _AM_PRESENTER_FORMACTION . "</th>
                    </tr><tr><td class='errorMsg' colspan='7'>There are no cat</td></tr>";
            echo '</table><br><br>';
        }

        break;

    case 'new':
        $adminObject->addItemButton(_AM_PRESENTER_CATEGORIES_LIST, 'categories.php', 'list');
        $adminObject->displayButton('left');

        $obj  = $categoriesHandler->create();
        $form = $obj->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('categories.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['cat_id'])) {
            $obj = $categoriesHandler->get($_REQUEST['cat_id']);
        } else {
            $obj = $categoriesHandler->create();
        }

        // Form save fields
        $obj->setVar('cat_pid', $_REQUEST['cat_pid']);
        $obj->setVar('cat_title', $_REQUEST['cat_title']);
        $obj->setVar('cat_desc', $_REQUEST['cat_desc']);

        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploaddir = XOOPS_UPLOAD_PATH . '/presenter/images/categories/';
        $uploader  = new XoopsMediaUploader($uploaddir, $GLOBALS['xoopsModuleConfig']['mimetypes'], $GLOBALS['xoopsModuleConfig']['maxsize'], null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->setPrefix('cat_image_');
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $obj->setVar('cat_image', $uploader->getSavedFileName());
            }
        } else {
            $obj->setVar('cat_image', $_REQUEST['cat_image']);
        }

        $obj->setVar('cat_weight', $_REQUEST['cat_weight']);
        //      $obj->setVar('cat_color', $_REQUEST['cat_color']);

        if ($categoriesHandler->insert($obj)) {
            redirect_header('categories.php?op=list', 2, _AM_PRESENTER_FORMOK);
        }

        echo $obj->getHtmlErrors();
        $form =& $obj->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(_AM_PRESENTER_ADD_CATEGORIES, 'categories.php?op=new', 'add');
        $adminObject->addItemButton(_AM_PRESENTER_CATEGORIES_LIST, 'categories.php', 'list');
        $adminObject->displayButton('left');
        $obj  = $categoriesHandler->get($_REQUEST['cat_id']);
        $form = $obj->getForm();
        $form->display();
        break;

    case 'delete':
        $obj = $categoriesHandler->get($_REQUEST['cat_id']);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('categories.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($categoriesHandler->delete($obj)) {
                redirect_header('categories.php', 3, _AM_PRESENTER_FORMDELOK);
            } else {
                echo $obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(array('ok' => 1, 'cat_id' => $_REQUEST['cat_id'], 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_PRESENTER_FORMSUREDEL, $obj->getVar('cat_id')));
        }
        break;
}
require_once __DIR__ . '/admin_footer.php';
