<?php

	function wait($micro_seconds)
	{
		usleep ($micro_seconds);
	}

	function google_IS_UP()
	{
		$ping = exec("ping -n 4 8.8.4.4");
		if(!(preg_match("/Received = 0/", $ping)))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
?>


