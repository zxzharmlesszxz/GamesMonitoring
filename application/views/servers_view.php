<h1>Servers</h1>
<p class="form hide">
 <input type="text" value="" placeholder="addr" name="server[addr]"/>
 <input type="text" value="" placeholder="servername" name="server[servername]"/>
 <input type="text" value="" placeholder="servername" name="server[game]"/>
 <input type="text" value="" placeholder="servername" name="server[mode]"/>
 <input type="text" value="" placeholder="servername" name="server[maxplayers]"/>
 <input type="text" value="" placeholder="servername" name="server[location]"/>
 <input type="text" value="" placeholder="servername" name="server[steam]"/>
 <input type="text" value="" placeholder="servername" name="server[site]"/>
 <input type="text" value="" placeholder="servername" name="server[about]"/>
 <button class="create" title="Create" alt="Create" data-type="server">Create</button>
</p>
<p>
 <button alt="Add new server" title="Add new server" id="show">Add new server</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Address</th>
 <th>Servername</th>
 <th>Steam</th>
 <th>Players</th>
 <th>Maxplayers</th>
 <th>Map</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Location</th>
 <th>Registrotion date</th>
 <th>Site</th>
 <th>About</th>
 <th>Status</th>
</thead>
<tfoot>
 <th>Address</th>
 <th>Servername</th>
 <th>Steam</th>
 <th>Players</th>
 <th>Maxplayers</th>
 <th>Map</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Location</th>
 <th>Registrotion date</th>
 <th>Site</th>
 <th>About</th>
 <th>Status</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td><a href="/servers/show/?serverid=$row->serverid">$row->servername</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->serverid" data-type="server"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/servers/edit/?serverid=$row->serverid'"></button>
    </span>
   </td>
   <td>$row->addr</td>
   <td>$row->steam</td>
   <td>$row->players</td>
   <td>$row->maxplayers</td>
   <td>$row->map</td>
   <td>$row->game</td>
   <td>$row->mode</td>
   <td>$row->location</td>
   <td>$row->regdate</td>
   <td>$row->site</td>
   <td>$row->about</td>
   <td>$row->status</td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>