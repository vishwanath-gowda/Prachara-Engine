<?php 
//error_reporting(0);
$groupfile = fopen("group.txt", "a+");
if($groupfile){


echo "file opening for read/write successfull ".$groupfile;
}else{

echo "failed to open";
}

/*echo "ERROR:".fread($groupfile,filesize("group.txt"));
fclose($groupfile);*/


?>
