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
 %content%
 </tbody>
</table>