<?php

namespace XoopsModules\Apcal;

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
class CssParser
{
    public $_css = '';

    /**
     * CssParser constructor.
     * @param string $filename
     */
    public function __construct($filename = 'style.css')
    {
        global $xoopsConfig;

        $this->_css = file_get_contents(XOOPS_THEME_PATH . '/' . $xoopsConfig['theme_set'] . '/' . $filename);
    }

    /**
     * @param $selector
     * @param $style
     * @return bool|string
     */
    public function parseColor($selector, $style)
    {
        $match = [];

        if (preg_match('/[\.\S]*' . $selector . '([^a-zA-Z0-9]{1}[\.\S]*{|{)([\s\S][^{}]+)(})/', $this->_css, $match)) {
            preg_match('/[^-]*' . $style . '([^;]*):([^;]*)#([a-zA-Z0-9]+)/', $match[2], $match);
        }
        if (is_array($match) && array_key_exists(3, $match)) {
            return '#' . (3 == mb_strlen($match[3]) ? $match[3][0] . $match[3][0] . $match[3][1] . $match[3][1] . $match[3][2] . $match[3][2] : $match[3]);
        }

        return false;
    }
}
