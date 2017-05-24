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
