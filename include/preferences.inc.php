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
 * @author       Antiques Promotion (http://www.antiquespromotion.ca)
 */
$configHandler = xoops_getHandler('config');

if (!is_object($xoopsUser) || !is_object($xoopsModule) || !$xoopsUser->isAdmin($xoopsModule->mid())) {
    exit('Access Denied');
}
$op = \Xmf\Request::getCmd('op', 'list');

if (\Xmf\Request::hasVar('confcat_id', 'GET')) {
    $confcat_id = \Xmf\Request::getInt('confcat_id', 0, 'GET');
}

if ('showmod' === $op) {
    $mod = \Xmf\Request::getInt('mod', 0, 'GET');
    if (empty($mod)) {
        header('Location: admin.php?fct=preferences');
        exit();
    }
    $config = $configHandler->getConfigs(new \Criteria('conf_modid', $mod));
    $count  = count($config);
    if ($count < 1) {
        redirect_header('admin.php?fct=preferences', 1);
    }
    require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
    $form = new \XoopsThemeForm(_MD_APCAL_MODCONFIG, 'pref_form', 'admin.php?fct=preferences', 'post', true);
    /** @var \XoopsModuleHandler $moduleHandler */
    $moduleHandler = xoops_getHandler('module');
    $module        = $moduleHandler->get($mod);
    //        if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $module->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
    //            require_once XOOPS_ROOT_PATH . '/modules/' . $module->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php';
    //        }
    xoops_loadLanguage('modinfo', basename(dirname(__DIR__)));

    // if has comments feature, need comment lang file
    if (1 == $module->getVar('hascomments')) {
        require_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/comment.php';
    }
    // RMV-NOTIFY
    // if has notification feature, need notification lang file
    if (1 == $module->getVar('hasnotification')) {
        require_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/notification.php';
    }

    $modname    = $module->getVar('name');
    $buttonTray = new \XoopsFormElementTray('');
    if ($module->getInfo('adminindex')) {
        //      $form->addElement(new \XoopsFormHidden('redirect', XOOPS_URL.'/modules/'.$module->getVar('dirname').'/'.$module->getInfo('adminindex')));
        $buttonTray->addElement(new \XoopsFormHidden('redirect', XOOPS_URL . '/modules/' . $module->getVar('dirname') . '/admin/admin.php?fct=preferences&op=showmod&mod=' . $module->getVar('mid'))); // GIJ Patch
    }
    for ($i = 0; $i < $count; ++$i) {
        $title4tray = (!defined($config[$i]->getVar('conf_desc'))
                       || '' === constant($config[$i]->getVar('conf_desc'))) ? constant($config[$i]->getVar('conf_title')) : constant($config[$i]->getVar('conf_title')) . '<br><br><span style="font-weight:normal;">' . constant($config[$i]->getVar('conf_desc')) . '</span>'; // GIJ
        $title      = ''; // GIJ
        switch ($config[$i]->getVar('conf_formtype')) {
            case 'textarea':
                $myts = \MyTextSanitizer::getInstance();
                if ('array' === $config[$i]->getVar('conf_valuetype')) {
                    // this is exceptional.. only when value type is arrayneed a smarter way for this
                    $ele = ('' !== $config[$i]->getVar('conf_value')) ? new \XoopsFormTextArea($title, $config[$i]->getVar('conf_name'), $myts->htmlSpecialChars(implode('|', $config[$i]->getConfValueForOutput())), 5, 50) : new \XoopsFormTextArea($title, $config[$i]->getVar('conf_name'), '', 5, 50);
                } else {
                    $ele = new \XoopsFormTextArea($title, $config[$i]->getVar('conf_name'), $myts->htmlSpecialChars($config[$i]->getConfValueForOutput()), 5, 50);
                }
                break;
            case 'select':
                $ele     = new \XoopsFormSelect($title, $config[$i]->getVar('conf_name'), $config[$i]->getConfValueForOutput());
                $options = $configHandler->getConfigOptions(new \Criteria('conf_id', $config[$i]->getVar('conf_id')));
                $opcount = count($options);
                for ($j = 0; $j < $opcount; ++$j) {
                    $optval = defined($options[$j]->getVar('confop_value')) ? constant($options[$j]->getVar('confop_value')) : $options[$j]->getVar('confop_value');
                    $optkey = defined($options[$j]->getVar('confop_name')) ? constant($options[$j]->getVar('confop_name')) : $options[$j]->getVar('confop_name');
                    $ele->addOption($optval, $optkey);
                }
                break;
            case 'select_multi':
                $ele     = new \XoopsFormSelect($title, $config[$i]->getVar('conf_name'), $config[$i]->getConfValueForOutput(), 5, true);
                $options = $configHandler->getConfigOptions(new \Criteria('conf_id', $config[$i]->getVar('conf_id')));
                $opcount = count($options);
                for ($j = 0; $j < $opcount; ++$j) {
                    $optval = defined($options[$j]->getVar('confop_value')) ? constant($options[$j]->getVar('confop_value')) : $options[$j]->getVar('confop_value');
                    $optkey = defined($options[$j]->getVar('confop_name')) ? constant($options[$j]->getVar('confop_name')) : $options[$j]->getVar('confop_name');
                    $ele->addOption($optval, $optkey);
                }
                break;
            case 'yesno':
                $ele = new \XoopsFormRadioYN($title, $config[$i]->getVar('conf_name'), $config[$i]->getConfValueForOutput(), _YES, _NO);
                break;
            case 'group':
                require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
                $ele = new \XoopsFormSelectGroup($title, $config[$i]->getVar('conf_name'), false, $config[$i]->getConfValueForOutput(), 1, false);
                break;
            case 'group_multi':
                require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
                $ele = new \XoopsFormSelectGroup($title, $config[$i]->getVar('conf_name'), false, $config[$i]->getConfValueForOutput(), 5, true);
                break;
            // RMV-NOTIFY: added 'user' and 'user_multi'
            case 'user':
                require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
                $ele = new \XoopsFormSelectUser($title, $config[$i]->getVar('conf_name'), false, $config[$i]->getConfValueForOutput(), 1, false);
                break;
            case 'user_multi':
                require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
                $ele = new \XoopsFormSelectUser($title, $config[$i]->getVar('conf_name'), false, $config[$i]->getConfValueForOutput(), 5, true);
                break;
            case 'password':
                $myts = \MyTextSanitizer::getInstance();
                $ele  = new \XoopsFormPassword($title, $config[$i]->getVar('conf_name'), 50, 255, $myts->htmlSpecialChars($config[$i]->getConfValueForOutput()));
                break;
            case 'color':
                $myts = \MyTextSanitizer::getInstance();
                $ele  = new \XoopsFormColorPicker($title, $config[$i]->getVar('conf_name'), $myts->htmlSpecialChars($config[$i]->getConfValueForOutput()));
                break;
            case 'textbox':
            default:
                $myts = \MyTextSanitizer::getInstance();
                $ele  = new \XoopsFormText($title, $config[$i]->getVar('conf_name'), 50, 255, $myts->htmlSpecialChars($config[$i]->getConfValueForOutput()));
                break;
        }
        $hidden   = new \XoopsFormHidden('conf_ids[]', $config[$i]->getVar('conf_id'));
        $ele_tray = new \XoopsFormElementTray($title4tray, '');
        $ele_tray->addElement($ele);
        $ele_tray->addElement($hidden);
        $form->addElement($ele_tray);
        unset($ele_tray, $ele, $hidden);
    }
    $buttonTray->addElement(new \XoopsFormHidden('op', 'save'));
    //        $xoopsGTicket->addTicketXoopsFormElement($buttonTray, __LINE__, 1800, 'mymenu');
    $buttonTray->addElement(new \XoopsFormButton('', 'button', _GO, 'submit'));
    $form->addElement($buttonTray);
    xoops_cp_header();
    // GIJ patch start
    echo "<h3 style='text-align:left;'>" . $module->getVar('name') . ' &nbsp; ' . _PREFERENCES . "</h3>\n";
    // GIJ patch end
    $form->display();
    xoops_cp_footer();
    exit();
}

if ('save' === $op) {
    //if ( !admin_refcheck("/modules/$admin_mydirname/admin/") ) {
    //  exit('Invalid referer');
    //}
    //        if (!$xoopsGTicket->check(true, 'mymenu')) {
    if (!$GLOBALS['xoopsSecurity']->check(true, \Xmf\Request::hasVar('mymenu'))) {
        redirect_header(XOOPS_URL . '/', 3, $GLOBALS['xoopsSecurity']->getErrors());
    }
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new \XoopsTpl();
    $xoopsTpl->clear_all_cache();
    // regenerate admin menu file
    xoops_module_write_admin_menu(xoops_module_get_admin_menu());
    if (\Xmf\Request::hasVar('conf_ids', 'POST')) {
        $conf_ids = $_POST['conf_ids'];
    }
    $count            = count($conf_ids);
    $tpl_updated      = false;
    $theme_updated    = false;
    $startmod_updated = false;
    $lang_updated     = false;
    if ($count > 0) {
        for ($i = 0; $i < $count; ++$i) {
            $config    = $configHandler->getConfig($conf_ids[$i]);
            $new_value = $_POST[$config->getVar('conf_name')];
            if (is_array($new_value) || $new_value != $config->getVar('conf_value')) {
                // if language has been changed
                if (!$lang_updated && XOOPS_CONF == $config->getVar('conf_catid')
                    && 'language' === $config->getVar('conf_name')) {
                    // regenerate admin menu file
                    $xoopsConfig['language'] = $_POST[$config->getVar('conf_name')];
                    xoops_module_write_admin_menu(xoops_module_get_admin_menu());
                    $lang_updated = true;
                }

                // if default theme has been changed
                if (!$theme_updated && XOOPS_CONF == $config->getVar('conf_catid')
                    && 'theme_set' === $config->getVar('conf_name')) {
                    $memberHandler = xoops_getHandler('member');
                    $memberHandler->updateUsersByField('theme', $_POST[$config->getVar('conf_name')]);
                    $theme_updated = true;
                }

                // if default template set has been changed
                if (!$tpl_updated && XOOPS_CONF == $config->getVar('conf_catid')
                    && 'template_set' === $config->getVar('conf_name')) {
                    // clear cached/compiled files and regenerate them if default theme has been changed
                    if ($xoopsConfig['template_set'] != $_POST[$config->getVar('conf_name')]) {
                        $newtplset = $_POST[$config->getVar('conf_name')];

                        // clear all compiled and cachedfiles
                        $xoopsTpl->clear_compiled_tpl();

                        // generate compiled files for the new theme
                        // block files only for now..
                        $tplfileHandler = xoops_getHandler('tplfile');
                        $dtemplates     = $tplfileHandler->find('default', 'block');
                        $dcount         = count($dtemplates);

                        // need to do this to pass to xoops_template_touch function
                        $GLOBALS['xoopsConfig']['template_set'] = $newtplset;

                        for ($j = 0; $j < $dcount; ++$j) {
                            $found = $tplfileHandler->find($newtplset, 'block', $dtemplates[$j]->getVar('tpl_refid'), null);
                            if (count($found) > 0) {
                                // template for the new theme found, compile it
                                xoops_template_touch($found[0]->getVar('tpl_id'));
                            } else {
                                // not found, so compile 'default' template file
                                xoops_template_touch($dtemplates[$j]->getVar('tpl_id'));
                            }
                        }

                        // generate image cache files from image binary data, save them under cache/
                        $imageHandler = xoops_getHandler('imagesetimg');
                        $imagefiles   = $imageHandler->getObjects(new \Criteria('tplset_name', $newtplset), true);
                        foreach (array_keys($imagefiles) as $j) {
                            if (!$fp = fopen(XOOPS_CACHE_PATH . '/' . $newtplset . '_' . $imagefiles[$j]->getVar('imgsetimg_file'), 'wb')) {
                            } else {
                                fwrite($fp, $imagefiles[$j]->getVar('imgsetimg_body'));
                                fclose($fp);
                            }
                        }
                    }
                    $tpl_updated = true;
                }

                // add read permission for the start module to all groups
                if (!$startmod_updated && '--' != $new_value && XOOPS_CONF == $config->getVar('conf_catid')
                    && 'startpage' === $config->getVar('conf_name')) {
                    $memberHandler    = xoops_getHandler('member');
                    $groups           = $memberHandler->getGroupList();
                    $grouppermHandler = xoops_getHandler('groupperm');
                    /** @var \XoopsModuleHandler $moduleHandler */
                    $moduleHandler = xoops_getHandler('module');
                    $module        = $moduleHandler->getByDirname($new_value);
                    foreach ($groups as $groupid => $groupname) {
                        if (!$grouppermHandler->checkRight('module_read', $module->getVar('mid'), $groupid)) {
                            $grouppermHandler->addRight('module_read', $module->getVar('mid'), $groupid);
                        }
                    }
                    $startmod_updated = true;
                }

                $config->setConfValueForInput($new_value);
                $configHandler->insertConfig($config);
            }
            unset($new_value);
        }
    }
    /* if (!empty($_POST['use_mysession']) && $xoopsConfig['use_mysession'] == 0 && $_POST['session_name'] != '') {
        setcookie($_POST['session_name'], session_id(), time()+(60*(int)($_POST['session_expire'])), '/',  '', 0);
    } */
    if (\Xmf\Request::hasVar('redirect', 'POST')) {
        redirect_header($_POST['redirect'], 2, _MD_APCAL_DBUPDATED);
    } else {
        redirect_header('admin.php?fct=preferences', 2, _MD_APCAL_DBUPDATED);
    }
}
