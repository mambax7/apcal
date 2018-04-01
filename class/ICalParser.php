<?php namespace XoopsModules\Apcal;

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

use  XoopsModules\Apcal;

// ORIGINAL: PHP iCalendar  (http://phapcalendar.sourceforge.net/)
// PROJECT ADMINS
// --------------
// Chad Little    <chad@chadsdomain.com>
// Jared Wangen   <jared@silter.org>
//
// DEVELOPERS
// ----------
// Patrick Berry  <pberry@mac.com>
// Bill Fenner    <fenner@research.att.com>
// David Reindl   <dre@andare.ch>
//
// CODE CONTRIBUTORS
// -----------------
// Greg Westin    <greg@gregwestin.com>
// Blaine Cook    <lattice@resist.ca>

// mb_internal_encoding¤Î¥¨¥ß¥å¥ì¡¼¥È (¾ï¤ËASCII¤òÊÖ¤¹)
if (!function_exists('mb_internal_encoding')) {
    /**
     * @return string
     */
    function mb_internal_encoding()
    {
        return 'ASCII';
    }
}

/**
 * Class ICalParser
 */
class ICalParser
{
    public $week_start_day = 'Sunday';
    public $timezone       = '+0900';
    public $events         = [];
    public $language       = 'japanese';

    // From timezones.php
    public $tz_array = [
        'GMT'                          => ['+0000', '+0000'],
        'Africa/Addis_Ababa'           => ['+0300', '+0300'],
        'Africa/Algiers'               => ['+0100', '+0100'],
        'Africa/Asmera'                => ['+0300', '+0300'],
        'Africa/Bangui'                => ['+0100', '+0100'],
        'Africa/Blantyre'              => ['+0200', '+0200'],
        'Africa/Brazzaville'           => ['+0100', '+0100'],
        'Africa/Bujumbura'             => ['+0200', '+0200'],
        'Africa/Cairo'                 => ['+0200', '+0300'],
        'Africa/Ceuta'                 => ['+0100', '+0200'],
        'Africa/Dar_es_Salaam'         => ['+0300', '+0300'],
        'Africa/Djibouti'              => ['+0300', '+0300'],
        'Africa/Douala'                => ['+0100', '+0100'],
        'Africa/Gaborone'              => ['+0200', '+0200'],
        'Africa/Harare'                => ['+0200', '+0200'],
        'Africa/Johannesburg'          => ['+0200', '+0200'],
        'Africa/Kampala'               => ['+0300', '+0300'],
        'Africa/Khartoum'              => ['+0300', '+0300'],
        'Africa/Kigali'                => ['+0200', '+0200'],
        'Africa/Kinshasa'              => ['+0100', '+0100'],
        'Africa/Lagos'                 => ['+0100', '+0100'],
        'Africa/Libreville'            => ['+0100', '+0100'],
        'Africa/Luanda'                => ['+0100', '+0100'],
        'Africa/Lubumbashi'            => ['+0200', '+0200'],
        'Africa/Lusaka'                => ['+0200', '+0200'],
        'Africa/Malabo'                => ['+0100', '+0100'],
        'Africa/Maputo'                => ['+0200', '+0200'],
        'Africa/Maseru'                => ['+0200', '+0200'],
        'Africa/Mbabane'               => ['+0200', '+0200'],
        'Africa/Mogadishu'             => ['+0300', '+0300'],
        'Africa/Nairobi'               => ['+0300', '+0300'],
        'Africa/Ndjamena'              => ['+0100', '+0100'],
        'Africa/Niamey'                => ['+0100', '+0100'],
        'Africa/Porto-Novo'            => ['+0100', '+0100'],
        'Africa/Tripoli'               => ['+0200', '+0200'],
        'Africa/Tunis'                 => ['+0100', '+0100'],
        'Africa/Windhoek'              => ['+0200', '+0100'],
        'America/Adak'                 => ['-1000', '-0900'],
        'America/Anchorage'            => ['-0900', '-0800'],
        'America/Anguilla'             => ['-0400', '-0400'],
        'America/Antigua'              => ['-0400', '-0400'],
        'America/Araguaina'            => ['-0200', '-0300'],
        'America/Aruba'                => ['-0400', '-0400'],
        'America/Asuncion'             => ['-0300', '-0400'],
        'America/Atka'                 => ['-1000', '-0900'],
        'America/Barbados'             => ['-0400', '-0400'],
        'America/Belem'                => ['-0300', '-0300'],
        'America/Belize'               => ['-0600', '-0600'],
        'America/Boa_Vista'            => ['-0400', '-0400'],
        'America/Bogota'               => ['-0500', '-0500'],
        'America/Boise'                => ['-0700', '-0600'],
        'America/Buenos_Aires'         => ['-0300', '-0300'],
        'America/Cambridge_Bay'        => ['-0700', '-0600'],
        'America/Cancun'               => ['-0600', '-0500'],
        'America/Caracas'              => ['-0400', '-0400'],
        'America/Catamarca'            => ['-0300', '-0300'],
        'America/Cayenne'              => ['-0300', '-0300'],
        'America/Cayman'               => ['-0500', '-0500'],
        'America/Chicago'              => ['-0600', '-0500'],
        'America/Chihuahua'            => ['-0700', '-0600'],
        'America/Cordoba'              => ['-0300', '-0300'],
        'America/Costa_Rica'           => ['-0600', '-0600'],
        'America/Cuiaba'               => ['-0300', '-0400'],
        'America/Curacao'              => ['-0400', '-0400'],
        'America/Dawson'               => ['-0800', '-0700'],
        'America/Dawson_Creek'         => ['-0700', '-0700'],
        'America/Denver'               => ['-0700', '-0600'],
        'America/Detroit'              => ['-0500', '-0400'],
        'America/Dominica'             => ['-0400', '-0400'],
        'America/Edmonton'             => ['-0700', '-0600'],
        'America/Eirunepe'             => ['-0500', '-0500'],
        'America/El_Salvador'          => ['-0600', '-0600'],
        'America/Ensenada'             => ['-0800', '-0700'],
        'America/Fort_Wayne'           => ['-0500', '-0500'],
        'America/Fortaleza'            => ['-0300', '-0300'],
        'America/Glace_Bay'            => ['-0400', '-0300'],
        'America/Godthab'              => ['-0300', '-0200'],
        'America/Goose_Bay'            => ['-0400', '-0300'],
        'America/Grand_Turk'           => ['-0500', '-0400'],
        'America/Grenada'              => ['-0400', '-0400'],
        'America/Guadeloupe'           => ['-0400', '-0400'],
        'America/Guatemala'            => ['-0600', '-0600'],
        'America/Guayaquil'            => ['-0500', '-0500'],
        'America/Guyana'               => ['-0400', '-0400'],
        'America/Halifax'              => ['-0400', '-0300'],
        'America/Havana'               => ['-0500', '-0400'],
        'America/Hermosillo'           => ['-0700', '-0700'],
        'America/Indiana/Indianapolis' => ['-0500', '-0500'],
        'America/Indiana/Knox'         => ['-0500', '-0500'],
        'America/Indiana/Marengo'      => ['-0500', '-0500'],
        'America/Indiana/Vevay'        => ['-0500', '-0500'],
        'America/Indianapolis'         => ['-0500', '-0500'],
        'America/Inuvik'               => ['-0700', '-0600'],
        'America/Iqaluit'              => ['-0500', '-0400'],
        'America/Jamaica'              => ['-0500', '-0500'],
        'America/Jujuy'                => ['-0300', '-0300'],
        'America/Juneau'               => ['-0900', '-0800'],
        'America/Kentucky/Louisville'  => ['-0500', '-0400'],
        'America/Kentucky/Monticello'  => ['-0500', '-0400'],
        'America/Knox_IN'              => ['-0500', '-0500'],
        'America/La_Paz'               => ['-0400', '-0400'],
        'America/Lima'                 => ['-0500', '-0500'],
        'America/Los_Angeles'          => ['-0800', '-0700'],
        'America/Louisville'           => ['-0500', '-0400'],
        'America/Maceio'               => ['-0300', '-0300'],
        'America/Managua'              => ['-0600', '-0600'],
        'America/Manaus'               => ['-0400', '-0400'],
        'America/Martinique'           => ['-0400', '-0400'],
        'America/Mazatlan'             => ['-0700', '-0600'],
        'America/Mendoza'              => ['-0300', '-0300'],
        'America/Menominee'            => ['-0600', '-0500'],
        'America/Merida'               => ['-0600', '-0500'],
        'America/Mexico_City'          => ['-0600', '-0500'],
        'America/Miquelon'             => ['-0300', '-0200'],
        'America/Monterrey'            => ['-0600', '-0500'],
        'America/Montevideo'           => ['-0300', '-0300'],
        'America/Montreal'             => ['-0500', '-0400'],
        'America/Montserrat'           => ['-0400', '-0400'],
        'America/Nassau'               => ['-0500', '-0400'],
        'America/New_York'             => ['-0500', '-0400'],
        'America/Nipigon'              => ['-0500', '-0400'],
        'America/Nome'                 => ['-0900', '-0800'],
        'America/Noronha'              => ['-0200', '-0200'],
        'America/Panama'               => ['-0500', '-0500'],
        'America/Pangnirtung'          => ['-0500', '-0400'],
        'America/Paramaribo'           => ['-0300', '-0300'],
        'America/Phoenix'              => ['-0700', '-0700'],
        'America/Port-au-Prince'       => ['-0500', '-0500'],
        'America/Port_of_Spain'        => ['-0400', '-0400'],
        'America/Porto_Acre'           => ['-0500', '-0500'],
        'America/Porto_Velho'          => ['-0400', '-0400'],
        'America/Puerto_Rico'          => ['-0400', '-0400'],
        'America/Rainy_River'          => ['-0600', '-0500'],
        'America/Rankin_Inlet'         => ['-0600', '-0500'],
        'America/Recife'               => ['-0300', '-0300'],
        'America/Regina'               => ['-0600', '-0600'],
        'America/Rio_Branco'           => ['-0500', '-0500'],
        'America/Rosario'              => ['-0300', '-0300'],
        'America/Santiago'             => ['-0300', '-0400'],
        'America/Santo_Domingo'        => ['-0400', '-0400'],
        'America/Sao_Paulo'            => ['-0200', '-0300'],
        'America/Scoresbysund'         => ['-0100', '+0000'],
        'America/Shiprock'             => ['-0700', '-0600'],
        'America/St_Johns'             => ['-031800', '-021800'],
        'America/St_Kitts'             => ['-0400', '-0400'],
        'America/St_Lucia'             => ['-0400', '-0400'],
        'America/St_Thomas'            => ['-0400', '-0400'],
        'America/St_Vincent'           => ['-0400', '-0400'],
        'America/Swift_Current'        => ['-0600', '-0600'],
        'America/Tegucigalpa'          => ['-0600', '-0600'],
        'America/Thule'                => ['-0400', '-0300'],
        'America/Thunder_Bay'          => ['-0500', '-0400'],
        'America/Tijuana'              => ['-0800', '-0700'],
        'America/Tortola'              => ['-0400', '-0400'],
        'America/Vancouver'            => ['-0800', '-0700'],
        'America/Virgin'               => ['-0400', '-0400'],
        'America/Whitehorse'           => ['-0800', '-0700'],
        'America/Winnipeg'             => ['-0600', '-0500'],
        'America/Yakutat'              => ['-0900', '-0800'],
        'America/Yellowknife'          => ['-0700', '-0600'],
        'Antarctica/Casey'             => ['+0800', '+0800'],
        'Antarctica/Davis'             => ['+0700', '+0700'],
        'Antarctica/DumontDUrville'    => ['+1000', '+1000'],
        'Antarctica/Mawson'            => ['+0600', '+0600'],
        'Antarctica/McMurdo'           => ['+1300', '+1200'],
        'Antarctica/Palmer'            => ['-0300', '-0400'],
        'Antarctica/South_Pole'        => ['+1300', '+1200'],
        'Antarctica/Syowa'             => ['+0300', '+0300'],
        'Antarctica/Vostok'            => ['+0600', '+0600'],
        'Arctic/Longyearbyen'          => ['+0100', '+0200'],
        'Asia/Aden'                    => ['+0300', '+0300'],
        'Asia/Almaty'                  => ['+0600', '+0700'],
        'Asia/Amman'                   => ['+0200', '+0300'],
        'Asia/Anadyr'                  => ['+1200', '+1300'],
        'Asia/Aqtau'                   => ['+0400', '+0500'],
        'Asia/Aqtobe'                  => ['+0500', '+0600'],
        'Asia/Ashgabat'                => ['+0500', '+0500'],
        'Asia/Ashkhabad'               => ['+0500', '+0500'],
        'Asia/Baghdad'                 => ['+0300', '+0400'],
        'Asia/Bahrain'                 => ['+0300', '+0300'],
        'Asia/Baku'                    => ['+0400', '+0500'],
        'Asia/Bangkok'                 => ['+0700', '+0700'],
        'Asia/Beirut'                  => ['+0200', '+0300'],
        'Asia/Bishkek'                 => ['+0500', '+0600'],
        'Asia/Brunei'                  => ['+0800', '+0800'],
        'Asia/Calcutta'                => ['+051800', '+051800'],
        'Asia/Chungking'               => ['+0800', '+0800'],
        'Asia/Colombo'                 => ['+0600', '+0600'],
        'Asia/Dacca'                   => ['+0600', '+0600'],
        'Asia/Damascus'                => ['+0200', '+0300'],
        'Asia/Dhaka'                   => ['+0600', '+0600'],
        'Asia/Dili'                    => ['+0900', '+0900'],
        'Asia/Dubai'                   => ['+0400', '+0400'],
        'Asia/Dushanbe'                => ['+0500', '+0500'],
        'Asia/Gaza'                    => ['+0200', '+0300'],
        'Asia/Harbin'                  => ['+0800', '+0800'],
        'Asia/Hong_Kong'               => ['+0800', '+0800'],
        'Asia/Hovd'                    => ['+0700', '+0700'],
        'Asia/Irkutsk'                 => ['+0800', '+0900'],
        'Asia/Istanbul'                => ['+0200', '+0300'],
        'Asia/Jakarta'                 => ['+0700', '+0700'],
        'Asia/Jayapura'                => ['+0900', '+0900'],
        'Asia/Jerusalem'               => ['+0200', '+0300'],
        'Asia/Kabul'                   => ['+041800', '+041800'],
        'Asia/Kamchatka'               => ['+1200', '+1300'],
        'Asia/Karachi'                 => ['+0500', '+0500'],
        'Asia/Kashgar'                 => ['+0800', '+0800'],
        'Asia/Katmandu'                => ['+052700', '+052700'],
        'Asia/Krasnoyarsk'             => ['+0700', '+0800'],
        'Asia/Kuala_Lumpur'            => ['+0800', '+0800'],
        'Asia/Kuching'                 => ['+0800', '+0800'],
        'Asia/Kuwait'                  => ['+0300', '+0300'],
        'Asia/Macao'                   => ['+0800', '+0800'],
        'Asia/Magadan'                 => ['+1100', '+1200'],
        'Asia/Manila'                  => ['+0800', '+0800'],
        'Asia/Muscat'                  => ['+0400', '+0400'],
        'Asia/Nicosia'                 => ['+0200', '+0300'],
        'Asia/Novosibirsk'             => ['+0600', '+0700'],
        'Asia/Omsk'                    => ['+0600', '+0700'],
        'Asia/Phnom_Penh'              => ['+0700', '+0700'],
        'Asia/Pyongyang'               => ['+0900', '+0900'],
        'Asia/Qatar'                   => ['+0300', '+0300'],
        'Asia/Rangoon'                 => ['+061800', '+061800'],
        'Asia/Riyadh'                  => ['+0300', '+0300'],
        'Asia/Riyadh87'                => ['+03424', '+03424'],
        'Asia/Riyadh88'                => ['+03424', '+03424'],
        'Asia/Riyadh89'                => ['+03424', '+03424'],
        'Asia/Saigon'                  => ['+0700', '+0700'],
        'Asia/Samarkand'               => ['+0500', '+0500'],
        'Asia/Seoul'                   => ['+0900', '+0900'],
        'Asia/Shanghai'                => ['+0800', '+0800'],
        'Asia/Singapore'               => ['+0800', '+0800'],
        'Asia/Taipei'                  => ['+0800', '+0800'],
        'Asia/Tashkent'                => ['+0500', '+0500'],
        'Asia/Tbilisi'                 => ['+0400', '+0500'],
        'Asia/Tehran'                  => ['+031800', '+041800'],
        'Asia/Tel_Aviv'                => ['+0200', '+0300'],
        'Asia/Thimbu'                  => ['+0600', '+0600'],
        'Asia/Thimphu'                 => ['+0600', '+0600'],
        'Asia/Tokyo'                   => ['+0900', '+0900'],
        'Asia/Ujung_Pandang'           => ['+0800', '+0800'],
        'Asia/Ulaanbaatar'             => ['+0800', '+0800'],
        'Asia/Ulan_Bator'              => ['+0800', '+0800'],
        'Asia/Urumqi'                  => ['+0800', '+0800'],
        'Asia/Vientiane'               => ['+0700', '+0700'],
        'Asia/Vladivostok'             => ['+1000', '+1100'],
        'Asia/Yakutsk'                 => ['+0900', '+1000'],
        'Asia/Yekaterinburg'           => ['+0500', '+0600'],
        'Asia/Yerevan'                 => ['+0400', '+0500'],
        'Atlantic/Azores'              => ['-0100', '+0000'],
        'Atlantic/Bermuda'             => ['-0400', '-0300'],
        'Atlantic/Canary'              => ['+0000', '+0100'],
        'Atlantic/Cape_Verde'          => ['-0100', '-0100'],
        'Atlantic/Faeroe'              => ['+0000', '+0100'],
        'Atlantic/Jan_Mayen'           => ['-0100', '-0100'],
        'Atlantic/Madeira'             => ['+0000', '+0100'],
        'Atlantic/South_Georgia'       => ['-0200', '-0200'],
        'Atlantic/Stanley'             => ['-0300', '-0400'],
        'Australia/ACT'                => ['+1100', '+1000'],
        'Australia/Adelaide'           => ['+101800', '+091800'],
        'Australia/Brisbane'           => ['+1000', '+1000'],
        'Australia/Broken_Hill'        => ['+101800', '+091800'],
        'Australia/Canberra'           => ['+1100', '+1000'],
        'Australia/Darwin'             => ['+091800', '+091800'],
        'Australia/Hobart'             => ['+1100', '+1000'],
        'Australia/LHI'                => ['+1100', '+101800'],
        'Australia/Lindeman'           => ['+1000', '+1000'],
        'Australia/Lord_Howe'          => ['+1100', '+101800'],
        'Australia/Melbourne'          => ['+1100', '+1000'],
        'Australia/NSW'                => ['+1100', '+1000'],
        'Australia/North'              => ['+091800', '+091800'],
        'Australia/Perth'              => ['+0800', '+0800'],
        'Australia/Queensland'         => ['+1000', '+1000'],
        'Australia/South'              => ['+101800', '+091800'],
        'Australia/Sydney'             => ['+1100', '+1000'],
        'Australia/Tasmania'           => ['+1100', '+1000'],
        'Australia/Victoria'           => ['+1100', '+1000'],
        'Australia/West'               => ['+0800', '+0800'],
        'Australia/Yancowinna'         => ['+101800', '+091800'],
        'Brazil/Acre'                  => ['-0500', '-0500'],
        'Brazil/DeNoronha'             => ['-0200', '-0200'],
        'Brazil/East'                  => ['-0200', '-0300'],
        'Brazil/West'                  => ['-0400', '-0400'],
        'CET'                          => ['+0100', '+0200'],
        'CST6CDT'                      => ['-0600', '-0500'],
        'Canada/Atlantic'              => ['-0400', '-0300'],
        'Canada/Central'               => ['-0600', '-0500'],
        'Canada/East-Saskatchewan'     => ['-0600', '-0600'],
        'Canada/Eastern'               => ['-0500', '-0400'],
        'Canada/Mountain'              => ['-0700', '-0600'],
        'Canada/Newfoundland'          => ['-031800', '-021800'],
        'Canada/Pacific'               => ['-0800', '-0700'],
        'Canada/Saskatchewan'          => ['-0600', '-0600'],
        'Canada/Yukon'                 => ['-0800', '-0700'],
        'Chile/Continental'            => ['-0300', '-0400'],
        'Chile/EasterIsland'           => ['-0500', '-0600'],
        'Cuba'                         => ['-0500', '-0400'],
        'EET'                          => ['+0200', '+0300'],
        'EST'                          => ['-0500', '-0500'],
        'EST5EDT'                      => ['-0500', '-0400'],
        'Egypt'                        => ['+0200', '+0300'],
        'Eire'                         => ['+0000', '+0100'],
        'Etc/GMT+1'                    => ['-0100', '-0100'],
        'Etc/GMT+10'                   => ['-1000', '-1000'],
        'Etc/GMT+11'                   => ['-1100', '-1100'],
        'Etc/GMT+12'                   => ['-1200', '-1200'],
        'Etc/GMT+2'                    => ['-0200', '-0200'],
        'Etc/GMT+3'                    => ['-0300', '-0300'],
        'Etc/GMT+4'                    => ['-0400', '-0400'],
        'Etc/GMT+5'                    => ['-0500', '-0500'],
        'Etc/GMT+6'                    => ['-0600', '-0600'],
        'Etc/GMT+7'                    => ['-0700', '-0700'],
        'Etc/GMT+8'                    => ['-0800', '-0800'],
        'Etc/GMT+9'                    => ['-0900', '-0900'],
        'Etc/GMT-1'                    => ['+0100', '+0100'],
        'Etc/GMT-10'                   => ['+1000', '+1000'],
        'Etc/GMT-11'                   => ['+1100', '+1100'],
        'Etc/GMT-12'                   => ['+1200', '+1200'],
        'Etc/GMT-13'                   => ['+1300', '+1300'],
        'Etc/GMT-14'                   => ['+1400', '+1400'],
        'Etc/GMT-2'                    => ['+0200', '+0200'],
        'Etc/GMT-3'                    => ['+0300', '+0300'],
        'Etc/GMT-4'                    => ['+0400', '+0400'],
        'Etc/GMT-5'                    => ['+0500', '+0500'],
        'Etc/GMT-6'                    => ['+0600', '+0600'],
        'Etc/GMT-7'                    => ['+0700', '+0700'],
        'Etc/GMT-8'                    => ['+0800', '+0800'],
        'Etc/GMT-9'                    => ['+0900', '+0900'],
        'Europe/Amsterdam'             => ['+0100', '+0200'],
        'Europe/Andorra'               => ['+0100', '+0200'],
        'Europe/Athens'                => ['+0200', '+0300'],
        'Europe/Belfast'               => ['+0000', '+0100'],
        'Europe/Belgrade'              => ['+0100', '+0200'],
        'Europe/Berlin'                => ['+0100', '+0200'],
        'Europe/Bratislava'            => ['+0100', '+0200'],
        'Europe/Brussels'              => ['+0100', '+0200'],
        'Europe/Bucharest'             => ['+0200', '+0300'],
        'Europe/Budapest'              => ['+0100', '+0200'],
        'Europe/Chisinau'              => ['+0200', '+0300'],
        'Europe/Copenhagen'            => ['+0100', '+0200'],
        'Europe/Dublin'                => ['+0000', '+0100'],
        'Europe/Gibraltar'             => ['+0100', '+0200'],
        'Europe/Helsinki'              => ['+0200', '+0300'],
        'Europe/Istanbul'              => ['+0200', '+0300'],
        'Europe/Kaliningrad'           => ['+0200', '+0300'],
        'Europe/Kiev'                  => ['+0200', '+0300'],
        'Europe/Lisbon'                => ['+0000', '+0100'],
        'Europe/Ljubljana'             => ['+0100', '+0200'],
        'Europe/London'                => ['+0000', '+0100'],
        'Europe/Luxembourg'            => ['+0100', '+0200'],
        'Europe/Madrid'                => ['+0100', '+0200'],
        'Europe/Malta'                 => ['+0100', '+0200'],
        'Europe/Minsk'                 => ['+0200', '+0300'],
        'Europe/Monaco'                => ['+0100', '+0200'],
        'Europe/Moscow'                => ['+0300', '+0400'],
        'Europe/Nicosia'               => ['+0200', '+0300'],
        'Europe/Oslo'                  => ['+0100', '+0200'],
        'Europe/Paris'                 => ['+0100', '+0200'],
        'Europe/Prague'                => ['+0100', '+0200'],
        'Europe/Riga'                  => ['+0200', '+0300'],
        'Europe/Rome'                  => ['+0100', '+0200'],
        'Europe/Samara'                => ['+0400', '+0500'],
        'Europe/San_Marino'            => ['+0100', '+0200'],
        'Europe/Sarajevo'              => ['+0100', '+0200'],
        'Europe/Simferopol'            => ['+0200', '+0300'],
        'Europe/Skopje'                => ['+0100', '+0200'],
        'Europe/Sofia'                 => ['+0200', '+0300'],
        'Europe/Stockholm'             => ['+0100', '+0200'],
        'Europe/Tallinn'               => ['+0200', '+0200'],
        'Europe/Tirane'                => ['+0100', '+0200'],
        'Europe/Tiraspol'              => ['+0200', '+0300'],
        'Europe/Uzhgorod'              => ['+0200', '+0300'],
        'Europe/Vaduz'                 => ['+0100', '+0200'],
        'Europe/Vatican'               => ['+0100', '+0200'],
        'Europe/Vienna'                => ['+0100', '+0200'],
        'Europe/Vilnius'               => ['+0200', '+0200'],
        'Europe/Warsaw'                => ['+0100', '+0200'],
        'Europe/Zagreb'                => ['+0100', '+0200'],
        'Europe/Zaporozhye'            => ['+0200', '+0300'],
        'Europe/Zurich'                => ['+0100', '+0200'],
        'GB'                           => ['+0000', '+0100'],
        'GB-Eire'                      => ['+0000', '+0100'],
        'HST'                          => ['-1000', '-1000'],
        'Hongkong'                     => ['+0800', '+0800'],
        'Indian/Antananarivo'          => ['+0300', '+0300'],
        'Indian/Chagos'                => ['+0500', '+0500'],
        'Indian/Christmas'             => ['+0700', '+0700'],
        'Indian/Cocos'                 => ['+061800', '+061800'],
        'Indian/Comoro'                => ['+0300', '+0300'],
        'Indian/Kerguelen'             => ['+0500', '+0500'],
        'Indian/Mahe'                  => ['+0400', '+0400'],
        'Indian/Maldives'              => ['+0500', '+0500'],
        'Indian/Mauritius'             => ['+0400', '+0400'],
        'Indian/Mayotte'               => ['+0300', '+0300'],
        'Indian/Reunion'               => ['+0400', '+0400'],
        'Iran'                         => ['+031800', '+041800'],
        'Israel'                       => ['+0200', '+0300'],
        'Jamaica'                      => ['-0500', '-0500'],
        'Japan'                        => ['+0900', '+0900'],
        'Kwajalein'                    => ['+1200', '+1200'],
        'Libya'                        => ['+0200', '+0200'],
        'MET'                          => ['+0100', '+0200'],
        'MST'                          => ['-0700', '-0700'],
        'MST7MDT'                      => ['-0700', '-0600'],
        'Mexico/BajaNorte'             => ['-0800', '-0700'],
        'Mexico/BajaSur'               => ['-0700', '-0600'],
        'Mexico/General'               => ['-0600', '-0500'],
        'Mideast/Riyadh87'             => ['+03424', '+03424'],
        'Mideast/Riyadh88'             => ['+03424', '+03424'],
        'Mideast/Riyadh89'             => ['+03424', '+03424'],
        'NZ'                           => ['+1300', '+1200'],
        'NZ-CHAT'                      => ['+132700', '+122700'],
        'Navajo'                       => ['-0700', '-0600'],
        'PRC'                          => ['+0800', '+0800'],
        'PST8PDT'                      => ['-0800', '-0700'],
        'Pacific/Apia'                 => ['-1100', '-1100'],
        'Pacific/Auckland'             => ['+1300', '+1200'],
        'Pacific/Chatham'              => ['+132700', '+122700'],
        'Pacific/Easter'               => ['-0500', '-0600'],
        'Pacific/Efate'                => ['+1100', '+1100'],
        'Pacific/Enderbury'            => ['+1300', '+1300'],
        'Pacific/Fakaofo'              => ['-1000', '-1000'],
        'Pacific/Fiji'                 => ['+1200', '+1200'],
        'Pacific/Funafuti'             => ['+1200', '+1200'],
        'Pacific/Galapagos'            => ['-0600', '-0600'],
        'Pacific/Gambier'              => ['-0900', '-0900'],
        'Pacific/Guadalcanal'          => ['+1100', '+1100'],
        'Pacific/Guam'                 => ['+1000', '+1000'],
        'Pacific/Honolulu'             => ['-1000', '-1000'],
        'Pacific/Johnston'             => ['-1000', '-1000'],
        'Pacific/Kiritimati'           => ['+1400', '+1400'],
        'Pacific/Kosrae'               => ['+1100', '+1100'],
        'Pacific/Kwajalein'            => ['+1200', '+1200'],
        'Pacific/Majuro'               => ['+1200', '+1200'],
        'Pacific/Marquesas'            => ['-091800', '-091800'],
        'Pacific/Midway'               => ['-1100', '-1100'],
        'Pacific/Nauru'                => ['+1200', '+1200'],
        'Pacific/Niue'                 => ['-1100', '-1100'],
        'Pacific/Norfolk'              => ['+111800', '+111800'],
        'Pacific/Noumea'               => ['+1100', '+1100'],
        'Pacific/Pago_Pago'            => ['-1100', '-1100'],
        'Pacific/Palau'                => ['+0900', '+0900'],
        'Pacific/Pitcairn'             => ['-0800', '-0800'],
        'Pacific/Ponape'               => ['+1100', '+1100'],
        'Pacific/Port_Moresby'         => ['+1000', '+1000'],
        'Pacific/Rarotonga'            => ['-1000', '-1000'],
        'Pacific/Saipan'               => ['+1000', '+1000'],
        'Pacific/Samoa'                => ['-1100', '-1100'],
        'Pacific/Tahiti'               => ['-1000', '-1000'],
        'Pacific/Tarawa'               => ['+1200', '+1200'],
        'Pacific/Tongatapu'            => ['+1300', '+1300'],
        'Pacific/Truk'                 => ['+1000', '+1000'],
        'Pacific/Wake'                 => ['+1200', '+1200'],
        'Pacific/Wallis'               => ['+1200', '+1200'],
        'Pacific/Yap'                  => ['+1000', '+1000'],
        'Poland'                       => ['+0100', '+0200'],
        'Portugal'                     => ['+0000', '+0100'],
        'ROC'                          => ['+0800', '+0800'],
        'ROK'                          => ['+0900', '+0900'],
        'Singapore'                    => ['+0800', '+0800'],
        'SystemV/AST4'                 => ['-0400', '-0400'],
        'SystemV/AST4ADT'              => ['-0400', '-0300'],
        'SystemV/CST6'                 => ['-0600', '-0600'],
        'SystemV/CST6CDT'              => ['-0600', '-0500'],
        'SystemV/EST5'                 => ['-0500', '-0500'],
        'SystemV/EST5EDT'              => ['-0500', '-0400'],
        'SystemV/HST10'                => ['-1000', '-1000'],
        'SystemV/MST7'                 => ['-0700', '-0700'],
        'SystemV/MST7MDT'              => ['-0700', '-0600'],
        'SystemV/PST8'                 => ['-0800', '-0800'],
        'SystemV/PST8PDT'              => ['-0800', '-0700'],
        'SystemV/YST9'                 => ['-0900', '-0900'],
        'SystemV/YST9YDT'              => ['-0900', '-0800'],
        'Turkey'                       => ['+0200', '+0300'],
        'US/Alaska'                    => ['-0900', '-0800'],
        'US/Aleutian'                  => ['-1000', '-0900'],
        'US/Arizona'                   => ['-0700', '-0700'],
        'US/Central'                   => ['-0600', '-0500'],
        'US/East-Indiana'              => ['-0500', '-0500'],
        'US/Eastern'                   => ['-0500', '-0400'],
        'US/Hawaii'                    => ['-1000', '-1000'],
        'US/Indiana-Starke'            => ['-0500', '-0500'],
        'US/Michigan'                  => ['-0500', '-0400'],
        'US/Mountain'                  => ['-0700', '-0600'],
        'US/Pacific'                   => ['-0800', '-0700'],
        'US/Samoa'                     => ['-1100', '-1100'],
        'W-SU'                         => ['+0300', '+0400'],
        'WET'                          => ['+0000', '+0100']
    ];

    // From date_functions.php

    // takes iCalendar 2 day format and makes it into 3 characters
    // if $txt is true, it returns the 3 letters, otherwise it returns the
    // integer of that day; 0=Sun, 1=Mon, etc.
    /**
     * @param         $day
     * @param  bool   $txt
     * @return string
     */
    public function two2threeCharDays($day, $txt = true)
    {
        switch ($day) {
            case 'SU':
                return ($txt ? 'sun' : '0');
            case 'MO':
                return ($txt ? 'mon' : '1');
            case 'TU':
                return ($txt ? 'tue' : '2');
            case 'WE':
                return ($txt ? 'wed' : '3');
            case 'TH':
                return ($txt ? 'thu' : '4');
            case 'FR':
                return ($txt ? 'fri' : '5');
            case 'SA':
                return ($txt ? 'sat' : '6');
        }
    }

    // dateOfWeek() takes a date in Ymd and a day of week in 3 letters or more
    // and returns the date of that day. (ie: "sun" or "sunday" would be acceptable values of $day but not "su")
    /**
     * @param $Ymd
     * @param $day
     * @return bool|string
     */
    public function dateOfWeek($Ymd, $day)
    {
        if (!isset($this->week_start_day)) {
            $this->week_start_day = 'Sunday';
        }
        $timestamp      = strtotime($Ymd);
        $num            = date('w', strtotime($this->week_start_day));
        $start_day_time = strtotime((date('w', $timestamp) == $num ? (string)$this->week_start_day : "last $this->week_start_day"), $timestamp);
        $ret_unixtime   = strtotime($day, $start_day_time);
        $ret_unixtime   = strtotime('+12 hours', $ret_unixtime);
        $ret            = date('Ymd', $ret_unixtime);

        return $ret;
    }

    // function to compare to dates in Ymd and return the number of weeks
    // that differ between them. requires dateOfWeek()
    /**
     * @param $now
     * @param $then
     * @return float
     */
    public function weekCompare($now, $then)
    {
        $sun_now      = $this->dateOfWeek($now, $this->week_start_day);
        $sun_then     = $this->dateOfWeek($then, $this->week_start_day);
        $seconds_now  = strtotime($sun_now);
        $seconds_then = strtotime($sun_then);
        $diff_seconds = $seconds_now - $seconds_then;
        $diff_minutes = $diff_seconds / 60;
        $diff_hours   = $diff_minutes / 60;
        $diff_days    = round($diff_hours / 24);
        $diff_weeks   = $diff_days / 7;

        return $diff_weeks;
    }

    // function to compare to dates in Ymd and return the number of days
    // that differ between them.
    /**
     * @param $now
     * @param $then
     * @return float
     */
    public function dayCompare($now, $then)
    {
        $seconds_now  = strtotime($now);
        $seconds_then = strtotime($then);
        $diff_seconds = $seconds_now - $seconds_then;
        $diff_minutes = $diff_seconds / 60;
        $diff_hours   = $diff_minutes / 60;
        $diff_days    = round($diff_hours / 24);

        return $diff_days;
    }

    // function to compare to dates in Ymd and return the number of months
    // that differ between them.
    /**
     * @param $now
     * @param $then
     * @return int
     */
    public function monthCompare($now, $then)
    {
        preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})/', $now, $date_now);
        preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})/', $then, $date_then);
        $diff_years  = $date_now[1] - $date_then[1];
        $diff_months = $date_now[2] - $date_then[2];
        if ($date_now[2] < $date_then[2]) {
            --$diff_years;
            $diff_months = ($diff_months + 12) % 12;
        }
        $diff_months = ($diff_years * 12) + $diff_months;

        return $diff_months;
    }

    /**
     * @param $now
     * @param $then
     * @return mixed
     */
    public function yearCompare($now, $then)
    {
        preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})/', $now, $date_now);
        preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})/', $then, $date_then);
        $diff_years = $date_now[1] - $date_then[1];

        return $diff_years;
    }

    // localizeDate() - similar to strftime but uses our preset arrays of localized
    // months and week days and only supports %A, %a, %B, %b, %e, and %Y
    // more can be added as needed but trying to keep it small while we can
    /*function localizeDate($format, $timestamp) {
        global $daysofweek_lang, $daysofweekshort_lang, $daysofweekreallyshort_lang, $monthsofyear_lang, $monthsofyear_lang, $monthsofyearshort_lang;
        $year = date("Y", $timestamp);
        $month = date("n", $timestamp)-1;
        $day = date("j", $timestamp);
        $dayofweek = date("w", $timestamp);

        $date = str_replace('%Y', $year, $format);
        $date = str_replace('%e', $day, $date);
        $date = str_replace('%B', $monthsofyear_lang[$month], $date);
        $date = str_replace('%b', $monthsofyearshort_lang[$month], $date);
        $date = str_replace('%A', $daysofweek_lang[$dayofweek], $date);
        $date = str_replace('%a', $daysofweekshort_lang[$dayofweek], $date);

        return $date;

    }*/
    // calcOffset takes an offset (ie, -0500) and returns it in the number of seconds
    /**
     * @param $offset_str
     * @return int
     */
    public function calcOffset($offset_str)
    {
        $sign  = substr($offset_str, 0, 1);
        $hours = substr($offset_str, 1, 2);
        $mins  = substr($offset_str, 3, 2);
        $secs  = ((int)$hours * 3600) + ((int)$mins * 60);
        if ('-' == $sign) {
            $secs = 0 - $secs;
        }

        return $secs;
    }

    // calcTime calculates the unixtime of a new offset by comparing it to the current offset
    // $have is the current offset (ie, '-0500')
    // $want is the wanted offset (ie, '-0700')
    // $time is the unixtime relative to $have
    /**
     * @param $have
     * @param $want
     * @param $time
     * @return int
     */
    public function calcTime($have, $want, $time)
    {
        if ('none' === $have || 'none' === $want) {
            return $time;
        }
        $have_secs = $this->calcOffset($have);
        $want_secs = $this->calcOffset($want);
        $diff      = $want_secs - $have_secs;
        $time      += $diff;

        return $time;
    }

    /**
     * @param $time
     * @return string
     */
    public function chooseOffset($time)
    {
        return $this->timezone;
        /* ¥µ¥Þ¡¼¥¿¥¤¥à¤Î½èÍý¤ò¤ä¤Ã¤Æ¤¤¤ë¤Î¤À¤í¤¦¤±¤É¡¢¤È¤ê¤¢¤¨¤º¥³¥á¥ó¥È¥¢¥¦¥È
            if (!isset($this->timezone)) $this->timezone = '';
            switch ($this->timezone) {
                case '':
                    $offset = 'none';
                    break;
                case 'Same as Server':
                    $offset = date('O', $time);
                    break;
                default:
                    if (is_array($this->tz_array) && array_key_exists($this->timezone, $this->tz_array)) {
                        $dlst = date('I', $time);
                        $offset = $this->tz_array[$this->timezone][$dlst];
                    } else {
                        $offset = '+0000';
                    }
            }

            return $offset;
        */
    }

    // ¥³¥ó¥¹¥È¥é¥¯¥¿

    /**
     * ICalParser constructor.
     */
    public function __construct()
    {
    }

    // ¥Õ¥¡¥¤¥ë¤ò¥Ñ¡¼¥¹¤·¤Æ¡¢ÆâÉôÊÑ¿ô¤Ë¼è¤ê¹þ¤à

    /**
     * @param $filename
     * @param $calendar_name
     * @return string
     */
    public function parse($filename, $calendar_name)
    {
        $ifile = @fopen($filename, 'r');
        if (false === $ifile) {
            return "-1: File cannot open. filename: $filename";
        }
        $nextline = fgets($ifile, 1024);
        if ('BEGIN:VCALENDAR' !== trim($nextline)) {
            return "-2: This file is not iCalendar(RFC2445). filename: $filename";
        }

        // Set a value so we can check to make sure $master_array contains valid data
        // $master_array['-1'] = 'valid cal file';

        // Set default calendar name - can be overridden by X-WR-CALNAME
        // $calendar_name = $filename;
        // $master_array['calendar_name'] = $filename;

        // auxiliary array for determining overlaps of events
        //  $overlap_array = array ();

        // using $uid to set specific points in array, if $uid is not in the
        // .ics file, we need to have some unique place in the array
        $uid_counter = 0;

        // read file in line by line
        // XXX end line is skipped because of the 1-line readahead
        while (!feof($ifile)) {
            $line     = $nextline;
            $nextline = fgets($ifile, 1024);
            $nextline = preg_replace("/[\r\n]/", '', $nextline);
            while (' ' === substr($nextline, 0, 1)) {
                $line     .= substr($nextline, 1);
                $nextline = fgets($ifile, 1024);
                $nextline = preg_replace("/[\r\n]/", '', $nextline);
            }
            $line = trim($line);
            if ('BEGIN:VEVENT' === $line) {
                // each of these vars were being set to an empty string
                unset($start_time, $end_time, $start_date, $end_date, $summary, $allday_start, $allday_end, $start, $end, $the_duration, $beginning, $rrule, $start_of_vevent, $description, $status, $class, $categories, $contact, $location, $dtstamp, $sequence, $tz_dtstart, $tz_dtend, $event_tz, $valarm_description, $start_unixtime, $end_unixtime, $recurrence_id, $uid, $uid_valid);

                $except_dates   = [];
                $except_times   = [];
                $first_duration = true;
                $count          = 1000000;
                $valarm_set     = false;
            } elseif ('END:VEVENT' === $line) {
                // make sure we have some value for $uid
                if (!isset($uid)) {
                    $uid = $uid_counter;
                    ++$uid_counter;
                    $uid_valid = false;
                } else {
                    $uid_valid = true;
                }

                if (empty($summary)) {
                    $summary = '';
                }
                if (empty($description)) {
                    $description = '';
                }
                if (empty($location)) {
                    $location = '';
                }
                if (empty($contact)) {
                    $contact = '';
                }
                if (empty($sequence)) {
                    $sequence = 0;
                }
                if (empty($rrule)) {
                    $rrule = '';
                }

                // Handling of the all day events¡ÊÁ´Æü¥¤¥Ù¥ó¥È¡Ë
                if (isset($allday_start) && '' !== $allday_start) {
                    $start_unixtime = strtotime($allday_start);
                    if (isset($allday_end) && '' !== $allday_end) {
                        $end_unixtime = strtotime($allday_end);
                        if ($start_unixtime == $end_unixtime) {
                            $end_unixtime = $start_unixtime + 86400;
                        }
                    } else {
                        // allday_end ¤Î»ØÄê¤¬¤Ê¤±¤ì¤Ð°ìÆü¤Î¤ß¤È¸«¤Ê¤¹
                        $end_unixtime = $start_unixtime + 86400;
                    }
                }

                $this->events[$uid] = compact('start_unixtime', 'end_unixtime', 'summary', 'description', 'status', 'class', 'categories', 'contact', 'location', 'dtstamp', 'sequence', 'allday_start', 'allday_end', 'tz_dtstart', 'tz_dtend', 'event_tz', 'rrule', 'uid_valid');    // GIJ added 03/05/27

                // Begin VTODO Support
                /*      } elseif ($line == 'END:VTODO') {
                            if ((!$vtodo_priority) && ($status == 'COMPLETED')) {
                                $vtodo_sort = 11;
                            } elseif (!$vtodo_priority) {
                                $vtodo_sort = 10;
                            } else {
                                $vtodo_sort = $vtodo_priority;
                            }
                            $master_array['-2']["$vtodo_sort"]["$uid"] = array ('start_date' => $start_date, 'start_time' => $start_time, 'vtodo_text' => $summary, 'due_date'=> $due_date, 'due_time'=> $due_time, 'completed_date' => $completed_date, 'completed_time' => $completed_time, 'priority' => $vtodo_priority, 'status' => $status, 'class' => $class, 'categories' => $vtodo_categories);
                            unset ($due_date, $due_time, $completed_date, $completed_time, $vtodo_priority, $status, $class, $vtodo_categories, $summary);
                            $vtodo_set = FALSE;
                        } elseif ($line == 'BEGIN:VTODO') {
                            $vtodo_set = TRUE;
                        } elseif ($line == 'BEGIN:VALARM') {
                            $valarm_set = TRUE;
                        } elseif ($line == 'END:VALARM') {
                            $valarm_set = FALSE;
                */
            } else {
                unset($field, $data, $prop_pos, $property);
                preg_match('(/[^:]+):(.*)/', $line, $line);
                $field = $line[1];
                $data  = $line[2];

                $property = $field;
                $prop_pos = strpos($property, ';');
                if (false !== $prop_pos) {
                    $property = substr($property, 0, $prop_pos);
                }
                $property = strtoupper($property);

                switch ($property) {

                    // Start VTODO Parsing
                    //
                    /*              case 'DUE':
                                        $zulu_time = false;
                                        if (substr($data,-1) == 'Z') $zulu_time = true;
                                        $data = preg_replace('/T/', '', $data);
                                        $data = preg_replace('/Z/', '', $data);
                                        if (preg_match("/^DUE;VALUE=DATE/i", $field)) {
                                            $allday_start = $data;
                                            $start_date = $allday_start;
                                        } else {
                                            if (preg_match("/^DUE;TZID=/i", $field)) {
                                                $tz_tmp = explode('=', $field);
                                                $tz_due = $tz_tmp[1];
                                                unset($tz_tmp);
                                            } elseif ($zulu_time) {
                                                $tz_due = 'GMT';
                                            }

                                            preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $data, $regs);
                                            $start_date = $regs[1] . $regs[2] . $regs[3];
                                            $start_time = $regs[4] . $regs[5];
                                            $start_unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);

                                            $dlst = date('I', $start_unixtime);
                                            $server_offset_tmp = $this->chooseOffset($start_unixtime);
                                            if (isset($tz_due)) {
                                                if (array_key_exists($tz_due, $this->tz_array)) {
                                                    $offset_tmp = $this->tz_array[$tz_due][$dlst];
                                                } else {
                                                    $offset_tmp = '+0000';
                                                }
                                            } elseif (isset($calendar_tz)) {
                                                if (array_key_exists($calendar_tz, $this->tz_array)) {
                                                    $offset_tmp = $this->tz_array[$calendar_tz][$dlst];
                                                } else {
                                                    $offset_tmp = '+0000';
                                                }
                                            } else {
                                                $offset_tmp = $server_offset_tmp;
                                            }
                                            $start_unixtime = $this->calcTime($offset_tmp, $server_offset_tmp, $start_unixtime);
                                            $due_date = date('Ymd', $start_unixtime);
                                            $due_time = date('Hi', $start_unixtime);
                                            unset($server_offset_tmp);
                                        }
                                        break;
                    */
                    /*              case 'COMPLETED':
                                        $zulu_time = false;
                                        if (substr($data,-1) == 'Z') $zulu_time = true;
                                        $data = ereg_replace('T', '', $data);
                                        $data = ereg_replace('Z', '', $data);
                                        if (preg_match("/^COMPLETED;VALUE=DATE/i", $field)) {
                                            $allday_start = $data;
                                            $start_date = $allday_start;
                                        } else {
                                            if (preg_match("/^COMPLETED;TZID=/i", $field)) {
                                                $tz_tmp = explode('=', $field);
                                                $tz_completed = $tz_tmp[1];
                                                unset($tz_tmp);
                                            } elseif ($zulu_time) {
                                                $tz_completed = 'GMT';
                                            }

                                            ereg ('([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})', $data, $regs);
                                            $start_date = $regs[1] . $regs[2] . $regs[3];
                                            $start_time = $regs[4] . $regs[5];
                                            $start_unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);

                                            $dlst = date('I', $start_unixtime);
                                            $server_offset_tmp = $this->chooseOffset($start_unixtime);
                                            if (isset($tz_completed)) {
                                                if (array_key_exists($tz_completed, $this->tz_array)) {
                                                    $offset_tmp = $this->tz_array[$tz_completed][$dlst];
                                                } else {
                                                    $offset_tmp = '+0000';
                                                }
                                            } elseif (isset($calendar_tz)) {
                                                if (array_key_exists($calendar_tz, $this->tz_array)) {
                                                    $offset_tmp = $this->tz_array[$calendar_tz][$dlst];
                                                } else {
                                                    $offset_tmp = '+0000';
                                                }
                                            } else {
                                                $offset_tmp = $server_offset_tmp;
                                            }
                                            $start_unixtime = $this->calcTime($offset_tmp, $server_offset_tmp, $start_unixtime);
                                            $completed_date = date('Ymd', $start_unixtime);
                                            $completed_time = date('Hi', $start_unixtime);
                                            unset($server_offset_tmp);
                                        }
                                        break;

                                    case 'PRIORITY':
                                        $vtodo_priority = "$data";
                                        break;
                    */
                    case 'STATUS':
                        // VEVENT: TENTATIVE, CONFIRMED, CANCELLED
                        // VTODO: NEEDS-ACTION, COMPLETED, IN-PROCESS, CANCELLED
                        $status = (string)$data;
                        break;

                    case 'CLASS':
                        // VEVENT, VTODO: PUBLIC, PRIVATE, CONFIDENTIAL
                        $class = (string)$data;
                        break;

                    case 'CATEGORIES':
                        $categories = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;
                    //
                    // End VTODO Parsing

                    case 'DTSTART':
                        $zulu_time = false;
                        if ('Z' === substr($data, -1)) {
                            $zulu_time = true;
                        }
                        $data  = preg_replace('/T/', '', $data);
                        $data  = preg_replace('/Z/', '', $data);
                        $field = preg_replace('/;VALUE=DATE-TIME/', '', $field);
                        if (preg_match('/^DTSTART;VALUE=DATE/i', $field)) {
                            $allday_start = $data;
                            $start_date   = $allday_start;
                        } else {
                            if (preg_match('/^DTSTART;TZID=/i', $field)) {
                                $tz_tmp     = explode('=', $field);
                                $tz_dtstart = $tz_tmp[1];
                                unset($tz_tmp);
                            } elseif ($zulu_time) {
                                $tz_dtstart = 'GMT';
                            }

                            preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $data, $regs);
                            $start_date     = $regs[1] . $regs[2] . $regs[3];
                            $start_time     = $regs[4] . $regs[5];
                            $start_unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);

                            $dlst              = date('I', $start_unixtime);
                            $server_offset_tmp = $this->chooseOffset($start_unixtime);
                            if (isset($tz_dtstart)) {
                                if (array_key_exists($tz_dtstart, $this->tz_array)) {
                                    $offset_tmp = $this->tz_array[$tz_dtstart][$dlst];
                                } else {
                                    $offset_tmp = '+0000';
                                }
                            } elseif (isset($calendar_tz)) {
                                if (array_key_exists($calendar_tz, $this->tz_array)) {
                                    $offset_tmp = $this->tz_array[$calendar_tz][$dlst];
                                } else {
                                    $offset_tmp = '+0000';
                                }
                                $tz_dtstart = $calendar_tz; // GIJ added
                            } else {
                                $offset_tmp = $server_offset_tmp;
                            }
                            $start_unixtime = $this->calcTime($offset_tmp, $server_offset_tmp, $start_unixtime);
                            $event_tz       = $this->calcOffset($offset_tmp) / 3600;
                            $start_date     = date('Ymd', $start_unixtime);
                            $start_time     = date('Hi', $start_unixtime);
                            unset($server_offset_tmp);
                        }
                        break;

                    case 'DTEND':
                        $zulu_time = false;
                        if ('Z' === substr($data, -1)) {
                            $zulu_time = true;
                        }
                        $data  = preg_replace('/T/', '', $data);
                        $data  = preg_replace('/Z/', '', $data);
                        $field = preg_replace('/;VALUE=DATE-TIME/', '', $field);
                        if (preg_match('/^DTEND;VALUE=DATE/i', $field)) {
                            $allday_end = $data;
                        } else {
                            if (preg_match('/^DTEND;TZID=/i', $field)) {
                                $tz_tmp   = explode('=', $field);
                                $tz_dtend = $tz_tmp[1];
                                unset($tz_tmp);
                            } elseif ($zulu_time) {
                                $tz_dtend = 'GMT';
                            }

                            preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $data, $regs);
                            $end_date     = $regs[1] . $regs[2] . $regs[3];
                            $end_time     = $regs[4] . $regs[5];
                            $end_unixtime = mktime($regs[4], $regs[5], 0, $regs[2], $regs[3], $regs[1]);

                            $dlst              = date('I', $end_unixtime);
                            $server_offset_tmp = $this->chooseOffset($end_unixtime);
                            if (isset($tz_dtend)) {
                                $offset_tmp = $this->tz_array[$tz_dtend][$dlst];
                            } elseif (isset($calendar_tz)) {
                                $offset_tmp = $this->tz_array[$calendar_tz][$dlst];
                                $tz_dtend   = $calendar_tz; // GIJ added
                            } else {
                                $offset_tmp = $server_offset_tmp;
                            }
                            $end_unixtime = $this->calcTime($offset_tmp, $server_offset_tmp, $end_unixtime);
                            if (!isset($event_tz)) {
                                $event_tz = $this->calcOffset($offset_tmp) / 3600;
                            }
                            $end_date = date('Ymd', $end_unixtime);
                            $end_time = date('Hi', $end_unixtime);
                            unset($server_offset_tmp);
                        }
                        break;

                    /*              case 'EXDATE':
                                        $data = explode(",", $data);
                                        foreach ($data as $exdata) {
                                            $exdata = preg_replace('/T/', '', $exdata);
                                            $exdata = preg_replace('/Z/', '', $exdata);
                                            preg_match ('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{0,2})([0-9]{0,2})/', $exdata, $regs);
                                            $except_dates[] = $regs[1] . $regs[2] . $regs[3];
                                            $except_times[] = $regs[4] . $regs[5];
                                        }
                                        break;
                    */
                    case 'SUMMARY':
                        $summary = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;

                    case 'DESCRIPTION':
                        $description = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;

                    case 'CONTACT':
                        // RFC2445 4.8.4.2  GIJ added
                        $contact = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;

                    case 'LOCATION':
                        // RFC2445 4.8.1.7  GIJ added
                        $location = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;

                    case 'DTSTAMP':
                        // RFC2445 4.8.7.2  GIJ added
                        $data    = str_replace('T', '', $data);
                        $dtstamp = str_replace('Z', '', $data);
                        break;

                    case 'SEQUENCE':
                        // RFC2445 4.8.7.4  GIJ added
                        $sequence = (int)$data;
                        break;

                    case 'UID':
                        $uid = $data;
                        break;

                    case 'X-WR-CALNAME':
                        $calendar_name = mb_convert_encoding($data, mb_internal_encoding(), 'UTF-8');
                        break;

                    case 'X-WR-TIMEZONE':
                        $calendar_tz = $data;
                        break;

                    /*              case 'DURATION':
                                        if (($first_duration === true) && (!stristr($field, '=DURATION'))) {
                                            preg_match('/^P([0-9]{1,2})?([W,D]{0,1}[T])?([0-9]{1,2}[H])?([0-9]{1,2}[M])?([0-9]{1,2}[S])?/', $data, $duration);
                                            if ($duration[2] = 'W') {
                                                $weeks = $duration[1];
                                                $days = 0;
                                            } else {
                                                $days = $duration[1];
                                                $weeks = 0;
                                            }
                                            $hours = preg_replace('/H/', '', $duration[3]);
                                            $minutes = preg_replace('/M/', '', $duration[4]);
                                            $seconds = preg_replace('/S/', '', $duration[5]);
                                            $the_duration = ($weeks * 60 * 60 * 24 * 7) + ($days * 60 * 60 * 24) + ($hours * 60 * 60) + ($minutes * 60) + ($seconds);
                                            $end_unixtime = $start_unixtime + $the_duration;
                                            $end_time = date ('Hi', $end_unixtime);
                                            $first_duration = FALSE;
                                        }
                                        break;
                    */
                    case 'RRULE':
                        $rrule = strtoupper($data);
                        break;

                    /*              case 'ATTENDEE':
                                        $attendee = $data;
                                        break;
                    */
                }
            }
        }

        //If you want to see the values in the arrays, uncomment below.
        //print '<pre>';
        //print_r($this->events);
        //print_r($rrule);
        //print '</pre>';
        return "0: $calendar_name :";
    }

    // ¥Ñ¡¼¥¹¤·¤¿iCalendar¥Ç¡¼¥¿¤«¤é¡¢INSERT,UPDATEÍÑ¤ÎSETÊ¸ÇÛÎó¤òÀ¸À®¤¹¤ë´Ø¿ô

    /**
     * @return array
     */
    public function output_setsqls()
    {
        $rets = [];

        foreach ($this->events as $uid => $event) {
            $ret = '';

            // $event[] ¤ò¥í¡¼¥«¥ëÊÑ¿ô¤ËÅ¸³«
            unset($start_unixtime, $end_unixtime, $summary, $description, $status, $class, $categories, $contact, $location, $dtstamp, $sequence, $allday_start, $allday_end, $tz_dtstart, $tz_dtend, $event_tz, $uid_valid);
            extract($event);

            // Unique-ID (¼«Æ°ÉÕ²ÃÈÖ¹æ¤Î¾ì¹ç¤Ï¡¢¤½¤ì¤Ã¤Ý¤¯À¸À®¤¹¤ë)
            if (!$uid_valid) {
                $unique_id = 'apcal060-' . md5("{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}") . "-$uid";
            } else {
                $unique_id = $uid;
            }
            $ret .= "unique_id='" . addslashes($unique_id) . "',";

            // DTEND¤Îµ­½Ò¤¬¤Ê¤¤¥Ç¡¼¥¿¤Ø¤ÎÂÐºö
            if (!isset($end_unixtime)) {
                $end_unixtime = $start_unixtime + 300;
            }

            // start¤Èend¤¬È¿Å¾¤·¤Æ¤¤¤ë¥Ç¡¼¥¿¤Ø¤ÎÂÐºö
            if ($start_unixtime > $end_unixtime) {
                list($start_unixtime, $end_unixtime) = [$end_unixtime, $start_unixtime];
            }

            // 5Ê¬Ã±°Ì¤ËÂ·¤¨¤ë
            $start_unixtime = (int)($start_unixtime / 300) * 300;
            $end_unixtime   = (int)($end_unixtime / 300) * 300;

            // »þ´Ö¤Î¥»¥Ã¥È
            $ret .= "start='$start_unixtime',end='$end_unixtime',";
            if (isset($allday_start) && '' !== $allday_start) {
                // Á´Æü¥¤¥Ù¥ó¥È
                $ret .= "allday='1',";
            } else {
                // ÄÌ¾ï¥¤¥Ù¥ó¥È
                $ret .= "allday='0',";
            }

            // tzid ¤Îµ­Ï¿¡Ê°ì±þ¡Ë
            if (isset($tz_dtstart) && '' !== $tz_dtstart) {
                $ret .= "tzid='$tz_dtstart',";
            } elseif (isset($tz_dtend) && '' !== $tz_dtend) {
                $ret .= "tzid='$tz_dtend',";
            }

            // event_tz ¤Îµ­Ï¿
            if (isset($event_tz)) {
                $ret .= "event_tz='$event_tz',";
            }

            // summary¤Î¥Á¥§¥Ã¥¯¡ÊÌ¤µ­Æþ¤Ê¤é¤½¤Î»Ý¤òÄÉ²Ã¡Ë
            if (empty($summary) || '' === $summary) {
                $event['summary'] = '¡Ê·ïÌ¾¤Ê¤·¡Ë';
            }

            // ¤½¤ÎÂ¾¤Î¥«¥é¥à (dtstamp ¤Ï¤¢¤¨¤Æ³°¤¹)
            $cols = [
                'summary'     => '255:J:1',
                'location'    => '255:J:0',
                'contact'     => '255:J:0',
                'categories'  => '255:J:0',
                'rrule'       => '255:E:0', /* "dtstamp" => "14:E:0" ,*/
                'sequence'    => 'I:N:0',
                'description' => 'A:J:0'
            ];
            $ret  .= $this->get_sql_set($event, $cols);

            $rets[] = $ret;
        }

        return $rets;
    }

    // Ï¢ÁÛÇÛÎó¤ò°ú¿ô¤Ë¼è¤ê¡¢$event¤«¤éINSERT,UPDATEÍÑ¤ÎSETÊ¸¤òÀ¸À®¤¹¤ë¥¯¥é¥¹´Ø¿ô

    /**
     * @param $event
     * @param $cols
     * @return string
     */
    public function get_sql_set($event, $cols)
    {
        $ret = '';

        foreach ($cols as $col => $types) {
            list($field, $lang, $essential) = explode(':', $types);

            $data = empty($event[$col]) ? '' : $event[$col];

            // ¸À¸ì¡¦¿ô»ú¤Ê¤É¤ÎÊÌ¤Ë¤è¤ë½èÍý
            switch ($lang) {
                case 'N':    // ¿ôÃÍ (·å¼è¤ê¤Î , ¤ò¼è¤ë)
                    $data = str_replace(',', '', $data);
                    break;
                case 'J':    // ÆüËÜ¸ì¥Æ¥­¥¹¥È (È¾³Ñ¥«¥Ê¢ªÁ´³Ñ¤«¤Ê)
                    $data = $this->mb_convert_kana($data, 'KV');
                    break;
                case 'E':    // È¾³Ñ±Ñ¿ô»ú¤Î¤ß (Á´³Ñ±Ñ¿ô¢ªÈ¾³Ñ±Ñ¿ô)
                    $data = $this->mb_convert_kana($data, 'as');
                    break;
            }

            // ¥Õ¥£¡¼¥ë¥É¤Î·¿¤Ë¤è¤ë½èÍý
            switch ($field) {
                case 'A':    // textarea
                    $data = $this->textarea_sanitizer_for_sql($data);
                    break;
                case 'I':    // integer
                    $data = (int)$data;
                    break;
                default:    // varchar(¥Ç¥Õ¥©¥ë¥È)¤Ï¿ôÃÍ¤Ë¤è¤ëÊ¸»ú¿ô»ØÄê
                    $data = $this->text_sanitizer_for_sql($data);
                    if ($field < 1) {
                        $field = 255;
                    }
                    $data = mb_strcut($data, 0, $field);
            }

            // ºÇ¸å¤Ëaddslashes
            $data = addslashes($data);

            $ret .= "$col='$data',";
        }

        // ºÇ¸å¤Î , ¤òºï½ü
        $ret = substr($ret, 0, -1);

        return $ret;
    }

    // mb_convert_kana¤Î½èÍý

    /**
     * @param $str
     * @param $option
     * @return string
     */
    public function mb_convert_kana($str, $option)
    {
        // convert_kana ¤Î½èÍý¤Ï¡¢ÆüËÜ¸ì¤Ç¤Î¤ß¹Ô¤¦
        if ('japanese' !== $this->language || !function_exists('mb_convert_kana')) {
            return $str;
        } else {
            return mb_convert_kana($str, $option);
        }
    }

    // ¥µ¥Ë¥¿¥¤¥º´ØÏ¢¤Î´Ø¿ô (¥µ¥Ö¥¯¥é¥¹¤òºîÀ®¤¹¤ë»þ¤ÎOverrideÂÐ¾Ý)

    /**
     * @param $data
     * @return string
     */
    public function textarea_sanitizer_for_sql($data)
    {
        // '\n' ¤ò "\n" ¤Ë¤¹¤ë
        $data = str_replace('\n', "\n", $data);

        if (class_exists('MyTextSanitizer')) {
            // XOOPS¤Î¥µ¥Ë¥¿¥¤¥¶¥¯¥é¥¹¤¬¤¢¤ì¤Ð¡¢¸ÄÊÌ¤Ëbb code¥¿¥°¤Ø¤ÎÊÑ´¹¤ò¤·¤Æ¤ß¤ë
            $search  = [
                "/mailto:(\S+)(\s)/i",
                "/http:\/\/(\S+)(\s)/i"
            ];
            $replace = [
                "[email]\\1[/email]\\2",
                "[url=\\1]\\1[/url]\\2"
            ];
            $data    = preg_replace($search, $replace, $data);

            return strip_tags($data);
        } else {
            // ¤Ê¤±¤ì¤Ð¡¢Ã±¤ËÁ´¥¿¥°¤òÌµ¸ú¤È¤¹¤ë
            return strip_tags($data);
        }
    }

    /**
     * @param $data
     * @return string
     */
    public function text_sanitizer_for_sql($data)
    {
        // Á´¥¿¥°¤òÌµ¸ú¤È¤¹¤ësanitize
        // ¼ÂºÝ¤Ë¤Ï¡¢Outlook¤Ê¤É¤Ç¤Ï¥¿¥°¤òÄ¾½ñ¤­¤¹¤ë¤Î¤Ç¡¢²èÌÌ½ÐÎÏ¤Î¥µ¥Ë¥¿¥¤¥º¤µ¤¨
        // ¤­¤Á¤ó¤È¹Ô¤ï¤ì¤Æ¤¤¤ë¤Î¤Ç¤¢¤ì¤Ð¡¢¤³¤³¤Ç¤Îstrip_tags ¤Ï¾Ã¤·¤Æ¤âÎÉ¤¤¤Ï¤º
        return strip_tags($data);
    }

    // The End of Class
}
