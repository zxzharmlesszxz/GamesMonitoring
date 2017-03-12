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
<script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable({
            "processing": true,
            "ajax": {
                "url": "/users/getAll/",
                "dataSrc": function (json) {
                    var return_data = [];
//      json.data.forEach(function(item){alert(item);});
                    for(var i=0;i< json.data.length; i++){
                        var item = json.data[i];
                        return_data.push({
                            'user': '<a href="/users/show/?login='+item.login+'">'+item.login+'</a>'+
                            '<span class="actions">'+
                            '<button class="delete" title="Delete" data-id="'+item.userid+'" data-type="user"></button>'+
                            '<button class="edit" title="Edit" onclick="location.href=\'/users/edit/?userid='+item.userid+'\'"></button>'+
                            '</span>',
                            'username': item.username,
                            'email': item.email,
                            'status': item.status
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
<?php
/*
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
   <td><input class="status" type="checkbox" data-id="$row->userid" value="$row->status" data-type="user" /></td>
  </tr>
EOT;
 }
*/
?>
 </tbody>
</table>
