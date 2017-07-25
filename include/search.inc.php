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
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array
 */
function presenter_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;

    $sql = 'SELECT slides_id, slides_cid FROM ' . $xoopsDB->prefix('slides') . ' WHERE slides_online = 1';

    if ($userid != 0) {
        $sql .= ' AND slides_submitter=' . (int)$userid;
    }

    if (is_array($queryarray) && $count = count($queryarray)) {
        $sql .= " AND ((slides_cid LIKE '%$queryarray[0]%' OR slides_uid LIKE '%$queryarray[0]%' OR slides_title LIKE '%$queryarray[0]%' OR slides_content LIKE '%$queryarray[0]%' OR slides_transition_x LIKE '%$queryarray[0]%' OR slides_transition_y LIKE '%$queryarray[0]%' OR slides_transition_z LIKE '%$queryarray[0]%' OR slides_rotation_x LIKE '%$queryarray[0]%' OR slides_rotation_y LIKE '%$queryarray[0]%' OR slides_rotation_z LIKE '%$queryarray[0]%' OR slides_scale_x LIKE '%$queryarray[0]%' OR slides_scale_y LIKE '%$queryarray[0]%' OR slides_scale_z LIKE '%$queryarray[0]%' OR slides_created LIKE '%$queryarray[0]%' OR slides_published LIKE '%$queryarray[0]%' OR slides_position LIKE '%$queryarray[0]%' OR slides_online LIKE '%$queryarray[0]%' OR slides_type LIKE '%$queryarray[0]%' OR slides_notes LIKE '%$queryarray[0]%' OR slides_mp3 LIKE '%$queryarray[0]%' OR slides_time LIKE '%$queryarray[0]%')";

        for ($i = 1; $i < $count; ++$i) {
            $sql .= " $andor ";
            $sql .= "(slides_cid LIKE '%$queryarray[$i]%' OR slides_uid LIKE '%$queryarray[$i]%' OR slides_title LIKE '%$queryarray[$i]%' OR slides_content LIKE '%$queryarray[$i]%' OR slides_transition_x LIKE '%$queryarray[$i]%' OR slides_transition_y LIKE '%$queryarray[$i]%' OR slides_transition_z LIKE '%$queryarray[$i]%' OR slides_rotation_x LIKE '%$queryarray[$i]%' OR slides_rotation_y LIKE '%$queryarray[$i]%' OR slides_rotation_z LIKE '%$queryarray[$i]%' OR slides_scale_x LIKE '%$queryarray[$i]%' OR slides_scale_y LIKE '%$queryarray[$i]%' OR slides_scale_z LIKE '%$queryarray[$i]%' OR slides_created LIKE '%$queryarray[$i]%' OR slides_published LIKE '%$queryarray[$i]%' OR slides_position LIKE '%$queryarray[$i]%' OR slides_online LIKE '%$queryarray[$i]%' OR slides_type LIKE '%$queryarray[$i]%' OR slides_notes LIKE '%$queryarray[$i]%' OR slides_mp3 LIKE '%$queryarray[$i]%' OR slides_time LIKE '%$queryarray[0]%')";
        }
        $sql .= ')';
    }

    $sql    .= ' ORDER BY slides_id DESC';
    $result = $xoopsDB->query($sql, $limit, $offset);
    $ret    = array();
    $i      = 0;
    while ($myrow = $xoopsDB->fetchArray($result)) {
        $ret[$i]['image'] = 'images/icons/32/slides_search.png';
        $ret[$i]['link']  = 'slides.php?slides_id=' . $myrow['slides_id'];
        $ret[$i]['title'] = $myrow['slides_cid'];
        ++$i;
    }

    return $ret;
}
