<{*
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                  Copyright (c) 2000-2016 XOOPS.org                        //
//                       <http://xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

/**
 * @copyright   XOOPS Project (http://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Antiques Promotion (http://www.antiquespromotion.ca)
 * @author      GIJ=CHECKMATE (PEAK Corp. http://www.peak.ne.jp/)
 */
 *}>

<script type="text/javascript" src="<{$xoops_url}>/modules/APCal/assets/images/js/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="<{$xoops_url}>/modules/APCal/assets/images/js/highslide/highslide.css" />
<script type="text/javascript">
    hs.graphicsDir = '<{$xoops_url}>/modules/APCal/assets/images/js/highslide/graphics/';
    hs.align = 'center';
    hs.transitions = ['expand', 'crossfade'];
    hs.outlineType = 'glossy-dark';
    hs.wrapperClassName = 'dark';
    hs.fadeInOut = true;

    // Add the controlbar
    if (hs.addSlideshow) hs.addSlideshow({
        interval: 5000,
        repeat: false,
        useControls: true,
        fixedControls: 'fit',
        overlayOptions: {
            opacity: .6,
            position: 'bottom center',
            hideOnMouseOut: true
        }
    });
</script>

<{if $block.num_rows == 0}>
  <{$block.lang_APCAL_MB_APCALNOEVENT}>
<{/if}>

  <dl>
    <{foreach item=event from=$block.events}>
      <dt>
        <{if $block.showPictures > 0 && $event.picture != ''}>
        <font size='2'>
            <a href="<{$xoops_upload_url}>/APCal/<{$event.picture}>" class="highslide" title="<{$event.summary}>" onclick="return hs.expand(this)">
                <img src="<{$xoops_upload_url}>/APCal/thumbs/<{$event.picture}>" alt="<{$event.summary}>" title="<{$event.summary}>" style='max-width: 18px; max-height: 20px;' />
            </a>
        <{else}>
        <font size='2'>
            <img src="<{$block.images_url}>/<{$event.dot_gif}>" alt="<{$event.summary}>" title="<{$event.summary}>" style='max-width: 18px; max-height: 20px;' />&nbsp;
        <{/if}>

        <{if $event.distance == 0}>
            <{$block.lang_APCAL_MB_APCALCONTINUING}> - <{$event.end_desc}>
        <{elseif $event.distance == 1}>
            <{$event.start_desc}> - <{$event.end_desc}>
        <{elseif $event.distance == 2}>
            <{$event.start_desc}><{if $event.multiday}> - <{$event.end_desc}><{/if}>
        <{else}>
            <{$event.start_desc}><{if $event.multiday}> - <{$event.end_desc}><{/if}>
        <{/if}>
        </font>
      </dt>
      <dd style='margin-left:20px;'>
        <font size='2'><a href='<{$block.get_target}>?smode=Daily&amp;action=View&amp;event_id=<{$event.id}>&amp;caldate=<{$block.caldate}>' class='calsummary' title='<{$event.mainCat}> - <{$event.location}>'><{$event.summary}></a></font>
      </dd>
    <{/foreach}>
  </dl>

  <{if $block.num_rows_rest > 0}>
    <table border='0' cellspacing='0' cellpadding='0' width='100%'>
      <tr>
        <td><small><a href="<{$xoops_url}>/modules/APCal"><{$block.lang_APCAL_MB_APCALRESTEVENT_PRE}> <{$block.num_rows_rest}> <{$block.lang_APCAL_MB_APCALRESTEVENT_SUF}></a></small></td>
      </tr>
    </table>
  <{/if}>

  <{if $block.insertable <> false}>
    <table border='0' cellspacing='0' cellpadding='0' width='100%'>
      <tr>
       <td align='left'>
         <font size='2'><small><a href='<{$block.get_target}>?smode=Daily&amp;action=Edit&amp;caldate=<{$block.caldate}>'>
           <img src='<{$block.images_url}>/addevent.gif' border='0' width='14' height='12' /><{$block.lang_APCAL_MB_APCALADDEVENT}>
         </a></small></font>
       </td>
      </tr>
    </table>
  <{/if}>