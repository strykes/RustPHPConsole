<?php
include("config.php");

try
{
    $conn = @fsockopen("tcp://".$config["ip"],$config["port"], $errno, $errstr, 30);
}
catch (Exception $err) { }

function sendcmd($conn, $cmd)
{
    $data = pack("VV",1,02).$cmd.chr(0).''.chr(0);
    $data = pack("V",strlen($data)).$data;
    fwrite($conn, $data, strlen($data));
}

function auth($conn)
{
	global $config;
	$data = pack("VV",1,03).$config["server_rcon"].chr(0).''.chr(0);
	$data = pack("V",strlen($data)).$data;
	fwrite($conn, $data, strlen($data));
}

?>
