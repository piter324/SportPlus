<?php
class DataModel{
	private $mysqli;

	function connectToDB(){
		$config_array = parse_ini_file("../config-sportplus.ini");
		$mysqli = new mysqli($config_array['address'],$config_array['username'],$config_array['password'],$config_array['db_name']);
		if($mysqli->connect_errno)
		{
			die("Connection to MySQL Database failed: ".$mysqli->connect_error);
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}
}


?>