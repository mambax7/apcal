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

use XoopsModules\Apcal;

require dirname(__DIR__) . '/preloads/autoloader.php';

/** @var \XoopsModules\Apcal\Helper $helper */
$helper = \XoopsModules\Apcal\Helper::getInstance();

$pathIcon32 = \Xmf\Module\Admin::menuIconPath('');
if (is_object($helper->getModule())) {
    $pathModIcon32 = $helper->getModule()->getInfo('modicons32');
}

$adminmenu[] = [
    'title' => _MI_APCAL_INDEX,
    'link'  => 'admin/index.php',
    'icon'  => 'assets/images/admin/home.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU0,
    'link'  => 'admin/admission.php',
    'icon'  => 'assets/images/admin/admitting.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU1,
    'link'  => 'admin/events.php',
    'icon'  => 'assets/images/admin/events.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU_CAT,
    'link'  => 'admin/categories.php',
    'icon'  => 'assets/images/admin/category.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU_CAT2GROUP,
    'link'  => 'admin/cat2groupperm.php',
    'icon'  => 'assets/images/admin/permissions.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU2,
    'link'  => 'admin/groupperm.php',
    'icon'  => 'assets/images/admin/permissions.png',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU_MYBLOCKSADMIN,
    'link'  => 'admin/myblocksadmin.php',
];

$adminmenu[] = [
    'title' => _MI_APCAL_ADMENU_ICAL,
    'link'  => 'admin/icalendar_import.php',
    'icon'  => 'assets/images/admin/import.png',
];

//$adminmenu[] = [
//'title' =>  _MI_APCAL_ADMENU_TM,
//'link' =>  "admin/maintenance.php",
//];

//$adminmenu[] = [
//'title' =>  _MI_APCAL_ADMENU_PLUGINS,
//'link' =>  "admin/pluginsmanager.php",
//];
//
//$adminmenu[] = [
//'title' =>  _MI_APCAL_ADMENU_MYTPLSADMIN,
//'link' =>  "admin/mytplsadmin.php",
//];
//

//
//$adminmenu[] = [
//'title' =>  _PREFERENCES,
//'link' => showmod",
//];

$adminmenu[] = [
    'title' => _MI_APCAL_ABOUT,
    'link'  => 'admin/about.php',
    'icon'  => $pathIcon32 . '/about.png',
];
