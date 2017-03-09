<?php

echo <<<EOT
<h1>Server $data->servername</h1>
<p>
 <button alt="Edit" title="Edit" onclick="location.href='/servers/edit/?serverid=$data->serverid'">Edit this server</button>
</p>
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
  <td>$data->addr</td>
 </tr>
 <tr>
  <td>Server name</td>
  <td>$data->servername</td>
 </tr>
 <tr>
  <td>Server map</td>
  <td>
   <img src="/images/maps/$data->game/$data->map.png">
  </td>
 </tr>
 <tr>
  <td>Server protocol version</td>
  <td>$data->version</td>
 </tr>
 <tr>
  <td>Server secure</td>
  <td>$data->secureServer</td>
 </tr>
 <tr>
  <td>Server Password protected</td>
  <td>$data->passwordProtected</td>
 </tr>
 <tr>
  <td>Server OS</td>
  <td>$data->operatingSystem</td>
 </tr>
 <tr>
  <td>Server Bots</td>
  <td>$data->botNumber</td>
 </tr>
 <tr>
  <td>About</td>
  <td>$data->about</td>
 </tr>
 </tbody>
</table>
EOT;

echo <<<EOT
<table style="float: left;">
 <caption>Players</caption>
 <thead>
  <tr>
   <th>#</th>
   <th>Player name</th>
   <th>Score</th>
   <th>Time in game</th>
  </tr>
 </thead>
 <tbody>
EOT;

foreach ($data->players_info as $num => $player) {
 echo <<<EOT
  <tr>
   <td>{$num}</td>
   <td>{$player['name']}</td>
   <td>{$player['score']}</td>
   <td>{$player['time']}</td>
  </tr>
EOT;
}

echo <<<EOT
 </tbody>
</table>
EOT;

echo <<<EOT
<table style="float: left;">
 <caption>Rules</caption>
 <thead>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </thead>
 <tbody>
EOT;

foreach ($data->rules as $key => $value) {
 echo <<<EOT
  <tr>
   <td>{$key}</td>
   <td>{$value}</td>
  </tr>
EOT;
}

echo <<<EOT
 </tbody>
</table>
EOT;
