<h1>Games</h1>
<p class="form hide">
 <input type="text" value="" placeholder="shortname" name="game[shortname]"/>
 <input type="text" value="" placeholder="fullname" name="game[fullname]"/>
 <input type="text" value="" placeholder="description" name="game[description]"/>
 <button class="create" title="Create" data-type="game">Create</button>
</p>
<p>
 <button title="Add new game" id="show">Add new game</button>
</p>
<script type="text/javascript">
 $(document).ready(function() {
  $('#table').DataTable({
   "processing": true,
   "ajax": {
    "url": "/games/getAll/",
    "dataSrc": function (json) {
      var return_data = [];
      for(var i=0;i< json.data.length; i++){
        var item = json.data[i];
        return_data.push({
          'mode': '<a href="/games/show/?gameid='+item.gameid+'">'+item.fullname+'</a>'+
            '<span class="actions">'+
            '<button class="delete" title="Delete" data-id="'+item.gameid+'" data-type="mode"></button>'+
            '<button class="edit" title="Edit" onclick="location.href=\'/games/edit/?gameid='+item.gameid+'\'"></button>'+
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
   <th>Game</th>
   <th>Shortname</th>
   <th>Description</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Game</th>
   <th>Shortname</th>
   <th>Description</th>
  </tr>
 </tfoot>
 <tbody>
 </tbody>
</table>