<?php

function games_select_list($servergame = NULL) {
 $str = '<select name="game">';
 $str .= (empty($servergame)) ? '<option disabled selected>Select game</option>' : ''
 foreach (config()->games as $game => $title) {
  $str .= "<option value='$game' ".($servergame == $game ? 'selected' : '').">$title</option>";
 }
 $str .= "</select>";
 return $str;
}