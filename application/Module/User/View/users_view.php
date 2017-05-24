<h1>Users</h1>
<p class="form hide">
 <input type="text" value="" placeholder="login" name="user[login]"/>
 <input type="password" value="" placeholder="password" name="user[password]"/>
 <input type="text" value="" placeholder="username" name="user[username]"/>
 <input type="text" value="" placeholder="email" name="user[email]"/>
 <button class="create" title="Create" data-type="user">Create</button>
</p>
<p>
 <button title="Add new user" id="show">Add new user</button>
</p>
<table id='table' class='display'>
 <thead>
  <tr>
   <th>Login</th>
   <th>Username</th>
   <th>Email</th>
   <th>Status</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Login</th>
   <th>Username</th>
   <th>Email</th>
   <th>Status</th>
  </tr>
 </tfoot>
 <tbody>
 %content%
 </tbody>
</table>
