<?php
$path = "/nfs/2016/c/cfu/http/MyWebSite/j03/img/42.png";
header('Content-Type: image/png');
readfile($path);
?>
