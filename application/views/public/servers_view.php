<h1>Servers</h1>
<p class="form hide">
 <input type="text" value="" placeholder="addr" name="server[addr]"/>
 <?php echo games_select_list(); ?>
 <?php echo modes_select_list(); ?>
 <?php echo locations_select_list(); ?>
 <label for="server[steam]">Steam?: </label><input type="checkbox" value="0" name="server[steam]"/>
 <input type="text" value="" placeholder="site" name="server[site]"/>
 <input type="text" value="" placeholder="about" name="server[about]"/>
 <button class="create" title="Create" data-type="server">Create</button>
</p>
<p>
 <button title="Add new server" id="show">Add new server</button>
</p>
<script type="text/javascript">
 $(document).ready(function() {
  $('#table').DataTable({
   "processing": true,
   "ajax": {
    "url": "/servers/getAll/",
    "dataSrc": function (json) {
      var return_data = [];
      for(var i=0;i< json.data.length; i++){
        var item = json.data[i];
        return_data.push({
          'server': '<a href="/servers/show/?serverid='+item.serverid+'">'+item.servername+'</a>'+
            '<span class="actions">'+
            '<button class="delete" title="Delete" data-id="'+item.serverid+'" data-type="server"></button>'+
            '<button class="edit" title="Edit" onclick="location.href=\'/servers/edit/?serverid='+item.serverid+'\'"></button>'+
            '</span>',
          'addr': item.addr,
          'steam': '<input class="steam" type="checkbox" data-id="'+item.serverid+'" value="'+item.steam+'" data-type="server" disabled readonly />',
          'players': item.players+"/"+item.botNumber+"/"+item.maxplayers,
          'map': '<div class="map" data-icon="/images/maps/'+item.game+'/'+item.map+'.png"><span>'+item.map+'</span></div>',
          'game': item.game,
          'mode': item.mode,
          'location': item.location,
          'regdate': item.regdate,
          'site': item.site,
          'status': '<input class="status" type="checkbox" data-id="'+item.serverid+'" value="'+item.status+'" data-type="server" disabled readonly />',
          'vip': '<input class="vip" type="checkbox" data-id="'+item.serverid+'" value="'+item.vip+'" data-type="server" disabled readonly />',
          'top': item.top
        })
      }
      return return_data;
    }
   },
   "columns": [
    { "data": "server"},
    { "data": "addr"},
    { "data": "steam" },
    { "data": "players" },
    { "data": "map" },
    { "data": "game" },
    { "data": "mode" },
    { "data": "location" },
    { "data": "regdate" },
    { "data": "site" },
    { "data": "status" },
    { "data": "vip" },
    { "data": "top" }
   ]
  });
 });
</script>
<table id='table' class='display'>
 <thead>
  <tr>
   <th>Servername</th>
   <th>Address</th>
   <th>Steam</th>
   <th>Players/Bots/Maxplayers</th>
   <th>Map</th>
   <th>Game</th>
   <th>Mode</th>
   <th>Location</th>
   <th>Registration date</th>
   <th>Site</th>
   <th>Status</th>
   <th>VIP</th>
   <th>TOP</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Servername</th>
   <th>Address</th>
   <th>Steam</th>
   <th>Players/Bots/Maxplayers</th>
   <th>Map</th>
   <th>Game</th>
   <th>Mode</th>
   <th>Location</th>
   <th>Registration date</th>
   <th>Site</th>
   <th>Status</th>
   <th>VIP</th>
   <th>TOP</th>
  </tr>
 </tfoot>
 <tbody>
 </tbody>
</table>