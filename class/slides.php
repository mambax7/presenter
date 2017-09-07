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
// defined('XOOPS_ROOT_PATH') || exit('Restricted access.');

class PresenterSlides extends XoopsObject
{
    //Constructor
    /**
     * PresenterSlides constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('slides_id', XOBJ_DTYPE_INT);
        $this->initVar('slides_cid', XOBJ_DTYPE_INT);
        $this->initVar('slides_uid', XOBJ_DTYPE_INT);
        $this->initVar('slides_title', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_content', XOBJ_DTYPE_TXTAREA);

        $this->initVar('css_id', XOBJ_DTYPE_TXTBOX);
        $this->initVar('css_class', XOBJ_DTYPE_TXTBOX);

        $this->initVar('slides_transition_x', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_transition_y', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_transition_z', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_rotation_x', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_rotation_y', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_rotation_z', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_scale_x', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_scale_y', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_scale_z', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_created', XOBJ_DTYPE_LTIME);
        $this->initVar('slides_published', XOBJ_DTYPE_LTIME);
        $this->initVar('slides_position', XOBJ_DTYPE_INT);
        $this->initVar('slides_online', XOBJ_DTYPE_INT);
        $this->initVar('slides_type', XOBJ_DTYPE_INT);
        $this->initVar('slides_notes', XOBJ_DTYPE_TXTAREA);
        $this->initVar('slides_mp3', XOBJ_DTYPE_TXTBOX);
        $this->initVar('slides_time', XOBJ_DTYPE_INT);
        $this->initVar('slides_status', XOBJ_DTYPE_INT);
        $this->initVar('slides_waiting', XOBJ_DTYPE_INT);
        $this->initVar('slides_online', XOBJ_DTYPE_INT);

        $this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('dosmiley', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('doxcode', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('doimage', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('dobr', XOBJ_DTYPE_INT, 1, false);
    }

    /**
     * @param bool $action
     * @return XoopsThemeForm
     */
    public function getForm($action = false)
    {
        global $xoopsDB, $xoopsModuleConfig;

        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }

        $title = $this->isNew() ? sprintf(_AM_PRESENTER_SLIDES_ADD) : sprintf(_AM_PRESENTER_SLIDES_EDIT);

        require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');

        // Slides_cid
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_CID, 'slides_cid', 50, 255, $this->getVar('slides_cid')), false);
        // Slides_uid
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_UID, 'slides_uid', 50, 255, $this->getVar('slides_uid')), false);
        // Slides_title
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TITLE, 'slides_title', 50, 255, $this->getVar('slides_title')), true);
        // Slides_content
        $editor_configs           = [];
        $editor_configs['name']   = 'slides_content';
        $editor_configs['value']  = $this->getVar('slides_content', 'e');
        $editor_configs['rows']   = 10;
        $editor_configs['cols']   = 80;
        $editor_configs['width']  = '100%';
        $editor_configs['height'] = '400px';
        $editor_configs['editor'] = $GLOBALS['xoopsModuleConfig']['presenter_editor'];
        $form->addElement(new XoopsFormEditor(_AM_PRESENTER_SLIDES_CONTENT, 'slides_content', $editor_configs), true);

        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_CSS_ID, 'css_id', 50, 255, $this->getVar('css_id')), true);
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_CSS_CLASS, 'css_class', 50, 255, $this->getVar('css_class')), true);

        // Slides_transition_x
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TRANSITION_X, 'slides_transition_x', 50, 255, $this->getVar('slides_transition_x')), false);
        // Slides_transition_y
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TRANSITION_Y, 'slides_transition_y', 50, 255, $this->getVar('slides_transition_y')), false);
        // Slides_transition_z
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TRANSITION_Z, 'slides_transition_z', 50, 255, $this->getVar('slides_transition_z')), false);
        // Slides_rotation_x
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_ROTATION_X, 'slides_rotation_x', 50, 255, $this->getVar('slides_rotation_x')), false);
        // Slides_rotation_y
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_ROTATION_Y, 'slides_rotation_y', 50, 255, $this->getVar('slides_rotation_y')), false);
        // Slides_rotation_z
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_ROTATION_Z, 'slides_rotation_z', 50, 255, $this->getVar('slides_rotation_z')), false);
        // Slides_scale_x
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_SCALE_X, 'slides_scale_x', 50, 255, $this->getVar('slides_scale_x')), false);
        // Slides_scale_y
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_SCALE_Y, 'slides_scale_y', 50, 255, $this->getVar('slides_scale_y')), false);
        // Slides_scale_z
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_SCALE_Z, 'slides_scale_z', 50, 255, $this->getVar('slides_scale_z')), false);
        // Slides_created
        $form->addElement(new XoopsFormTextDateSelect(_AM_PRESENTER_SLIDES_CREATED, 'slides_created', '', $this->getVar('slides_created')));
        // Slides_published
        $form->addElement(new XoopsFormTextDateSelect(_AM_PRESENTER_SLIDES_PUBLISHED, 'slides_published', '', $this->getVar('slides_published')));
        // Slides_position
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_POSITION, 'slides_position', 50, 255, $this->getVar('slides_position')), false);
        // Slides_online
        $slides_online = $this->isNew() ? 0 : $this->getVar('slides_online');
        $form->addElement(new XoopsFormRadioYN(_AM_PRESENTER_SLIDES_ONLINE, 'slides_online', $slides_online), false);
        // Slides_type
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TYPE, 'slides_type', 50, 255, $this->getVar('slides_type')), false);
        // Slides_notes
        $editor_configs           = [];
        $editor_configs['name']   = 'slides_notes';
        $editor_configs['value']  = $this->getVar('slides_notes', 'e');
        $editor_configs['rows']   = 10;
        $editor_configs['cols']   = 80;
        $editor_configs['width']  = '100%';
        $editor_configs['height'] = '400px';
        $editor_configs['editor'] = $GLOBALS['xoopsModuleConfig']['presenter_editor'];
        $form->addElement(new XoopsFormEditor(_AM_PRESENTER_SLIDES_NOTES, 'slides_notes', $editor_configs), false);
        // Slides_mp3
        $form->addElement(new XoopsFormFile(_AM_PRESENTER_SLIDES_MP3, 'slides_mp3', $xoopsModuleConfig['maxsize']), false);
        // Slides_time
        $form->addElement(new XoopsFormText(_AM_PRESENTER_SLIDES_TIME, 'slides_time', 50, 255, $this->getVar('slides_time')), false);
        // Slides_status
        $slides_status       = $this->isNew() ? 0 : $this->getVar('slides_status');
        $check_slides_status = new XoopsFormCheckBox(_AM_PRESENTER_SLIDES_STATUS, 'slides_status', $slides_status);
        $check_slides_status->addOption(1, ' ');
        $form->addElement($check_slides_status);
        // Slides_waiting
        $slides_waiting       = $this->isNew() ? 0 : $this->getVar('slides_waiting');
        $check_slides_waiting = new XoopsFormCheckBox(_AM_PRESENTER_SLIDES_WAITING, 'slides_waiting', $slides_waiting);
        $check_slides_waiting->addOption(1, ' ');
        $form->addElement($check_slides_waiting);
        // Slides_online
        $slides_online       = $this->isNew() ? 0 : $this->getVar('slides_online');
        $check_slides_online = new XoopsFormCheckBox(_AM_PRESENTER_SLIDES_ONLINE, 'slides_online', $slides_online);
        $check_slides_online->addOption(1, ' ');
        $form->addElement($check_slides_online);

        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * Class PresenterSlidesHandler
 */
class PresenterSlidesHandler extends XoopsPersistableObjectHandler
{
    /**
     * PresenterSlidesHandler constructor.
     * @param XoopsDatabase $db
     */
    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'presenter_slides', 'presenterslides', 'slides_id', 'slides_cid');
    }
}
