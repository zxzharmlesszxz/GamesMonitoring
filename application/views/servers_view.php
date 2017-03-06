<h1>Servers</h1>
<p class="form hide">
 <input type="text" value="" placeholder="addr" name="server[addr]"/>
 <input type="text" value="" placeholder="servername" name="server[servername]"/>
 <?php echo games_select_list(); ?>
 <?php echo modes_select_list(); ?>
 <input type="number" value="" placeholder="maxplayers" name="server[maxplayers]"/>
 <?php echo locations_select_list(); ?>
 <label for="server[steam]">Steam?: </label><input type="checkbox" value="0" name="server[steam]"/>
 <input type="text" value="" placeholder="site" name="server[site]"/>
 <input type="text" value="" placeholder="about" name="server[about]"/>
 <button class="create" title="Create" alt="Create" data-type="server">Create</button>
</p>
<p>
 <button alt="Add new server" title="Add new server" id="show">Add new server</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Servername</th>
 <th>Address</th>
 <th>Steam</th>
 <th>Players</th>
 <th>Maxplayers</th>
 <th>Map</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Location</th>
 <th>Registration date</th>
 <th>Site</th>
 <!--<th>About</th>-->
 <th>Status</th>
 <th>VIP</th>
 <th>TOP</th>
</thead>
<tfoot>
 <th>Servername</th>
 <th>Address</th>
 <th>Steam</th>
 <th>Players</th>
 <th>Maxplayers</th>
 <th>Map</th>
 <th>Game</th>
 <th>Mode</th>
 <th>Location</th>
 <th>Registration date</th>
 <th>Site</th>
 <!--<th>About</th>-->
 <th>Status</th>
 <th>VIP</th>
 <th>TOP</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td>
    <a href="/servers/show/?serverid=$row->serverid">$row->servername</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->serverid" data-type="server"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/servers/edit/?serverid=$row->serverid'"></button>
    </span>
   </td>
   <td>$row->addr</td>
   <td><input class="steam" type="checkbox" data-id="$row->serverid" value="$row->steam" data-type="server" disabled readonly /></td>
   <td>$row->players</td>
   <td>$row->maxplayers</td>
   <td data-icon='/images/maps/$row->game/$row->map.png'>$row->map<span class='icon' data-icon='/images/maps/$row->game/$row->map.png'></span></td>
   <td>$row->game</td>
   <td>$row->mode</td>
   <td>$row->location</td>
   <td>$row->regdate</td>
   <td>$row->site</td>
   <!--<td>$row->about</td>-->
   <td><input class="status" type="checkbox" data-id="$row->serverid" value="$row->status" data-type="server" disabled readonly /></td>
   <td><input class="vip" type="checkbox" data-id="$row->serverid" value="$row->vip" data-type="server" disabled readonly /></td>
   <td><input class="top" type="number" data-id="$row->serverid" value="$row->top" data-type="server" disabled readonly /></td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>