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
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GPL 2.0 or later
 * @package         presenter
 * @since           2.5.5
 * @author          XOOPS Development Team <name@site.com> - <http://xoops.org>
 * @version         $Id: 1.0 admin_footer.php 11532 Wed 2013/08/28 4:00:28Z XOOPS Development Team $
 */

global $xoopsModule;
//$pathIcon32      = '../' . $xoopsModule->getInfo('icons32');

echo "<div class='adminfooter'>\n"
     ."  <div style='text-align: center;'>\n"
     ."    <a href='http://www.xoops.org' rel='external'><img src='{$pathIcon32}/xoopsmicrobutton.gif' alt='XOOPS' title='XOOPS'></a>\n"
     ."  </div>\n"
     .'  ' . _AM_MODULEADMIN_ADMIN_FOOTER . "\n"
     .'</div>';

xoops_cp_footer();