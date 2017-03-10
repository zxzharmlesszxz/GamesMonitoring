<?php

function games_select_list($servergame = NULL) {
 $str = '<select name="server[game]">';
 $str .= (empty($servergame)) ? '<option disabled selected>Select game</option>' : '';
 foreach (Game::find_all() as $game) {
  $str .= "<option value='$game->shortname' ".($servergame == $game->shortname ? 'selected' : '').">$game->fullname</option>";
 }
 $str .= "</select>";
 return $str;
}

function modes_select_list($servermode = NULL) {
 $str = '<select name="server[mode]">';
 $str .= (empty($servermode)) ? '<option disabled selected>Select mode</option>' : '';
 foreach (Mode::find_all() as $mode) {
  $str .= "<option value='$mode->shortname' ".($servermode == $mode->shortname ? 'selected' : '').">$mode->fullname</option>";
 }
 $str .= "</select>";
 return $str;
}

function locations_select_list($serverlocation = NULL) {
 $str = '<select name="server[location]">';
 $str .= (empty($serverlocation)) ? '<option disabled selected>Select location</option>' : '';
 foreach (Countries::$countries as $key => $name) {
  $str .= "<option value='$key' ".($serverlocation == $key ? 'selected' : '').">$name</option>";
 }
 $str .= "</select>";
 return $str;
}
