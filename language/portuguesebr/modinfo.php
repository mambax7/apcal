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

// Appended by Xoops Language Checker -GIJOE- in 2005-04-22 12:02:03
define('_MI_APCAL_BNAME_MINICALEX','MiniCalendarEx');
define('_MI_APCAL_BNAME_MINICALEX_DESC','Extensible minicalendar with plugin system');

// Appended by Xoops Language Checker -GIJOE- in 2005-01-08 04:36:51
define('_MI_APCAL_DEFAULTLOCALE','brazil');
define('_MI_APCAL_LOCALE','Locale (check files in locales/*.php)');

define( 'APCAL_MI_LOADED' , 1 ) ;
 //* Brazilian Portuguese Translation by Marcelo Yuji Himoro <www.yuji.eu.org> *//
// Module Info

// The name of this module
define('_MI_APCAL_NAME', 'APCal');

// A brief description of this module
define('_MI_APCAL_DESC', 'Módulo de calendário com agenda.');

// Names of blocks for this module (Not all module has blocks)
define('_MI_APCAL_BNAME_MINICAL', 'Mini-calendário');
define('_MI_APCAL_BNAME_MINICAL_DESC', 'Mostra um mini-calendário em bloco.');
define('_MI_APCAL_BNAME_MONTHCAL', 'Calendário mensal em tamanho completo');
define('_MI_APCAL_BNAME_MONTHCAL_DESC', 'Mostra um calendário mensal em tamanho completo.');
define('_MI_APCAL_BNAME_TODAYS', 'Eventos de hoje');
define('_MI_APCAL_BNAME_TODAYS_DESC', 'Mostra eventos de hoje.');
define('_MI_APCAL_BNAME_THEDAYS', 'Eventos em %s');
define('_MI_APCAL_BNAME_THEDAYS_DESC', 'Mostra eventos do dia indicado no calendário.');
define('_MI_APCAL_BNAME_COMING', 'Próximos eventos');
define('_MI_APCAL_BNAME_COMING_DESC', 'Mostra os próximos eventos.');
define('_MI_APCAL_BNAME_AFTER', 'Eventos depois %s');
define('_MI_APCAL_BNAME_AFTER_DESC', 'Mostra os eventos após o dia indicado no calendário.');
define('_MI_APCAL_BNAME_NEW', 'Eventos recentes');
define('_MI_APCAL_BNAME_NEW_DESC', 'Mostra os eventos mais recentes.');

// Names of submenu
define('_MI_APCAL_SM_SUBMIT', 'Enviar');

//define("_MI_APCAL_ADMENU1","");

// Title of config items
define('_MI_USERS_AUTHORITY', 'Permissões gerais dos usuários');
define('_MI_GUESTS_AUTHORITY', 'Permissões dos anônimos');
    define('_MI_DEFAULT_VIEW', 'Calendário padrão');
    define('_MI_MINICAL_TARGET', 'O que mostrar quando uma data é clicada no mini-calendário?');
define('_MI_COMING_NUMROWS', 'Número de eventos mostrados no bloco de eventos seguintes');
define('_MI_SKINFOLDER', 'Nome da pasta das skins');
define('_MI_SUNDAYCOLOR', 'Cor dos domingos');
define('_MI_WEEKDAYCOLOR', 'Cor dos dias da semana');
    define('_MI_SATURDAYCOLOR', 'Cor dos sábados');
define('_MI_HOLIDAYCOLOR', 'Cor dos feriados');
define('_MI_TARGETDAYCOLOR', 'Cor dos dias com evento');
define('_MI_SUNDAYBGCOLOR', 'Cor de fundo dos domingos');
define('_MI_WEEKDAYBGCOLOR', 'Cor de fundo dos dias da semana');
    define('_MI_SATURDAYBGCOLOR', 'Cor de fundo dos sábados');
define('_MI_HOLIDAYBGCOLOR', 'Cor de fundo dos feriados');
define('_MI_TARGETDAYBGCOLOR', 'Cor de fundo dos dias com evento');
define('_MI_CALHEADCOLOR', 'Cor do topo do calendario');
define('_MI_CALHEADBGCOLOR', 'Cor de fundo do topo do calendário');
define('_MI_CALFRAMECSS', 'Estilo da borda do calendário');
    define('_MI_CANOUTPUTICS', 'Permissão para geração de arquivos ics');
    define('_MI_MAXRRULEEXTRACT', 'Limite máximo dos eventos extraídos da regra de repetição. (COUNT)');
define('_MI_WEEKSTARTFROM', 'Dia inicial da semana');
define('_MI_WEEKNUMBERING', 'Regra de numeração para as semanas');
define('_MI_DAYSTARTFROM', 'Hora do encerramento de um dia');
define('_MI_NAMEORUNAME', 'Mostrar nome do autor');
define('_MI_DESCNAMEORUNAME', "Escolha 'Usuário' ou 'Nome verdadeiro'." ) ;

// Description of each config items
define('_MI_EDITBYGUESTDSC', 'Permitir que usuários anônimos criem eventos?');

// Options of each config items
define('_MI_OPT_AUTH_NONE', 'Permissões de criação');
define('_MI_OPT_AUTH_WAIT', 'Podem criar (requer aprovação)');
define('_MI_OPT_AUTH_POST', 'Podem criar');
define('_MI_OPT_AUTH_BYGROUP', 'Especifcado nas permissões dos Grupos');
define('_MI_OPT_MINI_PHPSELF', 'Manter configurações atuais');
    define('_MI_OPT_MINI_MONTHLY', 'Mostrar calendário mensal como padrão');
    define('_MI_OPT_MINI_WEEKLY', 'Mostrar calendário semanal como padrão');
    define('_MI_OPT_MINI_DAILY', 'Mostrar calendário diário como padrão');
define('_MI_OPT_MINI_LIST', 'Lista de eventos');
define('_MI_OPT_CANOUTPUTICS', 'Podem gerar');
    define('_MI_OPT_CANNOTOUTPUTICS', 'Não podem gerar');
define('_MI_OPT_STARTFROMSUN', 'Domingo');
define('_MI_OPT_STARTFROMMON', 'Segunda');
define('_MI_OPT_WEEKNOEACHMONTH', 'Mensal');
define('_MI_OPT_WEEKNOWHOLEYEAR', 'Anual');
define('_MI_OPT_USENAME', 'Nome verdadeiro') ;
define('_MI_OPT_USEUNAME', 'Usuário') ;

// Admin Menus
define('_MI_APCAL_ADMENU0', 'Aprovar eventos');
define('_MI_APCAL_ADMENU1', 'Administração de eventos');
define('_MI_APCAL_ADMENU_CAT', 'Administração de categorias');
define('_MI_APCAL_ADMENU_CAT2GROUP', 'Permissões globais das categorias');
    define('_MI_APCAL_ADMENU2', 'Permisões globais dos grupos');
define('_MI_APCAL_ADMENU_TM', 'Manutenção das tabelas');
define('_MI_APCAL_ADMENU_ICAL', 'Importar do iCalendar');
define('_MI_APCAL_ADMENU_MYBLOCKSADMIN','Administração de blocos e grupos');

// Text for notifications
define('_MI_APCAL_GLOBAL_NOTIFY', 'Global');
    define('_MI_APCAL_GLOBAL_NOTIFYDSC', 'Opções globais de aviso do piCal.');
define('_MI_APCAL_CATEGORY_NOTIFY', 'Categoria');
define('_MI_APCAL_CATEGORY_NOTIFYDSC', 'Opções de aviso que se aplicam para a categoria atual.');
define('_MI_APCAL_EVENT_NOTIFY', 'Evento');
define('_MI_APCAL_EVENT_NOTIFYDSC', 'Opções de aviso que se aplicam para o evento atual.');

define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFY', 'Novo evento');
define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYCAP', 'Avisar-me quando um novo evento for criado.');
define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYDSC', 'Receber uma viso quando um novo evento for criado.');
    define('_MI_APCAL_GLOBAL_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: Novo evento');

define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFY', 'Novo evento na categoria');
define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYCAP', 'Avisar-me quando um novo evento for criado na categoria atual.');
define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYDSC', 'Receber uma aviso quando um novo evento for criado na categoria atual.');
    define('_MI_APCAL_CATEGORY_NEWEVENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} aviso automático: Novo evento em {CATEGORY_TITLE}');

}


