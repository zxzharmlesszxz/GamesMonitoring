<h1>Users</h1>
<p class="form hide">
 <input type="text" value="" placeholder="login" name="user[login]"/>
 <input type="password" value="" placeholder="password" name="user[password]"/>
 <input type="text" value="" placeholder="username" name="user[username]"/>
 <input type="text" value="" placeholder="email" name="user[email]"/>
 <button class="create" title="Create" alt="Create" data-type="user">Create</button>
</p>
<p>
 <button alt="Add new uesr" title="Add new user" id="show">Add new user</button>
</p>
<table id='table' class='display'>
<thead>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
</thead>
<tfoot>
 <th>Login</th>
 <th>Username</th>
 <th>Email</th>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td><a href="/users/show/?login=$row->login">$row->login</a>
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->userid" data-type="user"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/users/edit/?userid=$row->userid'"></button>
    </span>
   </td>
   <td>$row->username</td>
   <td>$row->email</td>
  </tr>
EOT;
 }
 
?>
 </tbody>
</table>
