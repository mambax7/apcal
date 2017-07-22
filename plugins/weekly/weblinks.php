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
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package
 * @since
 * @author       XOOPS Development Team,
 */

// a plugin for weblinks

defined('XOOPS_ROOT_PATH') || exit('XOOPS Root Path not defined');

/*
    $db : db instance
    $myts : MyTextSanitizer instance
    $this->year : year
    $this->month : month
    $this->date : date
    $this->week_start : sunday:0 monday:1
    $this->user_TZ : user's timezone (+1.5 etc)
    $this->server_TZ : server's timezone (-2.5 etc)
    $tzoffset_s2u : the offset from server to user
    $now : the result of time()
    $plugin = array('dirname'=>'dirname','name'=>'name','dotgif'=>'*.gif')

    $plugin_returns[ DATE ][]
*/

// set range (added 86400 second margin "begin" & "end")
$wtop_date     = $this->date - ($this->day - $this->week_start + 7) % 7;
$range_start_s = mktime(0, 0, 0, $this->month, $wtop_date - 1, $this->year);
$range_end_s   = mktime(0, 0, 0, $this->month, $wtop_date + 8, $this->year);

// query (added 86400 second margin "begin" & "end")
$result = $db->query('SELECT title,lid,`time_update` FROM ' . $db->prefix('weblinks_link') . " WHERE `time_update` >= $range_start_s AND `time_update` < $range_end_s");

while (list($title, $id, $server_time) = $db->fetchRow($result)) {
    $user_time = $server_time + $tzoffset_s2u;
    // if( date( 'n' , $user_time ) != $this->month ) continue ;
    $target_date = date('j', $user_time);
    $tmp_array   = array(
        'dotgif'      => $plugin['dotgif'],
        'dirname'     => $plugin['dirname'],
        'link'        => XOOPS_URL . "/modules/{$plugin['dirname']}/singlelink.php?lid=$id&amp;caldate={$this->year}-{$this->month}-$target_date",
        'id'          => $id,
        'server_time' => $server_time,
        'user_time'   => $user_time,
        'name'        => 'lid',
        'title'       => $myts->htmlSpecialChars($title)
    );

    // multiple gifs allowed per a plugin & per a day
    $plugin_returns[$target_date][] = $tmp_array;
}
