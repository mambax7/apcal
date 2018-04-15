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
 * @author       GIJ=CHECKMATE (PEAK Corp. http://www.peak.ne.jp/)
 */

use Xmf\Request;
use XoopsModules\Apcal;

require_once __DIR__ . '/admin_header.php';
//require_once  dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
//require_once __DIR__ . '/mygrouppermform.php';

// for "Duplicatable"
$moduleDirName = basename(dirname(__DIR__));
if (!preg_match('/^(\D+)(\d*)$/', $moduleDirName, $regs)) {
    echo('invalid dirname: ' . htmlspecialchars($moduleDirName, ENT_QUOTES | ENT_HTML5));
}
$mydirnumber = '' === $regs[2] ? '' : (int)$regs[2];

//require_once XOOPS_ROOT_PATH . "/modules/$moduleDirName/include/gtickets.php";

// the names of tables
$cat_table = $GLOBALS['xoopsDB']->prefix("apcal{$mydirnumber}_cat");

// language files

xoops_loadLanguage('admin', 'system');

//if (!file_exists(XOOPS_ROOT_PATH . "/modules/system/language/$language/admin/blocksadmin.php")) {
//    $language = 'english';
//}
//require_once XOOPS_ROOT_PATH . "/modules/system/language/$language/admin.php";
$language = $xoopsConfig['language'];

if (Request::hasVar('submit', 'POST')) {

    // Ticket Check
//    if (!$GLOBALS['xoopsSecurity']->check(true, false, 'myblocksadmin')) {
//if (!$GLOBALS['xoopsSecurity']->check(true, REQUEST['myblocksadmin'])) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header(XOOPS_URL . '/', 3, $GLOBALS['xoopsSecurity']->getErrors());
    }

    include __DIR__ . '/mygroupperm.php';
    redirect_header(XOOPS_URL . "/modules/$moduleDirName/admin/cat2groupperm.php", 1, _AM_APCALAM_APCALDBUPDATED);
}

// creating Objects of XOOPS
$myts    = \MyTextSanitizer::getInstance();
$cattree = new \XoopsModules\Apcal\Tree($cat_table, 'cid', 'pid');
$form    = new \XoopsModules\Apcal\GroupPermForm(_AM_APCAL_MENU_CAT2GROUP, $xoopsModule->mid(), 'apcal_cat', _AM_APCAL_CAT2GROUPDESC);

$cat_tree_array = $cattree->getChildTreeArray(0, 'weight ASC,cat_title');

foreach ($cat_tree_array as $cat) {
    $form->addItem((int)$cat['cid'], $myts->htmlSpecialChars($cat['cat_title']), (int)$cat['pid']);
}

xoops_cp_header();
$adminObject->displayNavigation(basename(__FILE__));
echo $form->render();

require_once __DIR__ . '/admin_footer.php';
