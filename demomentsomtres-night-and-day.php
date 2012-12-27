<?php

/*
  Plugin Name: demomentsomtres Night and Day
  Plugin URI: http://demomentsomtres.com/catala
  Description: Provides the shortcode dms3nad allowing to show contents only during an specific time frame specified in the shortcode paramenters. Shortcode format is [dms3nad start="hh:mm" end="hh:mm"]Content to show[/dms3nad].
  Version: 1.0
  Author: MarcQueralt
  Author URI: http://demomentsomtres.com/
 */

// register the shortcode [dms3nad start="hh:mm" end="hh:mm"]Content[/dms3nad]
add_shortcode('dms3nad', 'demomentsomtres_night_and_day');

// callback function for the dms3nad shortcode
function demomentsomtres_night_and_day($attr, $content) {
    if (isset($attr['start'])):
        $start = $attr['start'];
    else:
        $start = "00:00";
    endif;
    if (isset($attr['end'])):
        $end = $attr['end'];
    else:
        $end = "12:00";
    endif;
    if (!empty($content)):
        $content = esc_html($content);
    else:
        $content = '';
    endif;
    $start_h = substr($start, 0, 2);
    $start_m = substr($start, -2);
    $end_h = substr($end, 0, 2);
    $end_m = substr($end, -2);
    $avui = getdate();
    $ara = new dateTime();
    $ts_start = new dateTime();
    $ts_end = new dateTime();
    $ts_start->setDate($avui['year'], $avui['mon'], $avui['mday']);
    $ara->setDate($avui['year'], $avui['mon'], $avui['mday']);
    $ts_end->setDate($avui['year'], $avui['mon'], $avui['mday']);
    $ts_start->setTime($start_h, $start_m);
    $ts_end->setTime($end_h, $end_m);
    $ara->setTime($avui['hours'],$avui['minutes']);
    $result = '';
//    $result.="start: $start_h:$start_m ->". $ts_start->getTimeStamp()."<br/>";
//    $result.="end: $end_h:$end_m ->". $ts_end->getTimeStamp()."<br/>";
//    $result.="ara: ".$avui['hours'].":".$avui['minutes']." ->". $ara->getTimestamp()."<br/>";
//    $result.=print_r($ara->getTimestamp()-$ts_start->getTimestamp(),true)."<br/>";
//    $result.=print_r($ts_end->getTimestamp()-$ara->getTimestamp(),true)."<br/>";
    if ($ts_start->getTimestamp() <= $ara->getTimestamp()):
        if ($ara->getTimestamp() <= $ts_end->getTimestamp()):
            $result.=$content;
        endif;
    endif;
    return $result;
}

?>
