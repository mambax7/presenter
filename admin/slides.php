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
        $adminObject->addItemButton(_AM_PRESENTER_ADD_SLIDES, 'slides.php?op=new', 'add');
        $adminObject->displayButton('left');
        $criteria = new CriteriaCompo();
        $criteria->setSort('slides_id ASC, slides_id');
        $criteria->setOrder('ASC');
        $numrows    = $slidesHandler->getCount();
        $slides_arr = $slidesHandler->getAll($criteria);

        // Table view
        if ($numrows > 0) {
            echo "<table width='100%' cellspacing='1' class='outer'>
                    <tr>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CID . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_UID . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CONTENT . "</th>

                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>

                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CREATED . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_PUBLISHED . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_POSITION . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ONLINE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TYPE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_NOTES . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_MP3 . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TIME . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_STATUS . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_WAITING . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ONLINE . "</th>
                        <th class='center width5'>" . _AM_PRESENTER_FORMACTION . '</th>
                    </tr>';

            $class = 'odd';

            foreach (array_keys($slides_arr) as $i) {
                echo "<tr class='" . $class . "'>";
                $class = ('even' === $class) ? 'odd' : 'even';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_cid')) . '</td>';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_uid')) . '</td>';
                echo "<td class='left'>" . $slides_arr[$i]->getVar('slides_title') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_content') . '</td>';

                echo "<td class='left'>" . $slides_arr[$i]->getVar('css_id') . '</td>';
                echo "<td class='left'>" . $slides_arr[$i]->getVar('css_class') . '</td>';

                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_transition_x') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_transition_y') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_transition_z') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_rotation_x') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_rotation_y') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_rotation_z') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_scale_x') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_scale_y') . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_scale_z') . '</td>';
                echo "<td class='center'>" . formatTimestamp($slides_arr[$i]->getVar('slides_created'), 'S') . '</td>';
                echo "<td class='center'>" . formatTimestamp($slides_arr[$i]->getVar('slides_published'), 'S') . '</td>';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_position')) . '</td>';
                echo "<td class='center'>" . ((1 == $slides_arr[$i]->getVar('slides_online')) ? _YES : _NO) . '</td>';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_type')) . '</td>';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_notes')) . '</td>';
                echo "<td class='center'>" . $slides_arr[$i]->getVar('slides_mp3') . '</td>';
                echo "<td class='center'>" . strip_tags($slides_arr[$i]->getVar('slides_time')) . '</td>';
                echo "<td class='center'>" . ((1 == $slides_arr[$i]->getVar('slides_status')) ? _YES : _NO) . '</td>';
                echo "<td class='center'>" . ((1 == $slides_arr[$i]->getVar('slides_waiting')) ? _YES : _NO) . '</td>';
                echo "<td class='center'>" . ((1 == $slides_arr[$i]->getVar('slides_online')) ? _YES : _NO) . '</td>';

                echo "<td class='center width5'>
                    <a href='slides.php?op=edit&slides_id=" . $i . "'><img src=" . $pathIcon16 . "/edit.png alt='" . _EDIT . "' title='" . _EDIT . "'></a>
                    <a href='slides.php?op=delete&slides_id=" . $i . "'><img src=" . $pathIcon16 . "/delete.png alt='" . _DELETE . "' title='" . _DELETE . "'></a>
                    </td>";
                echo '</tr>';
            }
            echo '</table><br><br>';
        } else {
            echo "<table width='100%' cellspacing='1' class='outer'>
                    <tr>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CID . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_UID . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CONTENT . "</th>

                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TITLE . "</th>

                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TRANSITION_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ROTATION_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_X . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_Y . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_SCALE_Z . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_CREATED . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_PUBLISHED . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_POSITION . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ONLINE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TYPE . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_NOTES . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_MP3 . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_TIME . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_STATUS . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_WAITING . "</th>
                        <th class='center'>" . _AM_PRESENTER_SLIDES_ONLINE . "</th>
                        <th class='center width5'>" . _AM_PRESENTER_FORMACTION . "</th>
                    </tr><tr><td class='errorMsg' colspan='25'>There are no slides</td></tr>";
            echo '</table><br><br>';
        }

        break;

    case 'new':
        $adminObject->addItemButton(_AM_PRESENTER_SLIDES_LIST, 'slides.php', 'list');
        $adminObject->displayButton('left');

        $obj  = $slidesHandler->create();
        $form = $obj->getForm();
        $form->display();
        break;

    case 'save':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('slides.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['slides_id'])) {
            $obj = $slidesHandler->get($_REQUEST['slides_id']);
        } else {
            $obj = $slidesHandler->create();
        }

        // Form save fields
        $obj->setVar('slides_cid', $_REQUEST['slides_cid']);
        $obj->setVar('slides_uid', $_REQUEST['slides_uid']);
        $obj->setVar('slides_title', $_REQUEST['slides_title']);
        $obj->setVar('slides_content', $_REQUEST['slides_content']);

        $obj->setVar('css_id', $_REQUEST['css_id']);
        $obj->setVar('css_class', $_REQUEST['css_class']);

        $obj->setVar('slides_transition_x', $_REQUEST['slides_transition_x']);
        $obj->setVar('slides_transition_y', $_REQUEST['slides_transition_y']);
        $obj->setVar('slides_transition_z', $_REQUEST['slides_transition_z']);
        $obj->setVar('slides_rotation_x', $_REQUEST['slides_rotation_x']);
        $obj->setVar('slides_rotation_y', $_REQUEST['slides_rotation_y']);
        $obj->setVar('slides_rotation_z', $_REQUEST['slides_rotation_z']);
        $obj->setVar('slides_scale_x', $_REQUEST['slides_scale_x']);
        $obj->setVar('slides_scale_y', $_REQUEST['slides_scale_y']);
        $obj->setVar('slides_scale_z', $_REQUEST['slides_scale_z']);
        $obj->setVar('slides_created', strtotime($_REQUEST['slides_created']));
        $obj->setVar('slides_published', strtotime($_REQUEST['slides_published']));
        $obj->setVar('slides_position', $_REQUEST['slides_position']);
        $obj->setVar('slides_online', ((1 == $_REQUEST['slides_online']) ? '1' : '0'));
        $obj->setVar('slides_type', $_REQUEST['slides_type']);
        $obj->setVar('slides_notes', $_REQUEST['slides_notes']);
        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploaddir = XOOPS_UPLOAD_PATH . '/presenter/files/slides/';
        $uploader  = new XoopsMediaUploader($uploaddir, $GLOBALS['xoopsModuleConfig']['mimetypes'], $GLOBALS['xoopsModuleConfig']['maxsize'], null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->setPrefix('slides_mp3_');
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $obj->setVar('slides_mp3', $uploader->getSavedFileName());
            }
        }

        $obj->setVar('slides_time', $_REQUEST['slides_time']);
        $obj->setVar('slides_status', ((1 == $_REQUEST['slides_status']) ? '1' : '0'));
        $obj->setVar('slides_waiting', ((1 == $_REQUEST['slides_waiting']) ? '1' : '0'));
        $obj->setVar('slides_online', ((1 == $_REQUEST['slides_online']) ? '1' : '0'));

        if ($slidesHandler->insert($obj)) {
            redirect_header('slides.php?op=list', 2, _AM_PRESENTER_FORMOK);
        }

        echo $obj->getHtmlErrors();
        $form =& $obj->getForm();
        $form->display();
        break;

    case 'edit':
        $adminObject->addItemButton(_AM_PRESENTER_ADD_SLIDES, 'slides.php?op=new', 'add');
        $adminObject->addItemButton(_AM_PRESENTER_SLIDES_LIST, 'slides.php', 'list');
        $adminObject->displayButton('left');
        $obj  = $slidesHandler->get($_REQUEST['slides_id']);
        $form = $obj->getForm();
        $form->display();
        break;

    case 'delete':
        $obj = $slidesHandler->get($_REQUEST['slides_id']);
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('slides.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($slidesHandler->delete($obj)) {
                redirect_header('slides.php', 3, _AM_PRESENTER_FORMDELOK);
            } else {
                echo $obj->getHtmlErrors();
            }
        } else {
            xoops_confirm(['ok' => 1, 'slides_id' => $_REQUEST['slides_id'], 'op' => 'delete'], $_SERVER['REQUEST_URI'], sprintf(_AM_PRESENTER_FORMSUREDEL, $obj->getVar('slides_id')));
        }
        break;
}
require_once __DIR__ . '/admin_footer.php';
