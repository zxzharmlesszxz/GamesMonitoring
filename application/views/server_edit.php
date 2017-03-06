<?php

echo <<<EOT
<h1>Server</h1>
<table id='1table' class='display'>
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
   <label for="servername">Server name</label>
  </td>
  <td>
   <input type="text" value="$data->servername" name="server[servername]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="game">Server game</label>
  </td>
  <td>
   <input type="text" value="$data->game" name="server[game]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="mode">Server mode</label>
  </td>
  <td>
   <input type="text" value="$data->mode" name="server[mode]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="maxplayers">Server slots</label>
  </td>
  <td>
   <input type="number" value="$data->maxplayers" name="server[maxplayers]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="location">Server location</label>
  </td>
  <td>
   <?php echo locations_select_list(); ?>
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
   <label for="site">Server site</label>
  </td>
  <td>
   <input type="text" value="$data->site" name="server[site]"/>
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
  <td></td>
  <td>
   <button class="save" data-id="$data->serverid" data-type="server">Save</button>
  </td>
 </tr>
 </tbody>
</table>
EOT;
