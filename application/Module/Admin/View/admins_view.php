<h1>Admins</h1>
<p class="form hide">
<input type="text" value="" placeholder="login" name="admin[login]"/>
<input type="password" value="" placeholder="password" name="admin[password]"/>
<input type="text" value="" placeholder="username" name="admin[username]"/>
<input type="text" value="" placeholder="email" name="admin[email]"/>
 <button class="create" title="Create" alt="Create" data-type="admin">Create</button>
</p>
<p><button alt="Add new Admin" title="Add new Admin" id="show">Add new Admin</button></p>
<p>
 <script type="text/javascript">
  $(document).ready(function() {
   $('#table').DataTable({
    "processing": true,
    "ajax": {
     "url": "/admins/getAll/",
     "dataSrc": function (json) {
      var return_data = [];
      for(var i=0;i< json.data.length; i++){
       var item = json.data[i];
       return_data.push({
        'admin': '<a href="/admins/show/?login='+item.login+'">'+item.login+'</a>'+
        '<span class="actions">'+
        '<button class="delete" title="Delete" data-id="'+item.adminid+'" data-type="admin"></button>'+
        '<button class="edit" title="Edit" onclick="location.href=\'/admins/edit/?adminid='+item.adminid+'\'"></button>'+
        '</span>',
        'username': item.username,
        'email': item.email,
        'status': '<input class="status" type="checkbox" data-id="'+item.adminid+'" value="'+item.status+'" data-type="admin" />'
       })
      }
      return return_data;
     }
    },
    "columns": [
     { "data": "admin"},
     { "data": "username"},
     { "data": "email" },
     { "data": "status"}
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
 </tbody>
</table>
</p>