<?php

/*
  Plugin Name: demomentsomtres Night and Day
  Plugin URI: http://demomentsomtres.com/catala
  Description: Provides the shortcode dms3nad allowing to show contents only during an specific time frame specified in the shortcode paramenters. Shortcode format is [dms3nad start="hh:mm" end="hh:mm"]Content to show[/dms3nad].
  Version: 0.1
  Author: Marc Queralt
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
        $start = $attr['end'];
    else:
        $start = "12:00";
    endif;
    if(!empty($content)):
        $content=esc_html($content);
    else:
        $content='';
    endif;
    $result="start: ".$start."\n";
    $result.="end: ".$end."\n";
    return $result;
}

?>
