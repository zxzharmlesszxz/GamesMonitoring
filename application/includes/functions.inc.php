<?php

function games_select_list($servergame = NULL) {
 $str = '<select name="server[game]">';
 $str .= (empty($servergame)) ? '<option disabled selected>Select game</option>' : '';
 foreach (config()->games as $game => $title) {
  $str .= "<option value='$game' ".($servergame == $game ? 'selected' : '').">$title</option>";
 }
 $str .= "</select>";
 return $str;
}

function modes_select_list($servermode = NULL) {
 $str = '<select name="server[mode]">';
 $str .= (empty($servermode)) ? '<option disabled selected>Select mode</option>' : '';
 foreach (config()->modes as $mode => $title) {
  $str .= "<option value='$mode' ".($servermode == $mode ? 'selected' : '').">$title</option>";
 }
 $str .= "</select>";
 return $str;
}

function locations_select_list($serverlocation = NULL) {

}
