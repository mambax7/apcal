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
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @package      AM Reviews
 * @since
 * @author       XOOPS Development Team, GIJ=CHECKMATE (PEAK Corp. http://www.peak.ne.jp/)
 */
require dirname(dirname(__DIR__)) . '/mainfile.php';
require_once XOOPS_ROOT_PATH . '/class/template.php';

    $moduleDirName = basename(__DIR__);
/** @var \XoopsModules\Apcal\Helper $helper */
$helper = \XoopsModules\Apcal\Helper::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new \XoopsTpl();
}

$xoopsTpl = new \XoopsTpl();
//$xoopsTpl->assign('api_key', $helper->getConfig('apcal_mapsapi'));
$xoopsTpl->assign('api_key', 'AIzaSyCklIni2Jw-tZbCL-j8HGvypjSqAIjfKpE');
$xoopsTpl->display('db:apcal_getCoords.tpl');
