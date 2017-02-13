<h1>Servers</h1>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  var_dump($row);
 }
 
?>
