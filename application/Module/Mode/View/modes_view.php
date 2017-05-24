<h1>Modes</h1>
<p class="form hide">
 <input type="text" value="" placeholder="shortname" name="mode[shortname]"/>
 <input type="text" value="" placeholder="fullname" name="mode[fullname]"/>
 <input type="text" value="" placeholder="description" name="mode[description]"/>
 <button class="create" title="Create" data-type="mode">Create</button>
</p>
<p>
 <button title="Add new mode" id="show">Add new mode</button>
</p>
<script type="text/javascript">
 $(document).ready(function() {
  $('#table').DataTable({
   "processing": true,
   "ajax": {
    "url": "/modes/getAll/",
    "dataSrc": function (json) {
      var return_data = [];
      for(var i=0;i< json.data.length; i++){
        var item = json.data[i];
        return_data.push({
          'mode': '<a href="/modes/show/?modeid='+item.modeid+'">'+item.fullname+'</a>'+
            '<span class="actions">'+
            '<button class="delete" title="Delete" data-id="'+item.modeid+'" data-type="mode"></button>'+
            '<button class="edit" title="Edit" onclick="location.href=\'/modes/edit/?modeid='+item.modeid+'\'"></button>'+
            '</span>',
          'shortname': item.shortname,
          'description': item.description
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
<table id='table' class='display'>
 <thead>
  <tr>
   <th>Mode</th>
   <th>Fullname</th>
   <th>Description</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Mode</th>
   <th>Fullname</th>
   <th>Description</th>
  </tr>
 </tfoot>
 <tbody>
 %content%
 </tbody>
</table>
