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
$admin_mydirname = basename(dirname(__DIR__));

$fct = empty($_POST['fct']) ? '' : trim($_POST['fct']);
$fct = empty($_GET['fct']) ? $fct : trim($_GET['fct']);
if (empty($fct)) {
    $fct = 'preferences';
}
//if (isset($fct) && $fct == "users") {
//  $xoopsOption['pagetype'] = "user";
//}
require dirname(dirname(dirname(__DIR__))) . '/mainfile.php';
require XOOPS_ROOT_PATH . '/include/cp_functions.php';

require_once XOOPS_ROOT_PATH . '/kernel/module.php';
//require_once  dirname(__DIR__) . '/include/gtickets.php';// GIJ

$admintest = 0;

if (is_object($xoopsUser)) {
    $xoopsModule = XoopsModule::getByDirname('system');
    if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
        redirect_header(XOOPS_URL . '/user.php', 3, _NOPERM);
    }
    if (!\Xmf\Request::hasVar('mod', 'GET')) {
        $_GET['mod'] = XoopsModule::getByDirname('apcal')->mid();
    }
    $admintest = 1;
} else {
    redirect_header(XOOPS_URL . '/user.php', 3, _NOPERM);
}

// include system category definitions
require_once XOOPS_ROOT_PATH . '/modules/system/constants.php';
$error = false;
if (0 != $admintest) {
    if (isset($fct) && '' !== $fct) {
        if (file_exists(XOOPS_ROOT_PATH . '/modules/system/admin/' . $fct . '/xoops_version.php')) {
            xoops_loadLanguage('admin', 'system');
            xoops_loadLanguage('admin/' . $fct, 'system');

            require XOOPS_ROOT_PATH . '/modules/system/admin/' . $fct . '/xoops_version.php';
            $grouppermHandler = xoops_getHandler('groupperm');
            $category         = !empty($modversion['category']) ? (int)$modversion['category'] : 0;
            unset($modversion);
            if ($category > 0) {
                $groups = &$xoopsUser->getGroups();
                if (in_array(XOOPS_GROUP_ADMIN, $groups)
                    || false !== $grouppermHandler->checkRight('system_admin', $category, $groups, $xoopsModule->getVar('mid'))) {
                    //                  if (file_exists(XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/main.php")) {
                    //                      require_once XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/main.php"; GIJ
                    if (file_exists("../include/{$fct}.inc.php")) {
                        require_once __DIR__ . "/../include/{$fct}.inc.php";
                    } else {
                        $error = true;
                    }
                } else {
                    $error = true;
                }
            } elseif ('version' === $fct) {
                if (file_exists(XOOPS_ROOT_PATH . '/modules/system/admin/version/main.php')) {
                    require_once XOOPS_ROOT_PATH . '/modules/system/admin/version/main.php';
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

if (false !== $error) {
    xoops_cp_header();
    echo '<h4>System Configuration</h4>';
    echo '<table class="outer" cellpadding="4" cellspacing="1">';
    echo '<tr>';
    $groups = &$xoopsUser->getGroups();
    $all_ok = false;
    if (!in_array(XOOPS_GROUP_ADMIN, $groups)) {
        $grouppermHandler = xoops_getHandler('groupperm');
        $ok_syscats       = $grouppermHandler->getItemIds('system_admin', $groups);
    } else {
        $all_ok = true;
    }
    $admin_dir = XOOPS_ROOT_PATH . '/modules/system/admin';
    $handle    = opendir($admin_dir);
    $counter   = 0;
    $class     = 'even';
    while ($file = readdir($handle)) {
        if ('cvs' !== mb_strtolower($file) && !preg_match('/[.]/', $file) && is_dir($admin_dir . '/' . $file)) {
            require_once $admin_dir . '/' . $file . '/xoops_version.php';
            if ($modversion['hasAdmin']) {
                $category = isset($modversion['category']) ? (int)$modversion['category'] : 0;
                if (false !== $all_ok || in_array($modversion['category'], $ok_syscats)) {
                    echo "<td class='$class' align='center' valign='bottom' width='19%'>";
                    echo "<a href='" . XOOPS_URL . '/modules/system/admin.php?fct=' . $file . "'><b>" . trim($modversion['name']) . "</b></a>\n";
                    echo '</td>';
                    ++$counter;
                    $class = ('even' === $class) ? 'odd' : 'even';
                }
                if ($counter > 4) {
                    $counter = 0;
                    echo '</tr>';
                    echo '<tr>';
                }
            }
            unset($modversion);
        }
    }
    while ($counter < 5) {
        echo '<td class="' . $class . '">&nbsp;</td>';
        $class = ('even' === $class) ? 'odd' : 'even';
        ++$counter;
    }
    echo '</tr></table>';
    xoops_cp_footer();
}
