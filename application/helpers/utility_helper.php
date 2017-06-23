<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('display_time'))
{

/**
 * Takes a MySQL-formatted time, HH:MM:SS,
 * and displays it in a readable format:
 * [X hr] [X min] [X sec]
 * only displaying each part if it's > 0
 */
function display_time($time) {
  $time_parts = explode(':', $time);
  $time_display_parts = array();

  foreach ($time_parts as $idx => $time_part) {
    $time_part_int = (int)$time_part;
    $time_part_label = '';
    if ($idx == 0) {
      $time_part_label = 'hr';
    }
    else if ($idx == 1) {
      $time_part_label = 'min';
    }
    else if ($idx == 2) {
      $time_part_label = 'sec';
    }
    if ($time_part_int > 0) {
      $time_display_parts[] = $time_part_int . ' ' . $time_part_label;
    }
  }

  return implode(' ', $time_display_parts);
}
}
