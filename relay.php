<?php
require('functions.php');
	class Relay{
		private $relay_number;

		function __construct($number_of_relay)
		{
			$this->relay_number = $number_of_relay;
		}

		function passive_Mode_Relay()
		{
			//echo "<span>Passive Relay:".$this->relay_number."</span><br>";
		}

		function active_Mode_Relay()
		{
			//echo "<span>Active Relay:".$this->relay_number."</span><br>";
		}

		function pulse($micro_seconds)
		{
			$this->active_Mode_Relay();
			wait($micro_seconds);
			$this->passive_Mode_Relay();
		}
	}
?>