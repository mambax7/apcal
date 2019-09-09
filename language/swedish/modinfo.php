<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'APCAL_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2006-02-15 05:31:21
define('_MI_APCAL_ADMENU_MYTPLSADMIN','Templates');

// Appended by Xoops Language Checker -GIJOE- in 2005-05-06 18:04:00
define('_MI_TIMEZONE_USING','Timezone of the server');
define('_MI_OPT_TZ_USEXOOPS','value of XOOPS config');
define('_MI_OPT_TZ_USEWINTER','value told from the server as winter time (recommended)');
define('_MI_OPT_TZ_USESUMMER','value told from the server as summer time');

// Appended by Xoops Language Checker -GIJOE- in 2005-05-03 05:31:13
define('_MI_USE24HOUR','24hours system (No means 12hours system)');
define('_MI_APCAL_ADMENU_PLUGINS','Plugins Manager');

// Appended by Xoops Language Checker -GIJOE- in 2005-04-22 12:02:02
define('_MI_APCAL_BNAME_MINICALEX','MiniCalendarEx');
define('_MI_APCAL_BNAME_MINICALEX_DESC','Utbyggbar Minikalender med plugin system');

// Appended by Xoops Language Checker -GIJOE- in 2005-01-08 04:36:50
define('_MI_APCAL_DEFAULTLOCALE','');
define('_MI_APCAL_LOCALE','Locale (kontrollera filer i locales/*.php)');

define( 'APCAL_MI_LOADED' , 1 ) ;

// Module Info

// The name of this module

// Appended by Xoops Language Checker -GIJOE- in 2004-06-22 18:39:03
define('_MI_APCAL_ADMENU_MYBLOCKSADMIN','Block&Grupp Admin');

define('_MI_APCAL_NAME', 'APCal');

// A brief description of this module
define('_MI_APCAL_DESC', 'Kalender modul med schema');

// Names of blocks for this module (Not all module has blocks)
define('_MI_APCAL_BNAME_MINICAL', 'Minikalender');
define('_MI_APCAL_BNAME_MINICAL_DESC', 'Visa Minikalender block');
    define('_MI_APCAL_BNAME_MONTHCAL', 'Månadskalender');
    define('_MI_APCAL_BNAME_MONTHCAL_DESC', 'Visa Månadskalender i full storlek');
    define('_MI_APCAL_BNAME_TODAYS', 'Dagens händelser');
    define('_MI_APCAL_BNAME_TODAYS_DESC', 'Visa Dagens händelser');
define('_MI_APCAL_BNAME_THEDAYS', 'Denna dagens %s');
    define('_MI_APCAL_BNAME_THEDAYS_DESC', 'Visa händelser för markerad dag');
    define('_MI_APCAL_BNAME_COMING', 'Kommande händelser');
    define('_MI_APCAL_BNAME_COMING_DESC', 'Visa kommande händelser');
    define('_MI_APCAL_BNAME_AFTER', 'Händelser efter %s');
    define('_MI_APCAL_BNAME_AFTER_DESC', 'Visa händelser efter markerad dag');

// Names of submenu
// define("_MI_APCAL_SMNAME1","");

//define("_MI_APCAL_ADMENU1","");

// Title of config items
    define('_MI_USERS_AUTHORITY', 'Behörigheter för användare');
    define('_MI_GUESTS_AUTHORITY', 'Behörigheter för gäster');
    define('_MI_MINICAL_TARGET', 'Sida som visas i center blocket om man klickar på Minikalendern');
    define('_MI_COMING_NUMROWS', 'Antalet visade händelser i blocket för kommande händelser');
    define('_MI_SKINFOLDER', "Namnet på den katalog som innehåller 'skin' filerna");
    define('_MI_SUNDAYCOLOR', 'Färg på texten för Söndag');
    define('_MI_WEEKDAYCOLOR', 'Färg på texten för Veckodagar');
    define('_MI_SATURDAYCOLOR', 'Färg på texten för Lördag');
    define('_MI_HOLIDAYCOLOR', 'Färg på texten för Helgdag');
    define('_MI_TARGETDAYCOLOR', 'Färg på texten för Markerad dag');
    define('_MI_SUNDAYBGCOLOR', 'Bakgrundsfärg för Söndagar');
    define('_MI_WEEKDAYBGCOLOR', 'Bakgrundsfärg för Veckodagar');
    define('_MI_SATURDAYBGCOLOR', 'Bakgrundsfärg för Lördagar');
    define('_MI_HOLIDAYBGCOLOR', 'Bakgrundsfärg för Helgdagar');
    define('_MI_TARGETDAYBGCOLOR', 'Bakgrundsfärg på markerad dag');
    define('_MI_CALHEADCOLOR', "Färg på texten i 'headern' på kalendern");
    define('_MI_CALHEADBGCOLOR', "Bakgrundsfärg i 'headern' på kalendern");
    define('_MI_CALFRAMECSS', 'Stil på ramen runt kalendern');
    define('_MI_CANOUTPUTICS', 'Tillåtelse att mata ut ics filer?');
    define('_MI_MAXRRULEEXTRACT', 'Övre gräns på antalet händelser som får extraheras med regel.(ANTAL)');
    define('_MI_WEEKSTARTFROM', 'Första dagen i veckan');
    define('_MI_DAYSTARTFROM', 'Gräns för att separera dagar');
    define('_MI_NAMEORUNAME', 'Vilket namn på användaren skall visas');
    define('_MI_DESCNAMEORUNAME', "Välj vilket 'namn' som visas");

// Description of each config items
    define('_MI_EDITBYGUESTDSC', 'Tillåtelse för gäster att lägga till händelser');

// Options of each config items
    define('_MI_OPT_AUTH_NONE', 'kan inte lägga till');
    define('_MI_OPT_AUTH_WAIT', 'kan lägga till men kräver godkännande');
    define('_MI_OPT_AUTH_POST', 'kan lägga till utan godkännande');
    define('_MI_OPT_AUTH_BYGROUP', 'Specificerad i Grupprättigheterna');
define('_MI_OPT_MINI_PHPSELF', 'nuvarande sida');
    define('_MI_OPT_MINI_MONTHLY', 'månadskalender');
define('_MI_OPT_MINI_WEEKLY', 'veckokalender');
define('_MI_OPT_MINI_DAILY', 'dagskalender');
define('_MI_OPT_CANOUTPUTICS', 'kan mata ut');
define('_MI_OPT_CANNOTOUTPUTICS', 'kan inte mata ut');
    define('_MI_OPT_STARTFROMSUN', 'Söndag');
    define('_MI_OPT_STARTFROMMON', 'Måndag');
    define('_MI_OPT_USENAME', 'Användarnamn');
define('_MI_OPT_USEUNAME', 'Login Namn') ;

// Admin Menus
    define('_MI_APCAL_ADMENU0', 'Godkänna händelser');
define('_MI_APCAL_ADMENU1', 'iCalendar I/O');
    define('_MI_APCAL_ADMENU2', 'Grupp rättigheter');

// Text for notifications
define('_MI_APCAL_GLOBAL_NOTIFY', 'Globala');
define('_MI_APCAL_GLOBAL_NOTIFYDSC', 'Globala APCal underrättelse inställningar.');
define('_MI_APCAL_CATEGORY_NOTIFY', 'Kategori');
    define('_MI_APCAL_CATEGORY_NOTIFYDSC', 'Underrättelse inställningar som gäller för aktuell kategori.');
    define('_MI_APCAL_EVENT_NOTIFY', 'Händelse');
    define('_MI_APCAL_EVENT_NOTIFYDSC', 'Underrättelse inställningar som gäller för aktuell händelse.');

    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFY', 'Ny händelse');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYCAP', 'Underrätta mig när en ny händelse har skapats.');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYDSC', 'Mottag underrättelse när en ny händelse har skapats.');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatiska underrättelser : Ny händelse');

// Appended by Xoops Language Checker -GIJOE- in 2004-01-14 18:31:01
    define('_MI_APCAL_BNAME_NEW', 'Nyligen publicerade händelser');
    define('_MI_APCAL_BNAME_NEW_DESC', 'Visa händelser sorterade med nyaste överst');
    define('_MI_APCAL_SM_SUBMIT', 'Lägg till');
define('_MI_DEFAULT_VIEW','Default Vy i center');
    define('_MI_WEEKNUMBERING', 'Numrerings regel för veckor');
    define('_MI_OPT_MINI_LIST', 'Händelse lista');
    define('_MI_OPT_WEEKNOEACHMONTH', 'för varje månad');
    define('_MI_OPT_WEEKNOWHOLEYEAR', 'för hela året');
define('_MI_APCAL_ADMENU_CAT','Kategori Administration');
    define('_MI_APCAL_ADMENU_CAT2GROUP', 'Rättigheter för Kategorier');
    define('_MI_APCAL_ADMENU_TM', 'Tabell Underhåll');
define('_MI_APCAL_ADMENU_ICAL','Importera iCalendar');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFY', 'Ny händelse i denna kategori');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYCAP', 'Meddela mig när en ny händelse är skapad i denna kategori.');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYDSC', 'Mottag underrättelse när en ny händelse är skapad i denna kategori.');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : Ny händelse');

}


