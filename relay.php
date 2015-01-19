<?php
require('functions.php');
	class Relay{
		private $relay_number;

		function __construct($number_of_relay)
		{
			$this->relay_number = $number_of_relay;
			$this->init_Relay();
		}

		function init_Relay()
		{
			exec("gpio mode $this->relay_number out",$res);
			return $res;
		}

		function passive_Mode_Relay()
		{
			exec("gpio write $this->relay_number 1",$res);
			return $res;
		}

		function active_Mode_Relay()
		{
			exec("gpio write $this->relay_number 0",$res);
			return $res;
		}

		function pulse($micro_seconds)
		{
			$this->active_Mode_Relay();
			wait($micro_seconds);
			$this->passive_Mode_Relay();
		}
	}
?>