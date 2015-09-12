<?php
include( "functions.php" );
$data = pack("VV",1,03).$config["server_rcon"].chr(0).''.chr(0);
$data = pack("V",strlen($data)).$data;
fwrite($conn, $data, strlen($data));
$size = @fread($conn, 4);
sendcmd($conn, $_POST["cmd"]);
echo $_POST["cmd"];
?>
