<?php
$config = array();
$config["server_rcon"] = "renebplayground";
$config["ip"] = "94.23.252.24";
$config["port"] = 28017;
try
{
    $conn = @fsockopen($config["ip"],$config["port"], $errno, $errstr, 2);
}
catch (Exception $err) { }

function sendcmd($conn, $cmd)
{
    $data = pack("VV",1,02).$cmd.chr(0).''.chr(0);
    $data = pack("V",strlen($data)).$data;
    fwrite($conn, $data, strlen($data));
}
?>
