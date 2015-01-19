<?php

include('equipment.php');

$config = parse_ini_file("configuration.ini");

// CONFIGURATIOn
$server_relay = $config["server_relay"];
$server_ip = $config["server_addr"];
$server_up_time = $config["server_up_time"];
$server_down_time = $config["server_down_time"];

$max_try = $config["max_try_reload"];

$minute = $config["minute"];
$seconde = $config["seconde"];

// OBJECT INIT
$server = new Equipment($server_ip,$server_relay,$server_up_time,$server_down_time);

// OTHERS VARIABLES
$try = 0;

/*while(true)
{

}*/

if($server->ping() == 1)
{
	$try = 0;
}
else
{
	$try++;
	if($try >= 3)
	{
		if(google_IS_UP() == 1)
		{
			$server->reload();
			wait(14*$minute+15*$seconde); // 15min-15s
		}
		else
		{
			wait(2*$minute);
		}
	}
}
wait(45*$seconde);

?>