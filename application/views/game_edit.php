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
   <label for="shortname">Shortname</label></td><td><input type="text" value="$data->shortname" name="game[shortname]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="fullname">Fullname</label></td><td><input type="text" value="$data->fullname" name="game[fullname]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="description">Description</label></td><td><input type="text" value="$data->description" name="game[description]"/>
  </td>
 </tr>
 <tr>
  <td>
   </td><td><button class="save" data-id="$data->gameid" data-type="game">Save</button>
  </td>
 </tr>
 </tbody>
</table>
EOT;