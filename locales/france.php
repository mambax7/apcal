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
 * @author       Antiques Promotion (http://www.antiquespromotion.ca)
 */
if (!function_exists('easter')) {
    /**
     * @param $y
     * @param $holidays
     * @return int
     */
    function easter($y, &$holidays)
    {
        $e = 21 + easter_days($y);
        if ($e > 31) {
            $e  -= 31;
            $em = 4;
        } else {
            $em = 3;
        }

        return strtotime("$y-$em-$e");
    }
}

$this->holidays = [];
$start          = (int)date('Y') - 10;
$end            = $start + 30;

for ($y = $start; $y < $end; ++$y) {
    $e  = easter($y, $this->holidays);
    $ve = date('Y-n-j', strtotime('-2 days', $e));
    $le = date('Y-n-j', strtotime('+1 days', $e));
    $a  = date('Y-n-j', strtotime('+39 days', $e));
    $p  = date('Y-n-j', strtotime('+49 days', $e));
    $lp = date('Y-n-j', strtotime('+50 days', $e));

    $this->holidays["$y-1-1"]          = 'Nouvel an';
    $this->holidays["$y-2-14"]         = 'St-Valentin';
    $this->holidays[$ve]               = 'Vendredi Saint';
    $this->holidays[date('Y-n-j', $e)] = 'P&acirc;ques';
    $this->holidays[$le]               = 'Lundi de P&acirc;ques';
    $this->holidays[$a]                = 'Ascension';
    $this->holidays[$p]                = 'Pentec&ocirc;te';
    $this->holidays[$lp]               = 'Lundi de Pentec&ocirc;te';
    $this->holidays["$y-5-1"]          = 'F&ecirc;te du travail';
    $this->holidays["$y-5-8"]          = 'Victoire';
    $this->holidays["$y-7-14"]         = 'F&ecirc;te Nationale';
    $this->holidays["$y-8-15"]         = 'Assomption';
    $this->holidays["$y-11-1"]         = 'Toussaint';
    $this->holidays["$y-11-11"]        = 'Armistice';
    $this->holidays["$y-12-25"]        = 'No&euml;l';
}
