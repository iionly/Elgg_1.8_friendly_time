<?php
/**
 * Enhanced Friendly Time
 * Tries to improve upon the default Elgg friendly time display.
 *
 * @author Ademola "PHPlord" Morebise <amorebise@gmail.com>
 *
 *
 * Rewritten for Elgg 1.8 by
 * iionly
 * Contact: iionly@gmx.de
 * License: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * Copyright: iionly 2012
 */

function enhanced_friendly_time_init() {

    elgg_register_plugin_hook_handler('format', 'friendly:time', 'enhanced_friendly_time_hook');

}

function enhanced_friendly_time_hook($hook, $type, $return, $params) {

    $diff = time() - ((int) $params['time']);

    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;

    if ($diff < $minute) {
        $friendly_time = elgg_echo("friendlytime:justnow");
    } else if ($diff < $hour) {
        $diff = round($diff / $minute);
        if ($diff == 0) {
            $diff = 1;
        }

        if ($diff > 1) {
            $friendly_time = elgg_echo("friendlytime:minutes", array($diff));
        } else {
            $friendly_time = elgg_echo("friendlytime:minutes:singular", array($diff));
        }
    } else if ($diff < $day) {
        $diff = round($diff / $hour);
        if ($diff == 0) {
            $diff = 1;
        }

        if ($diff > 1) {
            $friendly_time = elgg_echo("friendlytime:hours", array($diff));
        } else {
            $friendly_time = elgg_echo("friendlytime:hours:singular", array($diff));
        }
    } else {
        $diff = round($diff / $day);
        if ($diff == 0) {
            $diff = 1;
        }
    //PHPlord let check for day, days, weeks and finally output date if too far away...
        if ($diff == 1) {
            $friendly_time = elgg_echo("friendlytime:days:singular", array($diff));
        } else if(6 >= $diff){
            $friendly_time = elgg_echo("friendlytime:days", array($diff));
        } else if(13 >= $diff){
            $friendly_time = elgg_echo("friendlytime:weeks:singular", array($diff));
        } else if($diff == 14){
            $friendly_time = elgg_echo("friendlytime:weeks", array($diff));
        } else{
            $date_day = date('j', $params['time']);
            $date_month = date('m', $params['time']);
            $date_year = date('Y', $params['time']);
            $friendly_time = $date_day . '. ' . elgg_echo("friendlytime:month:$date_month") . ' ' . $date_year;
        }
    }

    $timestamp = htmlentities(date(elgg_echo('friendlytime:date_format'), $params['time']));

    return "<acronym title=\"$timestamp\">$friendly_time</acronym>";

}

elgg_register_event_handler('init', 'system', 'enhanced_friendly_time_init');
