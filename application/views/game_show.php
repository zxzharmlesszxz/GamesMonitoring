<?php

echo <<<EOT
<h1>$data->fullname</h1>
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
  <td>Fullname</td><td>$data->fullname</td>
 </tr>
 <tr>
  <td>Shortname</td><td>$data->shortname</td>
 </tr>
 <tr>
  <td>Description</td><td>$data->description</td>
 </tr>
 </tbody>
</table>
<p><button alt="Edit" title="Edit" onclick="location.href='/games/edit/?gameid=$data->gameid'">Edit this game</button></p>
EOT;
