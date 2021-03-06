<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    {@link https://xoops.org/ XOOPS Project}
 * @license      {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @package
 * @since
 * @author       XOOPS Development Team,
 * @author       Antiques Promotion (http://www.antiquespromotion.ca)
 * @author       GIJ=CHECKMATE (PEAK Corp. http://www.peak.ne.jp/)
 */
require_once dirname(dirname(__DIR__)) . '/mainfile.php';

require XOOPS_ROOT_PATH . '/header.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

$tpl        = new \XoopsTpl();
$form       = new \XoopsThemeForm(_APCAL_SHARECALENDARFORM, 'calendar', '', 'post', true);
$formCustom = new \XoopsThemeForm(_APCAL_IFCUSTOM, 'custom', '', 'post', true);

$catSelect = new \XoopsFormSelect(_APCAL_CATEGORIES, 'c', 0);
$catSelect->addOptionArray(getCategories());

$styleSelect = new \XoopsFormRadio(_APCAL_STYLE, 't', 'default');
$styleSelect->addOption('default', _APCAL_DEFAULT);
$styleSelect->addOption('theme', _APCAL_THEME);
$styleSelect->addOption('custom', _APCAL_CUSTOM);
$styleSelect->setExtra('onclick="showCustomSettings();"');

$unitSelect = new \XoopsFormSelect('', 'u', '%');
$unitSelect->addOption('%', '%');
$unitSelect->addOption('px', 'px');
$unitSelect->addOption('em', 'em');

$wTray = new \XoopsFormElementTray(_APCAL_WIDTH);
$wTray->addElement(new \XoopsFormText('', 'w', 10, 7, '100'), true);
$wTray->addElement($unitSelect);

$generateButton = new \XoopsFormButton(_APCAL_GENERATEHINT, 'generate', _APCAL_GENERATE, 'submit');
$generateButton->setExtra('onclick="showHTMLCode();return false;"');

$form->addElement(new \XoopsFormText(_APCAL_TITLE, 'h', 30, 60, $xoopsModule->getVar('name')), true);
$form->addElement($catSelect, true);
$form->addElement(new \XoopsFormText(_APCAL_NBEVENTS, 'n', 5, 3, '10'), true);
$form->addElement($wTray, true);
$form->addElement($styleSelect, true);
//$form->insertBreak('');
//$form->insertBreak(_APCAL_IFCUSTOM);
//$form->insertBreak('');
$formCustom->addElement(new \XoopsFormText(_APCAL_BORDER, 'APborder', 60, 255, 'border: 3px double #000000;'), false);
$formCustom->addElement(new \XoopsFormText(_APCAL_TITLE, 'APtitle', 60, 255, 'color: #000000; font-size: 1.3em;'), false);
$formCustom->addElement(new \XoopsFormText(_APCAL_TEXT, 'APtext', 60, 255, 'color: #000000; font-size: 1.0em;'), false);
$formCustom->addElement(new \XoopsFormText(_APCAL_LINK, 'APlink', 60, 255, 'color: #0000FF; text-decoration: none;'), false);
$formCustom->addElement(new \XoopsFormText(_APCAL_EVEN, 'APeven', 60, 255, 'background-color: #F2F2F2;'), false);
$formCustom->addElement(new \XoopsFormText(_APCAL_ODD, 'APodd', 60, 255, 'background-color: #EBEBEB;'), false);
$form->addElement($generateButton, false);

$form->display();
echo '<div id="customSettings" style="display: none;">';
$formCustom->display();
echo '</div>';
echo '<br>' . _APCAL_SHAREINFO . '<br>';
echo '<div id="htmlCode"></div>';
echo $tpl->fetch(XOOPS_ROOT_PATH . '/modules/apcal/templates/shareCalendar.tpl');

require XOOPS_ROOT_PATH . '/footer.php';

/**
 * @return array
 */
function getCategories()
{
    global $xoopsDB;

    $cats   = [0 => _APCAL_SHOWALLCAT];
    $result = $GLOBALS['xoopsDB']->queryF("SELECT cid, cat_title, cat_depth FROM {$GLOBALS['xoopsDB']->prefix('apcal_cat')} ORDER BY weight");

    while ($cat = $GLOBALS['xoopsDB']->fetchObject($result)) {
        $depth_desc      = str_repeat('-', (int)$cat->cat_depth);
        $title           = htmlspecialchars($cat->cat_title, ENT_QUOTES);
        $cats[$cat->cid] = "$depth_desc $title";
    }

    return $cats;
}
