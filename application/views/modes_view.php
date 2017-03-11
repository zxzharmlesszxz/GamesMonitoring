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
  $('#table1').DataTable({
   "processing": true,
   "ajax": {
    "url": "/modes/getAll/",
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'mode': '<a href="/modes/show/?modeid='+json.data[i].modeid+'">'+json.data[i].fullname+'</a>'+
            '<span class="actions">'+
            '<button class="delete" alt="Delete" title="Delete" data-id="'+json.data[i].modeid+'" data-type="mode"></button>'+
            '<button class="edit" alt="Edit" title="Edit" onclick="location.href=\'/modes/edit/?modeid='+json.data[i].modeid+'\'"'+
            '</span>',
          'shortname': json.data[i].shortname,
          'description': json.data[i].description
        })
      }
      return return_data;
    }
   },
   "columns": [
    { "data": "mode"},
    { "data": "shortname"},
    { "data": "description" }
   ]
  });
 });
</script>
<table id='table1' class='display'>
<thead>
 <th>Mode</th>
 <th>Fullname</th>
 <th>Description</th>
</thead>
<tfoot>
 <th>Mode</th>
 <th>Fullname</th>
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
