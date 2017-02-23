<?php

echo <<<EOT
<h1>Server</h1>
<table id='1table' class='display'>
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
  <td>
   <label for="server[addr]">Address and port</label>
  </td>
  <td>
   <input type="text" value="$data->addr" name="server[addr]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="server[servername]">Server name</label>
  </td>
  <td>
   <input type="text" value="$data->servername" name="server[servername]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="server[about]">About</label>
  </td>
  <td>
   <input type="text" value="$data->about" name="server[about]"/>
  </td>
 </tr>
 </tbody>
</table>
<p>
 <button alt="Edit" title="Edit" onclick="location.href='/servers/edit/?serverid=$data->serverid'">Edit this server</button>
</p>
EOT;

echo <<<EOT
<table>
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
<table>
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
var_dump($data);
