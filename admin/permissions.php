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
include __DIR__ . '/admin_header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
if (!empty($_POST['submit'])) {
    redirect_header(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/admin/permissions.php', 1, _MP_GPERMUPDATED);
}
$adminObject->displayNavigation(basename(__FILE__));

$permission                = presenter_CleanVars($_POST, 'permission', 1, 'int');
$selected                  = array('', '', '');
$selected[$permission - 1] = ' selected';

echo "
<form method='post' name='fselperm' action='permissions.php'>
    <table border=0>
        <tr>
            <td>
                <select name='permission' onChange='document.fselperm.submit()'>
                    <option value='1'" . $selected[0] . '>' . _AM_PRESENTER_PERMISSIONS_ACCESS . "</option>
                    <option value='2'" . $selected[1] . '>' . _AM_PRESENTER_PERMISSIONS_SUBMIT . "</option>
                    <option value='3'" . $selected[2] . '>' . _AM_PRESENTER_PERMISSIONS_VIEW . '</option>
                </select>
            </td>
        </tr>
    </table>
</form>';

$module_id = $xoopsModule->getVar('mid');
switch ($permission) {
    case 1:
        $formTitle = _AM_PRESENTER_PERMISSIONS_ACCESS;
        $permName  = 'presenter_access';
        $permDesc  = '';
        break;
    case 2:
        $formTitle = _AM_PRESENTER_PERMISSIONS_SUBMIT;
        $permName  = 'presenter_submit';
        $permDesc  = '';
        break;
    case 3:
        $formTitle = _AM_PRESENTER_PERMISSIONS_VIEW;
        $permName  = 'presenter_view';
        $permDesc  = '';
        break;
}

$permform      = new XoopsGroupPermForm($formTitle, $module_id, $permName, $permDesc, 'admin/permissions.php');
$slidesHandler = xoops_getModuleHandler('slides', 'presenter');
$criteria      = new CriteriaCompo();
$criteria->setSort('slides_cid');
$criteria->setOrder('ASC');
$slides_arr = $slidesHandler->getObjects($criteria);

foreach (array_keys($slides_arr) as $i) {
    $permform->addItem($slides_arr[$i]->getVar('slides_id'), $slides_arr[$i]->getVar('slides_cid'));
}
echo $permform->render();
echo '<br><br>';
unset($permform);

include __DIR__ . '/admin_footer.php';
