<h1>Servers</h1>
<p class="form hide">
 <input type="text" value="" placeholder="addr" name="server[addr]"/>
 <input type="text" value="" placeholder="servername" name="server[servername]"/>
 <input type="text" value="" placeholder="game" name="server[game]"/>
 <input type="text" value="" placeholder="mode" name="server[mode]"/>
 <input type="text" value="" placeholder="maxplayers" name="server[maxplayers]"/>
 <input type="text" value="" placeholder="location" name="server[location]"/>
 <input type="number" value="" placeholder="steam" name="server[steam]"/>
 <input type="text" value="" placeholder="site" name="server[site]"/>
 <input type="text" value="" placeholder="about" name="server[about]"/>
 <button class="create" title="Create" alt="Create" data-type="server">Create</button>
</p>
<p>
 <button alt="Add new server" title="Add new server" id="show">Add new server</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Address</th>
 <th>Servername</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Max Players</th>
 <th>Location</th>
 <th>Steam</th>
 <th>Site</th>
 <th>About</th>
</thead>
<tfoot>
 <th>Address</th>
 <th>Servername</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Max Players</th>
 <th>Location</th>
 <th>Steam</th>
 <th>Site</th>
 <th>About</th>
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
   <td>$row->game</td>
   <td>$row->mode</td>
   <td>$row->maxplayers</td>
   <td>$row->location</td>
   <td>$row->steam</td>
   <td>$row->site</td>
   <td>$row->about</td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>