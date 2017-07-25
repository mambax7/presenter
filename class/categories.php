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

class PresenterCategories extends XoopsObject
{
    //Constructor
    /**
     * PresenterCategories constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('cat_id', XOBJ_DTYPE_INT);
        $this->initVar('cat_pid', XOBJ_DTYPE_INT);
        $this->initVar('cat_title', XOBJ_DTYPE_TXTBOX);
        $this->initVar('cat_desc', XOBJ_DTYPE_TXTAREA);
        $this->initVar('cat_image', XOBJ_DTYPE_TXTBOX);
        $this->initVar('cat_weight', XOBJ_DTYPE_INT);
        //      $this->initVar('cat_color', XOBJ_DTYPE_TXTBOX);

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

        $title = $this->isNew() ? sprintf(_AM_PRESENTER_CAT_ADD) : sprintf(_AM_PRESENTER_CAT_EDIT);

        require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');

        // Cat_pid
        require_once XOOPS_ROOT_PATH . '/class/tree.php';
        $categoriesHandler = xoops_getModuleHandler('categories', 'presenter');
        $criteria          = new CriteriaCompo();
        $categories        = $categoriesHandler->getObjects($criteria);
        if ($categories) {
            $categories_tree = new XoopsObjectTree($categories, 'cat_id', 'cat_pid');
            $cat_pid         = $categories_tree->makeSelBox('cat_pid', 'cat_title', '--', $this->getVar('cat_pid', 'e'), false);
            $form->addElement(new XoopsFormLabel(_AM_PRESENTER_CAT_PID, $cat_pid));
        }
        // Cat_title
        $form->addElement(new XoopsFormText(_AM_PRESENTER_CAT_TITLE, 'cat_title', 50, 255, $this->getVar('cat_title')), true);
        // Cat_desc
        $form->addElement(new XoopsFormTextArea(_AM_PRESENTER_CAT_DESC, 'cat_desc', $this->getVar('cat_desc'), 4, 47), true);
        // Cat_image
        $cat_image = $this->getVar('cat_image') ? $this->getVar('cat_image') : 'blank.gif';

        $uploadir    = '/uploads/presenter/images/categories';
        $imgtray     = new XoopsFormElementTray(_AM_PRESENTER_CAT_IMAGE, '<br>');
        $imgpath     = sprintf(_AM_PRESENTER_FORMIMAGE_PATH, $uploadir);
        $imageselect = new XoopsFormSelect($imgpath, 'cat_image', $cat_image);
        $image_array = XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH . $uploadir);
        foreach ($image_array as $image) {
            $imageselect->addOption("{$image}", $image);
        }
        $imageselect->setExtra("onchange='showImgSelected(\"image_cat_image\", \"cat_image\", \"" . $uploadir . "\", \"\", \"" . XOOPS_URL . "\")'");
        $imgtray->addElement($imageselect);
        $imgtray->addElement(new XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $uploadir . '/' . $cat_image . "' name='image_cat_image' id='image_cat_image' alt=''>"));
        $fileseltray = new XoopsFormElementTray('', '<br>');
        $fileseltray->addElement(new XoopsFormFile(_AM_PRESENTER_FORMUPLOAD, 'cat_image', $xoopsModuleConfig['maxsize']));
        $fileseltray->addElement(new XoopsFormLabel(''));
        $imgtray->addElement($fileseltray);
        $form->addElement($imgtray);
        // Cat_weight
        $form->addElement(new XoopsFormText(_AM_PRESENTER_CAT_WEIGHT, 'cat_weight', 50, 255, $this->getVar('cat_weight')), false);
        // Cat_color
        //      $form->addElement(new XoopsFormColorPicker(_AM_PRESENTER_CAT_COLOR, 'cat_color', $this->getVar('cat_color')), false);

        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * Class PresenterCategoriesHandler
 */
class PresenterCategoriesHandler extends XoopsPersistableObjectHandler
{
    /**
     * PresenterCategoriesHandler constructor.
     * @param XoopsDatabase $db
     */
    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'presenter_categories', 'PresenterCategories', 'cat_id', 'cat_title');
    }
}
