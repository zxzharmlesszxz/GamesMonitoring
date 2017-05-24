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
 %content%
 </tbody>
</table>