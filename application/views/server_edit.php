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
   <label for="addr">Address and port</label></td><td><input type="text" value="$data->addr" name="server[addr]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="servername">Server name</label></td><td><input type="text" value="$data->servername" name="server[servername]"/>
  </td>
 </tr>
 <tr>
  <td>
   </td><td><button class="save" data-id="$data->serverid" data-type="server">Save</button>
  </td>
 </tr>
 </tbody>
</table>
EOT;
