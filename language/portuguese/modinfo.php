<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'APCAL_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2006-02-15 05:31:20
define('_MI_APCAL_ADMENU_MYTPLSADMIN','Templates');

// Appended by Xoops Language Checker -GIJOE- in 2005-05-06 18:04:01
define('_MI_TIMEZONE_USING','Timezone of the server');
define('_MI_OPT_TZ_USEXOOPS','value of XOOPS config');
define('_MI_OPT_TZ_USEWINTER','value told from the server as winter time (recommended)');
define('_MI_OPT_TZ_USESUMMER','value told from the server as summer time');

// Appended by Xoops Language Checker -GIJOE- in 2005-05-03 05:31:14
define('_MI_USE24HOUR','24hours system (No means 12hours system)');
define('_MI_APCAL_ADMENU_PLUGINS','Plugins Manager');

// Appended by Xoops Language Checker -GIJOE- in 2005-04-22 12:02:02
define('_MI_APCAL_BNAME_MINICALEX','MiniCalendarEx');
define('_MI_APCAL_BNAME_MINICALEX_DESC','Extensible minicalendar with plugin system');

// Appended by Xoops Language Checker -GIJOE- in 2005-01-08 04:36:51
define('_MI_APCAL_DEFAULTLOCALE','');
define('_MI_APCAL_LOCALE','Locale (check files in locales/*.php)');

define( 'APCAL_MI_LOADED' , 1 ) ;

// Module Info

// The name of this module

// Appended by Xoops Language Checker -GIJOE- in 2004-06-22 18:39:03
define('_MI_APCAL_ADMENU_MYBLOCKSADMIN','Blocks&Groups Admin');

define('_MI_APCAL_NAME', 'APCal');

// A brief description of this module
define('_MI_APCAL_DESC', 'Modulo Calendario com Agenda');

// Names of blocks for this module (Not all module has blocks)
define('_MI_APCAL_BNAME_MINICAL', 'Mini Calendario');
define('_MI_APCAL_BNAME_MINICAL_DESC', 'Mostrar um mini Calendario em bloco');
define('_MI_APCAL_BNAME_MONTHCAL', 'Calendario mensal');
define('_MI_APCAL_BNAME_MONTHCAL_DESC', 'Mostrar um calendario mensal completo');
define('_MI_APCAL_BNAME_TODAYS', 'Eventos de hoje');
define('_MI_APCAL_BNAME_TODAYS_DESC', 'Mostrar eventos de hoje');
define('_MI_APCAL_BNAME_THEDAYS', 'Eventos deste %s');
define('_MI_APCAL_BNAME_THEDAYS_DESC', 'Mostrar eventos do dia assinalado');
define('_MI_APCAL_BNAME_COMING', 'Proximos eventos');
define('_MI_APCAL_BNAME_COMING_DESC', 'Mostrar os próximos eventos');
define('_MI_APCAL_BNAME_AFTER', 'Eventos depois %s');
define('_MI_APCAL_BNAME_AFTER_DESC', 'Mostrar os eventos depois do dia asinalado');
define('_MI_APCAL_BNAME_NEW', 'Eventos postados recentemente');
define('_MI_APCAL_BNAME_NEW_DESC', 'Mostrar os eventos  ordenados do mais recente para o menos recente');

// Names of submenu
define('_MI_APCAL_SM_SUBMIT', 'Submeter');

//define("_MI_APCAL_ADMENU1","");

// Title of config items
define('_MI_USERS_AUTHORITY', 'Atribuições dos usuários');
define('_MI_GUESTS_AUTHORITY', 'Atribuições dos convidados');
define('_MI_DEFAULT_VIEW', 'Vista preestabelecida no centro');
define('_MI_MINICAL_TARGET', 'Vista objetiva do mini calendario');
define('_MI_COMING_NUMROWS', 'Número de eventos mostrados em blocos de eventos seguintes');
define('_MI_SKINFOLDER', 'nome da pasta de skin');
define('_MI_SUNDAYCOLOR', 'cor do domingo');
define('_MI_WEEKDAYCOLOR', 'cor dos dias de semana');
define('_MI_SATURDAYCOLOR', 'Cor do sabado');
define('_MI_HOLIDAYCOLOR', 'Cor do feriado');
define('_MI_TARGETDAYCOLOR', 'Cor do dia com evento');
define('_MI_SUNDAYBGCOLOR', 'Cor de fundo do domingo');
define('_MI_WEEKDAYBGCOLOR', 'Cor de fundo dos dias de semana');
define('_MI_SATURDAYBGCOLOR', 'Cor de fundo do sabado');
define('_MI_HOLIDAYBGCOLOR', 'Cor de fundo do feriado');
define('_MI_TARGETDAYBGCOLOR', 'Cor de fundo do dia com evento');
define('_MI_CALHEADCOLOR', 'Cor da parte superior do calendario');
define('_MI_CALHEADBGCOLOR', 'Cor de fundo da parte superior do calendário');
define('_MI_CALFRAMECSS', 'Estilo da borda do calendário');
define('_MI_CANOUTPUTICS', 'Permissão para fazer os arquivos ics');
define('_MI_MAXRRULEEXTRACT', 'Limite máximo dos eventos extra��os pela regra.(CONTAR)');
define('_MI_WEEKSTARTFROM', 'Dia inicial da semana');
define('_MI_WEEKNUMBERING', 'Regra de numeração para as semanas');
define('_MI_DAYSTARTFROM', 'Hora de começa do dia');
define('_MI_NAMEORUNAME', 'Nome do poster mostrado') ;
define('_MI_DESCNAMEORUNAME', "Selecionar o 'nome' mostrado" ) ;

// Description of each config items
define('_MI_EDITBYGUESTDSC', 'Permissão de adicionar eventos para os visitantes');

// Options of each config items
define('_MI_OPT_AUTH_NONE', 'não pode adicionar');
define('_MI_OPT_AUTH_WAIT', 'pode adicionar, mas necessita permissão');
define('_MI_OPT_AUTH_POST', 'pode adicionar sem permissão');
define('_MI_OPT_AUTH_BYGROUP', 'Especifcado em permissões dos Grupos');
define('_MI_OPT_MINI_PHPSELF', 'Pagina atual');
define('_MI_OPT_MINI_MONTHLY', 'calendario mensal');
define('_MI_OPT_MINI_WEEKLY', 'calendario semanal');
define('_MI_OPT_MINI_DAILY', 'calendario di��io');
define('_MI_OPT_MINI_LIST', 'lista de eventos');
define('_MI_OPT_CANOUTPUTICS', 'pode fazer');
define('_MI_OPT_CANNOTOUTPUTICS', 'não pode fazer');
define('_MI_OPT_STARTFROMSUN', 'Domingo');
define('_MI_OPT_STARTFROMMON', 'Segunda');
define('_MI_OPT_WEEKNOEACHMONTH', 'por cada m��');
define('_MI_OPT_WEEKNOWHOLEYEAR', 'por todo o ano');
define('_MI_OPT_USENAME', 'Nome') ;
define('_MI_OPT_USEUNAME', 'Nome de Login') ;

// Admin Menus
define('_MI_APCAL_ADMENU0', 'Admitir Eventos');
define('_MI_APCAL_ADMENU1', 'Administrador de eventos');
define('_MI_APCAL_ADMENU_CAT', 'Administrador de Categorias');
define('_MI_APCAL_ADMENU_CAT2GROUP', 'Permissões das Categorias');
define('_MI_APCAL_ADMENU2', 'Permissões Globais');
define('_MI_APCAL_ADMENU_TM', 'Tabela de Manutenção');
define('_MI_APCAL_ADMENU_ICAL', 'Importar iCalendar');

// Text for notifications
define('_MI_APCAL_GLOBAL_NOTIFY', 'Global');
define('_MI_APCAL_GLOBAL_NOTIFYDSC', 'Opções globais de notificaçãoo de APCal.');
define('_MI_APCAL_CATEGORY_NOTIFY', 'Categoria');
define('_MI_APCAL_CATEGORY_NOTIFYDSC', 'Opções de notificaçãoo que são aplicadas na categoria atual.');
define('_MI_APCAL_EVENT_NOTIFY', 'Evento');
define('_MI_APCAL_EVENT_NOTIFYDSC', 'Opções de notificaçãoo que são aplicadas no atual evento.');

define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFY', 'Novo Evento');
define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYCAP', 'Notificar quando um novo evento for criado.');
define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYDSC', 'Receber notificaçãoo quando um novo evento for criado.');
define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificaçãoo : Novo evento');

define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFY', 'Novo Event na Categoria');
define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYCAP', 'Notificar quando um novo evento for criado na Categoria.');
define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYDSC', 'Receber notificaçãoo quando um novo evento for criado na Categoria.');
define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notificaçãoo : Novo evento em {CATEGORY_TITLE}');



}


