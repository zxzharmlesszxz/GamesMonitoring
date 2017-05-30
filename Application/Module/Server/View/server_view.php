<h1>%servername%</h1>
<p>
    <button alt="Edit" title="Edit" onclick="location.href='/server/edit/?id=%id%'">Edit this server
    </button>
</p>
<div class="tabs">
    <ul class="tabs__caption">
        <li class="active">Info</li>
        <li>Players</li>
        <li>Rules</li>
    </ul>
    <div class="tabs__content active">
        <table style="float: left;">
            <thead>
            <tr>
                <th>Param</th>
                <th>Value</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Param</th>
                <th>Value</th>
            </tr>
            </tfoot>
            <tbody>
            <tr>
                <td>Address and port</td>
                <td>%address%</td>
            </tr>
            <tr>
                <td>Server name</td>
                <td>%serverName%</td>
            </tr>
            <tr>
                <td>Server map</td>
                <td>
                    <img src="/images/maps/%game%/%map%.png">
                </td>
            </tr>
            <tr>
                <td>Server protocol version</td>
                <td>%version%</td>
            </tr>
            <tr>
                <td>Server secure</td>
                <td>%secureServer%</td>
            </tr>
            <tr>
                <td>Server Password protected</td>
                <td>%passwordProtected%</td>
            </tr>
            <tr>
                <td>Server OS</td>
                <td>%operatingSystem%</td>
            </tr>
            <tr>
                <td>Server slots</td>
                <td>%players%/%botNumber%/%maxPlayers%</td>
            </tr>
            <tr>
                <td>About</td>
                <td>%about%</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tabs__content">
        <table style="float: left;">
            <thead>
            <tr>
                <th>#</th>
                <th>Player name</th>
                <th>Score</th>
                <th>Time in game</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{$num}</td>
                <td>{$player['name']}</td>
                <td>{$player['score']}</td>
                <td>{$player['time']}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tabs__content">
        <table style="float: left;">
            <thead>
            <tr>
                <th>Param</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{$key}</td>
                <td>{$value}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
%content%
