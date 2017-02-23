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
 <button class="create" title="Create" alt="Create" data-type="game">Create</button>
</p>
<p>
 <button alt="Add new game" title="Add new game" id="show">Add new game</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Game</th>
 <th>Shortname</th>
 <th>Description</th>
</thead>
<tfoot>
 <th>Game</th>
 <th>Shortname</th>
 <th>Description</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td><a href="/games/show/?gameid=$row->gameid">$row->fullname</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->gameid" data-type="game"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/games/edit/?gameid=$row->gameid'"></button>
    </span>
   </td>
   <td>$row->shortname</td>
   <td>$row->description</td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>