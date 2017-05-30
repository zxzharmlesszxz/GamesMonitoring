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
    $(document).ready(function () {
        $('#table').DataTable({
            "processing": true,
            "ajax": {
                "url": "/server/get/?ajax=true",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        return_data.push({
                            'server': '<a href="/server/get/?id=' + item.id + '">' + item.serverName + '</a>' +
                            '<span class="actions">' +
                            '<button class="delete" title="Delete" data-id="' + item.id + '" data-type="server"></button>' +
                            '<button class="edit" title="Edit" onclick="location.href=\'/server/edit/?id=' + item.id + '\'"></button>' +
                            '</span>',
                            'address': item.address,
                            'steam': '<input class="steam" type="checkbox" data-id="' + item.id + '" value="' + item.steam + '" data-type="server" disabled readonly />',
                            'players': item.players + "/" + item.botNumber + "/" + item.maxPlayers,
                            'map': '<div class="map" data-icon="/images/maps/' + item.game + '/' + item.map + '.png"><span>' + item.map + '</span></div>',
                            'game': item.game,
                            'mode': item.mode,
                            'location': item.location,
                            'regDate': item.regDate,
                            'site': item.site,
                            'status': '<input class="status" type="checkbox" data-id="' + item.id + '" value="' + item.status + '" data-type="server" disabled readonly />',
                            'vip': '<input class="vip" type="checkbox" data-id="' + item.id + '" value="' + item.vip + '" data-type="server" disabled readonly />',
                            'top': item.top
                        })
                    }
                    return return_data;
                }
            },
            "columns": [
                {"data": "server"},
                {"data": "address"},
                {"data": "steam"},
                {"data": "players"},
                {"data": "map"},
                {"data": "game"},
                {"data": "mode"},
                {"data": "location"},
                {"data": "regDate"},
                {"data": "site"},
                {"data": "status"},
                {"data": "vip"},
                {"data": "top"}
            ]
        });
    });
</script>
<p>
<table id='table' class='display'>
    <thead>
    <tr>
        <th>ServerName</th>
        <th>Address</th>
        <th>Steam</th>
        <th>Players/Bots/MaxPlayers</th>
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
        <th>ServerName</th>
        <th>Address</th>
        <th>Steam</th>
        <th>Players/Bots/MaxPlayers</th>
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
</p>