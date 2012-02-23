<?php
require('Persistence.php');

$db = new Persistence();
$db->delete_all();
  
print_r($db->get_all_comments());
?>