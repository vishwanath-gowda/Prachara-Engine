<?php
require_once('src/facebook.php');
$groups            = $facebook->api('/me');
foreach($groups as $groupid){
				  print_r($groupid);
				  }

?>