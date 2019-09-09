<?php

if (defined('FOR_XOOPS_LANG_CHECKER') || !defined('APCAL_MI_LOADED')) {
    // Appended by Xoops Language Checker -GIJOE- in 2006-02-15 05:31:20
    define('_MI_APCAL_ADMENU_MYTPLSADMIN', 'Templates');

    define('APCAL_MI_LOADED', 1);

    // Module Info

    // The name of this module

    define('_MI_APCAL_ADMENU_MYBLOCKSADMIN', '�϶��P�s�պ޲z');
    define('_MI_APCAL_NAME', 'APCal��ƾ�');

    // A brief description of this module
    define('_MI_APCAL_DESC', "�㦳�h�\�઺��ƾ�Ҳ�");

    // Names of blocks for this module (Not all module has blocks)
    define('_MI_APCAL_BNAME_MINICAL', '�g�A���');
    define('_MI_APCAL_BNAME_MINICAL_DESC', '��ܰg�A���϶�');
    define('_MI_APCAL_BNAME_MINICALEX', '�i���p���');
    define('_MI_APCAL_BNAME_MINICALEX_DESC', '�i�H�f�t plugin ���p���');
    define('_MI_APCAL_BNAME_MONTHCAL', '���');
    define('_MI_APCAL_BNAME_MONTHCAL_DESC', '��ܧ��㪺���');
    define('_MI_APCAL_BNAME_TODAYS', '����ƥ�');
    define('_MI_APCAL_BNAME_TODAYS_DESC', '��ܤ��Ѫ��ƥ�');
    define('_MI_APCAL_BNAME_THEDAYS', '%s ���ƥ�');
    define('_MI_APCAL_BNAME_THEDAYS_DESC', '��ܫ��X������ƥ�');
    define('_MI_APCAL_BNAME_COMING', '����ƥ�');
    define('_MI_APCAL_BNAME_COMING_DESC', '��ܪ�����ƥ�');
    define('_MI_APCAL_BNAME_AFTER', '����H��ƥ�');
    define('_MI_APCAL_BNAME_AFTER_DESC', '��ܤ���H�᪺�ƥ�');

    // Names of submenu
    define('_MI_APCAL_SM_SUBMIT', '�s�W');

    //define("_MI_APCAL_ADMENU1","");

    // Title of config items
    define('_MI_USERS_AUTHORITY', '�Τ��v��');
    define('_MI_GUESTS_AUTHORITY', '�X���v��');
    define('_MI_MINICAL_TARGET', '���I��g�A��ƾ�ɩҭn��ܦb�e����������ƾ�');
    define('_MI_COMING_NUMROWS', '�b����ƥ�϶���ܨƥ󪺼ƥ�');
    define('_MI_SKINFOLDER', '��ƾ�˦�����Ƨ��W�� (images�ؿ���)');
    define('_MI_APCAL_DEFAULTLOCALE', 'big5_taiwan');
    define('_MI_APCAL_LOCALE', '�a��]�w <br />�N�۰ʱa�J��a�Ұ���A�x�W�w���ئ�2010�~������P�A�䰲��');
    define('_MI_SUNDAYCOLOR', '�P���骺�C��');
    define('_MI_WEEKDAYCOLOR', '���骺�C��');
    define('_MI_SATURDAYCOLOR', '�P�������C��');
    define('_MI_HOLIDAYCOLOR', '���骺�C��');
    define('_MI_TARGETDAYCOLOR', '�w�w�骺�C��');
    define('_MI_SUNDAYBGCOLOR', '�P���骺�I���C��');
    define('_MI_WEEKDAYBGCOLOR', '���骺�C��');
    define('_MI_SATURDAYBGCOLOR', '�P�������I���C��');
    define('_MI_HOLIDAYBGCOLOR', '���骺�I���C��');
    define('_MI_TARGETDAYBGCOLOR', '�w�w�骺�I���C��');
    define('_MI_CALHEADCOLOR', '��ƾ�D�D�������C��');
    define('_MI_CALHEADBGCOLOR', '��ƾ�D�D�������I���C��');
    define('_MI_CALFRAMECSS', '��ƾ�������˦�');
    define('_MI_CANOUTPUTICS', '�ץX ics �ɮת��v��');
    define('_MI_MAXRRULEEXTRACT', '���ƨƥ�i�}�W����.');
    define('_MI_WEEKSTARTFROM', '�C�g���Ĥ@�ѬO');
    define('_MI_TIMEZONE_USING', '���A�����ɰϫ��w');
    define('_MI_USE24HOUR', '�O�_�ϥ�24�p�ɨ� (�p��ܧ_�N�۰ʥH12�p�ɨ�)');
    define('_MI_NAMEORUNAME', '��ܵo��̦W');
    define('_MI_DESCNAMEORUNAME', '�п����ܱb���άO�u��m�W(�ʺ�)');

    // Description of each config items
    define('_MI_EDITBYGUESTDSC', '�X�ȷs�W�ƥ��v��');

    // Options of each config items
    define('_MI_OPT_AUTH_NONE', '�L�k�s�W�ƥ�');
    define('_MI_OPT_AUTH_WAIT', '�i�H�s�W�ƥ�åB�ݭn�f��');
    define('_MI_OPT_AUTH_POST', '�i�H�s�W�ƥ�����ݭn�f��');
    define('_MI_OPT_AUTH_BYGROUP', '�̷Ӹs���v���]�w');
    define('_MI_OPT_MINI_PHPSELF', '�ثe����');
    define('_MI_OPT_MINI_MONTHLY', '���ƾ�');
    define('_MI_OPT_MINI_WEEKLY', '�g��ƾ�');
    define('_MI_OPT_MINI_DAILY', '���ƾ�');
    define('_MI_OPT_CANNOTOUTPUTICS', '�i�H�ץX');
    define('_MI_OPT_CANOUTPUTICS', '�L�k�ץX');
    define('_MI_OPT_STARTFROMSUN', '�P����');
    define('_MI_OPT_STARTFROMMON', '�P���@');
    define('_MI_OPT_TZ_USEXOOPS', 'XOOPS���w�]��');
    define('_MI_OPT_TZ_USEWINTER', '�Ѧ��A�����o���V�O�ɶ� (����)');
    define('_MI_OPT_TZ_USESUMMER', '�Ѧ��A�����o���L�O�ɶ�');
    define('_MI_OPT_USENAME', '�u��m�W');
    define('_MI_OPT_USEUNAME', '�n�J�b��');

    // Admin Menus
    define('_MI_APCAL_ADMENU0', '�ݼf�ƥ��');
    define('_MI_APCAL_ADMENU1', '�ƥ�޲z��');
    define('_MI_APCAL_ADMENU2', '�s���v���޲z');
    define('_MI_APCAL_ADMENU_PLUGINS', 'Plugin�޲z��');

    // Appended by Xoops Language Checker -GIJOE- in 2003-12-05 14:18:43

    // Appended by Xoops Language Checker -GIJOE- in 2003-12-26 10:55:16
    define('_MI_DAYSTARTFROM', '�����@�骺�ɶ�');
    define('_MI_APCAL_GLOBAL_NOTIFY', '�Ҳվ���');
    define('_MI_APCAL_GLOBAL_NOTIFYDSC', '�Ҧ� APCal �Ҳժ��q���ﶵ');
    define('_MI_APCAL_CATEGORY_NOTIFY', '���O');
    define('_MI_APCAL_CATEGORY_NOTIFYDSC', '�w��ҿ�����O���q���ﶵ');
    define('_MI_APCAL_EVENT_NOTIFY', '�ƥ�');
    define('_MI_APCAL_EVENT_NOTIFYDSC', '�w����ܤ����ƥ�q���ﶵ');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFY', '�s�ƥ�q��');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYCAP', '���s�W�ƥ�ɪ��q���ﶵ');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYDSC', '���s�W�ƥ�ɪ��q���ﶵ');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} �G���s�W���ƥ��I');

    // Appended by Xoops Language Checker -GIJOE- in 2004-01-14 18:31:01
    define('_MI_APCAL_BNAME_NEW', '�s���ƥ�');
    define('_MI_APCAL_BNAME_NEW_DESC', '��ܷs�W���ƥ�');
    define('_MI_DEFAULT_VIEW', '�w�]�������ܵe��');
    define('_MI_WEEKNUMBERING', '�g�O�p��覡');
    define('_MI_OPT_MINI_LIST', '�ƥ�@��');
    define('_MI_OPT_WEEKNOEACHMONTH', '�H�C��p��');
    define('_MI_OPT_WEEKNOWHOLEYEAR', '�H��~�p��');
    define('_MI_APCAL_ADMENU_CAT', '���O�޲z');
    define('_MI_APCAL_ADMENU_CAT2GROUP', '���O���s���v��');
    define('_MI_APCAL_ADMENU_TM', '�ɰϺ��@');
    define('_MI_APCAL_ADMENU_ICAL', '�פJiCalendar');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFY', '�C�����O�̪��s�W�ƥ�');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYCAP', '�b�o�����O�̦��s�W�ƥ�ɪ��q��');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYDSC', '�b�o�����O�̦��s�W�ƥ�ɪ��q��');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} �G ���s���ƥ�');
}
