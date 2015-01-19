<?php

require('relay.php');

class Equipement{
		private $ip_equipment;
		private $relay;
		private $down_time;
		private $up_time;

		function __construct($ip,$relay_number,$up,$down)
		{
			$this->ip_equipment = $ip;
			$this->relay = new Relay($relay_number);
			$this->up_time = $up;
			$this->down_time = $down;
		}

		function up_Equipment()
		{
			$this->relay->pulse($up_time);
		}

		function down_Equipment()
		{
			$this->relay->pulse($down_time);
		}

		function reload_Equipment()
		{
			try
			{
				$this->down_Equipment();
				wait(1000);
				$this->up_Equipment();
				return 1;
			}catch(Exception $e)
			{
				return 0;
			}
		}

		function ping()
		{
			$regex = "/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
			if(preg_match($regex,$this->ip_equipment))
			{
				$ping = exec("ping -n 4 $this->ip_server");
				if(!(preg_match("/Received = 0/", $ping)))
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
	}
?>