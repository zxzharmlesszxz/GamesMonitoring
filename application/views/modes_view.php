<h1>Modes</h1>
<p class="form hide">
 <input type="text" value="" placeholder="shortname" name="mode[shortname]"/>
 <input type="text" value="" placeholder="fullname" name="mode[fullname]"/>
 <input type="description" value="" placeholder="description" name="mode[description]"/>
 <button class="create" title="Create" alt="Create" data-type="mode">Create</button>
</p>
<p>
 <button alt="Add new mode" title="Add new mode" id="show">Add new mode</button>
</p>
<script type="text/javascript">
 $(document).ready(function() {
  $('#1table').DataTable({
   "ajax": '/modes/getAll'
  });
 });
 </script>
<table id='1table' class='display'>
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
/*
 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td><a href="/modes/show/?modeid=$row->modeid">$row->fullname</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->modeid" data-type="mode"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/modes/edit/?modeid=$row->modeid'"></button>
    </span>
   </td>
   <td>$row->shortname</td>
   <td>$row->description</td>
  </tr>
EOT;
 }
*/
?>
 </tbody>
</table>
