<?php

require('relay.php');
	class Server{

		private $ip_server;
		private $relay;

		function __construct($ip,$relay_number)
		{
			$this->ip_server = $ip;
			$this->relay = new Relay($relay_number);
		}

		function up_Server()
		{
			$this->relay->pulse(100);
			//echo "<span>UP</span><br>";
		}

		function down_Server()
		{
			$this->relay->pulse(10000);
			//echo "<span>DOWN</span><br>";
		}

		function reload_Server()
		{
			try
			{
				$this->down_Server();
				wait(1000);
				$this->up_Server();
				return 1;
			}catch(Exception $e)
			{
				return 0;
			}
		}

		function ping()
		{
			$regex = "/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
			if(preg_match($regex,$this->ip_server))
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