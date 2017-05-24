<?php

$locations = locations_select_list($data->location);
$modes = modes_select_list($data->mode);
$games = games_select_list($data->game);

echo <<<EOT
<h1>Server</h1>
<table id='table' class='display'>
 <thead>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </tfoot>
 <tbody>
  <tr>
   <td>
    <label for="addr">Address and port</label>
   </td>
   <td>
    <input type="text" value="$data->addr" name="server[addr]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="game">Server game</label>
   </td>
   <td>
    $games
   </td>
  </tr>
  <tr>
   <td>
    <label for="mode">Server mode</label>
   </td>
   <td>
    $modes
   </td>
  </tr>
  <tr>
   <td>
    <label for="location">Server location</label>
   </td>
   <td>
    $locations
   </td>
  </tr>
  <tr>
   <td>
    <label for="steam">Server steam</label>
   </td>
   <td>
    <input type="checkbox" value="$data->steam" name="server[steam]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="Site">Server Site</label>
   </td>
   <td>
    <input type="text" value="$data->site" name="server[Site]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="about">Server about</label>
   </td>
   <td>
    <input type="text" value="$data->about" name="server[about]"/>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
    <button class="save" data-id="$data->serverid" data-type="server">Save</button>
   </td>
  </tr>
 </tbody>
</table>
EOT;
