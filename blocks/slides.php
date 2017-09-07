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
require_once XOOPS_ROOT_PATH . '/modules/presenter/include/functions.php';
/**
 * @param $options
 * @return array
 */
function b_presenter_slides_show($options)
{
    require_once XOOPS_ROOT_PATH . '/modules/presenter/class/slides.php';
    $myts = MyTextSanitizer::getInstance();

    $slides       = [];
    $type_block   = $options[0];
    $nb_slides    = $options[1];
    $lenght_title = $options[2];

    $slidesHandler = xoops_getModuleHandler('slides', 'presenter');
    $criteria      = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);

    if ($type_block) {
        $criteria->add(new Criteria('slides_id', 0, '!='));
        $criteria->setSort('slides_id');
        $criteria->setOrder('ASC');
    }

    $criteria->setLimit($nb_slides);
    $slides_arr = $slidesHandler->getAll($criteria);
    foreach (array_keys($slides_arr) as $i) {
        $slides[$i]['slides_id']      = $slides_arr[$i]->getVar('slides_id');
        $slides[$i]['slides_cid']     = $slides_arr[$i]->getVar('slides_cid');
        $slides[$i]['slides_uid']     = $slides_arr[$i]->getVar('slides_uid');
        $slides[$i]['slides_title']   = $slides_arr[$i]->getVar('slides_title');
        $slides[$i]['slides_content'] = $slides_arr[$i]->getVar('slides_content');

        $slides[$i]['css_id']    = $slides_arr[$i]->getVar('css_id');
        $slides[$i]['css_class'] = $slides_arr[$i]->getVar('css_class');

        $slides[$i]['slides_transition_x'] = $slides_arr[$i]->getVar('slides_transition_x');
        $slides[$i]['slides_transition_y'] = $slides_arr[$i]->getVar('slides_transition_y');
        $slides[$i]['slides_transition_z'] = $slides_arr[$i]->getVar('slides_transition_z');
        $slides[$i]['slides_rotation_x']   = $slides_arr[$i]->getVar('slides_rotation_x');
        $slides[$i]['slides_rotation_y']   = $slides_arr[$i]->getVar('slides_rotation_y');
        $slides[$i]['slides_rotation_z']   = $slides_arr[$i]->getVar('slides_rotation_z');
        $slides[$i]['slides_scale_x']      = $slides_arr[$i]->getVar('slides_scale_x');
        $slides[$i]['slides_scale_y']      = $slides_arr[$i]->getVar('slides_scale_y');
        $slides[$i]['slides_scale_z']      = $slides_arr[$i]->getVar('slides_scale_z');
        $slides[$i]['slides_created']      = $slides_arr[$i]->getVar('slides_created');
        $slides[$i]['slides_published']    = $slides_arr[$i]->getVar('slides_published');
        $slides[$i]['slides_position']     = $slides_arr[$i]->getVar('slides_position');
        $slides[$i]['slides_online']       = $slides_arr[$i]->getVar('slides_online');
        $slides[$i]['slides_type']         = $slides_arr[$i]->getVar('slides_type');
        $slides[$i]['slides_notes']        = $slides_arr[$i]->getVar('slides_notes');
        $slides[$i]['slides_mp3']          = $slides_arr[$i]->getVar('slides_mp3');
        $slides[$i]['slides_time']         = $slides_arr[$i]->getVar('slides_time');
        $slides[$i]['slides_status']       = $slides_arr[$i]->getVar('slides_status');
        $slides[$i]['slides_waiting']      = $slides_arr[$i]->getVar('slides_waiting');
        $slides[$i]['slides_online']       = $slides_arr[$i]->getVar('slides_online');
    }

    return $slides;
}

/**
 * @param $options
 * @return string
 */
function b_presenter_slides_edit($options)
{
    require_once XOOPS_ROOT_PATH . '/modules/presenter/class/presenter_slides.php';

    $form          = _MB_PRESENTER_DISPLAY . "\n";
    $form          .= "<input type='hidden' name='options[0]' value='" . $options[0] . "'>";
    $form          .= "<input name='options[1]' size='5' maxlength='255' value='" . $options[1] . "' type='text'>&nbsp;<br>";
    $form          .= _MB_PRESENTER_TITLELENGTH . " : <input name='options[2]' size='5' maxlength='255' value='" . $options[2] . "' type='text'><br><br>";
    $slidesHandler = xoops_getModuleHandler('slides', 'presenter');
    $criteria      = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria->add(new Criteria('slides_id', 0, '!='));
    $criteria->setSort('slides_id');
    $criteria->setOrder('ASC');
    $slides_arr = $slidesHandler->getAll($criteria);
    $form       .= _MB_PRESENTER_CATTODISPLAY . "<br><select name='options[]' multiple='multiple' size='5'>";
    $form       .= "<option value='0' " . (array_search(0, $options) === false ? '' : 'selected') . '>' . _MB_PRESENTER_ALLCAT . '</option>';
    foreach (array_keys($slides_arr) as $i) {
        $slides_id = $slides_arr[$i]->getVar('slides_id');
        $form      .= "<option value='" . $slides_id . "' " . (array_search($slides_id, $options) === false ? '' : 'selected') . '>' . $slides_arr[$i]->getVar('slides_title') . '</option>';
    }
    $form .= '</select>';

    return $form;
}
