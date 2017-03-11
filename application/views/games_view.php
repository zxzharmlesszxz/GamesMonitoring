<h1>Games</h1>
<p class="form hide">
 <input type="text" value="" placeholder="shortname" name="game[shortname]"/>
 <input type="text" value="" placeholder="fullname" name="game[fullname]"/>
 <input type="description" value="" placeholder="description" name="game[description]"/>
 <button class="create" title="Create" alt="Create" data-type="game">Create</button>
</p>
<p>
 <button alt="Add new game" title="Add new game" id="show">Add new game</button>
</p>
<script type="text/javascript">
 $(document).ready(function() {
  $('#table1').DataTable({
   "processing": true,
   "ajax": {
    "url": "/games/getAll/",
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'game': '<a href="/games/show/?gameid='+json.data[i].gameid+'">'+json.data[i].fullname+'</a>'+
            '<span class="actions">'+
            '<button class="delete" alt="Delete" title="Delete" data-id="'+json.data[i].gameid+'" data-type="game"></button>'+
            '<button class="edit" alt="Edit" title="Edit" onclick="location.href=\'/games/edit/?modeid='+json.data[i].gameid+'\'"'+
            '</span>',
          'shortname': json.data[i].shortname,
          'description': json.data[i].description
        })
      }
      return return_data;
    }
   },
   "columns": [
    { "data": "game"},
    { "data": "shortname"},
    { "data": "description" }
   ]
  });
 });
</script>
<table id='table1' class='display'>
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
*/
?>
 </tbody>
</table>