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
        %access%

        $('#table').on('draw.dt', function () {
            var list = document.querySelectorAll("div.map[data-icon]");
            for (var i = 0; i < list.length; i++) {
                var url = list[i].getAttribute('data-icon');
                list[i].style.backgroundImage = "url('" + url + "')";
            }
            $('input[type="checkbox"]').each(function () {
                ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false);
            });
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