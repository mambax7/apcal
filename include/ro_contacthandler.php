<?php

/**
 * @param $strcontact
 * @return string
 */
function convertmycontacts($strcontact)
{
    // Ermitteln aller einzelnen Wörter von Kontakt aus Termin piCal
    // Umwandeln der einzelnen Namen in Link auf Benutzerkonto, wenn Name ein Mitgliedsname ist
    $strsearch    = ' ';
    $strnew       = '';
    $strseperator = '';

    $pos1 = 0;
    $pos2 = strpos($strcontact, $strsearch, $pos1);

    if (false === $pos2) {
        //echo "<br>kein leerzeichen";
        $struser = $strcontact;
        $struid  = getuid($struser);
        if (-1 == $struid) {
            $strnew = $struser;
        } else {
            $strnew = "<a href='" . XOOPS_URL . '/userinfo.php?uid=' . $struid . "' title='" . $struser . "'>" . $struser . '</a>';
        }
    } else {
        //Leerzeichen vorhanden
        while (false !== $pos2) {
            //alle wörter zwischen Leerzeichen ermitteln
            $struser = substr($strcontact, $pos1, $pos2 - $pos1);
            if (',' === substr($struser, -1)) {
                $struser      = substr($struser, 0, -1);
                $strseperator = ', ';
            } else {
                $strseperator = ' ';
            }
            $struid = getuid($struser);
            if (-1 == $struid) {
                $strnew = $strnew . $struser . $strseperator;
            } else {
                $strnew = $strnew . "<a href='" . XOOPS_URL . '/userinfo.php?uid=' . $struid . "' title='" . $struser . "'>" . $struser . '</a>' . $strseperator;
            }
            $pos1 = $pos2 + 1;
            $pos2 = strpos($strcontact, $strsearch, $pos1);
        }

        if (0 == $pos2) {
            //Rest ab letztem Leerzeichen einlesen
            $struser = substr($strcontact, $pos1);
            $struid  = getuid($struser);
            if (-1 == $struid) {
                $strnew .= $struser;
            } else {
                $strnew = $strnew . "<a href='" . XOOPS_URL . '/userinfo.php?uid=' . $struid . "' title='" . $struser . "'>" . $struser . '</a>';
            }
        } else {
        }
    }

    return $strnew;
}

/**
 * @param $UserName
 * @return int
 */
function getuid($UserName)
{
    $rc  = -1;
    $db  = \XoopsDatabaseFactory::getDatabaseConnection();
    $sql = 'SELECT uid FROM ' . $db->prefix('users') . " WHERE uname = '" . $UserName . "' LIMIT 0,1";

    $result = $db->query($sql);
    if ($result) {
        if (1 == $db->getRowsNum($result)) {
            $member = $GLOBALS['xoopsDB']->fetchObject($result);
            $userid = $member->uid;
            $rc     = $userid;
        }
    }

    return $rc;
}
