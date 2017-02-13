<h1>Servers</h1>
<p class="form hide">
 <input type="text" value="" placeholder="addr" name="server[addr]"/>
 <input type="text" value="" placeholder="servername" name="server[servername]"/>
 <button class="create" title="Create" alt="Create" data-type="server">Create</button>
</p>
<p>
 <button alt="Add new server" title="Add new server" id="show">Add new server</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Address</th>
 <th>Servername</th>
</thead>
<tfoot>
 <th>Address</th>
 <th>Servername</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td>$row->addr</td>
   <td><a href="/servers/show/?serverid=$row->serverid">$row->servername</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->serverid" data-type="server"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/servers/edit/?serverid=$row->serverid'"></button>
    </span>
   </td>
  </tr>
EOT;
 }

?>
 </tbody>
</table>