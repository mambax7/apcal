<?php

if (defined('FOR_XOOPS_LANG_CHECKER') || !defined('APCAL_AM_LOADED')) {
    define('APCAL_AM_LOADED', 1);
    define('APCAL_COPYRIGHT', '<a href="http://xoops.antiquespromotion.ca" title="Calendar for Xoops" target="_blank">APCal</a> by <a href="http://www.antiquespromotion.ca" title="Antiques Promotion Canada" target="_blank">AP</a>');

    // titles
    define('_AM_ADMISSION', 'Akceptowanie wydarze�');
    define('_AM_MENU_EVENTS', 'Zarz�dzanie wydarzeniami');
    define('_AM_MENU_CATEGORIES', 'Zarz�dzanie kategoriami');
    define('_AM_MENU_CAT2GROUP', 'Dost�p do kategorii');
    define('_AM_ICALENDAR_IMPORT', 'Import z iCalendar');
    define('_AM_GROUPPERM', 'Uprawnienia');
    define('_AM_TABLEMAINTAIN', 'Table Maintenance (Upgrade)');
    define('_AM_MYBLOCKSADMIN', 'Bloki i grupy');

    // forms
    define('_AM_BUTTON_EXTRACT', 'Extract');
    define('_AM_BUTTON_ADMIT', 'Admit');
    define('_AM_BUTTON_MOVE', 'Przenie�');
    define('_AM_BUTTON_COPY', 'Kopiuj');
    define('_AM_CONFIRM_DELETE', 'Usun�� wiadomo��(ci)?');
    define('_AM_CONFIRM_MOVE', 'Czy chcesz usun�� link do starej kategorii i doda� link do wybranej kategorii?');
    define('_AM_CONFIRM_COPY', 'Doda� link do wybranej kategorii');
    define('_AM_OPT_PAST', 'Przesz�o��');
    define('_AM_OPT_FUTURE', 'Przysz�o��');
    define('_AM_OPT_PASTANDFUTURE', 'Przesz�o�� i Przysz�o��');

    // format
    define('_AM_DTFMT_LIST_ALLDAY', 'y-m-d');
    define('_AM_DTFMT_LIST_NORMAL', 'y-m-d<\b\r />H:i');

    // timezones
    define('_AM_TZOPT_SERVER', 'Tak jak na serwerze');
    define('_AM_TZOPT_GMT', 'Jak GMT');
    define('_AM_TZOPT_USER', 'Jak strefa u�ytkownika:');

    // admission
    define('_AM_LABEL_ADMIT', 'Sprawdzone, doda�?');
    define('_AM_MES_ADMITTED', 'Dodano wydarzenie(a)');
    define('_AM_ADMIT_TH0', 'U�ytkownik');
    define('_AM_ADMIT_TH1', 'Pocz�tek');
    define('_AM_ADMIT_TH2', 'Data wyga�ni�cia');
    define('_AM_ADMIT_TH3', 'Tytyu�');
    define('_AM_ADMIT_TH4', 'Regu�a');

    // events manager & importing iCalendar

    define('_AM_LABEL_IMPORTFROMWEB', "Importuj dane iCalendar z sieci (URL musi sie zaczyna� od 'http://' lub 'webcal://')");
    define('_AM_LABEL_UPLOADFROMFILE', 'Wgraj dane iCalendar (Wybierz plik ze swojego komputera)');
    define('_AM_LABEL_IO_CHECKEDITEMS', 'Sprawdzone wydarzenia:');
    define('_AM_LABEL_IO_OUTPUT', 'eksportuj do iCalendar');
    define('_AM_LABEL_IO_DELETE', 'usu�');
    define('_AM_MES_EVENTLINKTOCAT', 'wydarzenie(a) zosta�o dodane');
    define('_AM_MES_EVENTUNLINKED', 'wydarzenie(a) zosta�o przesuni�te do starej kategorii');
    define('_AM_FMT_IMPORTED', "wydarzenie(a) zosta�o zainportowane z'%s'");
    define('_AM_MES_DELETED', 'wydarzenie(a) has been deleted');
    define('_AM_IO_TH0', 'U�ytkownik');
    define('_AM_IO_TH1', 'Pocz�tek');
    define('_AM_IO_TH2', 'Data wyga�ni�cia');
    define('_AM_IO_TH3', 'Tytu�');
    define('_AM_IO_TH4', 'Regu�a');
    define('_AM_IO_TH5', 'Dost�p');

    // Group's Permissions
    define('_AM_GPERM_G_INSERTABLE', 'Mo�e dodawa�');
    define('_AM_GPERM_G_SUPERINSERT', 'Super dodawanie');
    define('_AM_GPERM_G_EDITABLE', 'Mo�e edytowa�');
    define('_AM_GPERM_G_SUPEREDIT', 'Super edytowanie');
    define('_AM_GPERM_G_DELETABLE', 'Mo�e usuwa�');
    define('_AM_GPERM_G_SUPERDELETE', 'Super usuwanie');
    define('_AM_GPERM_G_TOUCHOTHERS', 'Mo�e rusza� inne');
    define('_AM_CAT2GROUPDESC', 'Wybierz uprawnienia dla ka�dej grupy');
    define('_AM_GROUPPERMDESC', "Wybierz uprawnienia dla ka�dej grupy<br />Je�eli chcesz, ustaw z 'W�adze u�ytkownik�w' na Sprecyzowane w Grupach.<br />Ustawienia grup : Administratora i Go�cia b�d� zignorowane.");

    // Table Maintenance
    define('_AM_MB_SUCCESSUPDATETABLE', 'Modu� pomy�lnie uaktualniony');
    define('_AM_MB_FAILUPDATETABLE', 'B��d podczas uaktualniania modu�u');
    define('_AM_NOTICE_NOERRORS', 'Modu� uaktualniony bezb��dnie.');
    define('_AM_ALRT_CATTABLENOTEXIST', 'Kategoria nie istnieje.<br />Czy chcesz j� stworzy� ?');
    define('_AM_ALRT_OLDTABLE', 'Struktura wydarze� jest stara.<br />Czy chcesz uaktualni� tabel� ?');
    define('_AM_ALRT_TOOOLDTABLE', 'Wyst�pi� b��d.<br />Mozliwe �e u�ywasz starej wercji APCal.<br />Uaktualnij do najnowszej wersji.');
    define('_AM_FMT_SERVER_TZ_ALL', "Strefa czasowa na tym serwerze (zima): %+2.1f<br />Strefa czasowa na tym serwerze (lato): %+2.1f<br />Nazwa strefy na tym serwerze: %s<br />Warto�� w XOOPS'ie : %+2.1f<br />APCal u�ywa: %+2.1f<br />");
    define('_AM_TH_SERVER_TZ_COUNT', 'Wydarzenia');
    define('_AM_TH_SERVER_TZ_VALUE', 'Strefa czasowa');
    define('_AM_TH_SERVER_TZ_VALUE_TO', 'Zmiana (-14.0��14.0)');
    define('_AM_JSALRT_SERVER_TZ', 'Nie zapomnij zrobi� kopii zapasowej');
    define('_AM_NOTICE_SERVER_TZ', 'Je�eli tw�j serwer ma ustawiony czas letni i jakie� wydarzenia s� zarejestrowane w APCal 0.6x lub 0.7x, nie klikaj na ten guzik.<br />eg) To jest normalne �e pokazuje obie: -5.0 i -4.0 w EDT(Eastern Daylight Time)');
    define('_AM_MB_SUCCESSTZUPDATE', 'Wydarzenia i strefy czasowe zosta�y zmodyfikowane.');

    // Categories
    define('_AM_CAT_TH_TITLE', 'Tytu�');
    define('_AM_CAT_TH_DESC', 'Opis');
    define('_AM_CAT_TH_PARENT', 'Katalog nadrz�dny');
    define('_AM_CAT_TH_OPTIONS', 'Opcje');
    define('_AM_CAT_TH_LASTMODIFY', 'Ostatnio zmodyfikowany');
    define('_AM_CAT_TH_OPERATION', 'Operacja');
    define('_AM_CAT_TH_ENABLED', 'W��cz');
    define('_AM_CAT_TH_WEIGHT', 'Wa�no��');
    define('_AM_CAT_TH_SUBMENU', 'Dopisz w SubMenu');
    define('_AM_BTN_UPDATE', 'Uaktualnij');
    define('_AM_MENU_CAT_EDIT', 'Edycja kategorii');
    define('_AM_MENU_CAT_NEW', 'Utw�rz kategori�');
    define('_AM_MB_MAKESUBCAT', 'Podkategoria');
    define('_AM_MB_MAKETOPCAT', 'Utw�rz now� kategori�');
    define('_AM_MB_CAT_INSERTED', 'Utworzono now� kategori�');
    define('_AM_MB_CAT_UPDATED', 'Kategoria pomy�lnie uaktualniona');
    define('_AM_FMT_CAT_DELETED', '%s Kategorii usuni�to');
    define('_AM_FMT_CAT_BATCHUPDATED', '%s Kategorii uaktualniono');
    define('_AM_FMT_CATDELCONFIRM', 'Czy na pewno chcesz usun�� t� kategori� %s ?');

    // Plugins
    define('_AM_PI_UPDATED', 'Pluginy uaktualniono');
    define('_AM_PI_TH_TYPE', 'Typ');
    define('_AM_PI_TH_OPTIONS', 'Opcje (zazwyczaj puste)');
    define('_AM_PI_TH_TITLE', 'Tytu�');
    define('_AM_PI_TH_DIRNAME', 'Katalog modu�u');
    define('_AM_PI_TH_FILE', 'Plik pluginu');
    define('_AM_PI_TH_DOTGIF', '.GIF');
    define('_AM_PI_TH_OPERATION', 'Operacja');
    define('_AM_PI_ENABLED', 'W��czony');
    define('_AM_PI_DELETE', 'Usu�');
    define('_AM_PI_NEW', 'Nowy');
    define('_AM_PI_VIEWYEARLY', 'Widok roczny');
    define('_AM_PI_VIEWMONTHLY', 'Widok miesi�czny');
    define('_AM_PI_VIEWWEEKLY', 'Widok tygodniowy');
    define('_AM_PI_VIEWDAILY', 'Widok dzienny');
}
