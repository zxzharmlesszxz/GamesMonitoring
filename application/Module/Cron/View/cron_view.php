<h1>Servers</h1>
<table id='table' class='display'>
 <thead>
  <th>ID</th>
  <th>Servername</th>
  <th>Address</th>
  <th>Steam</th>
  <th>Players</th>
  <th>Bots</th>
  <th>Maxplayers</th>
  <th>Map</th>
  <th>Game</th>
  <th>Mode</th>
  <th>Password protected</th>
  <th>Secure</th>
  <th>OS</th>
  <th>Protocol</th>
  <th>Status</th>
 </thead>
 <tfoot>
  <th>ID</th>
  <th>Servername</th>
  <th>Address</th>
  <th>Steam</th>
  <th>Players</th>
  <th>Bots</th>
  <th>Maxplayers</th>
  <th>Map</th>
  <th>Game</th>
  <th>Mode</th>
  <th>Password protected</th>
  <th>Secure</th>
  <th>OS</th>
  <th>Protocol</th>
  <th>Status</th>
 </tfoot>
 <tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td>$row->serverid</td>
   <td>$row->servername</td>
   <td>$row->addr</td>
   <td>$row->steam</td>
   <td>$row->players</td>
   <td>$row->botNumber</td>
   <td>$row->maxplayers</td>
   <td>$row->map</td>
   <td>$row->game</td>
   <td>$row->mode</td>
   <td>$row->passwordProtected</td>
   <td>$row->secureServer</td>
   <td>$row->operatingSystem</td>
   <td>$row->version</td>
   <td>$row->status</td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>
