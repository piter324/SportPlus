<?php
    class Events{

        private $mysqli;
        function __construct($mysqli)
        {
            $this->mysqli = $mysqli;
        }
        function listAll()
        {
        	$forReturn = array();
        	$query = "SELECT id,nazwa FROM impreza";
        	if($result = $this->mysqli->query($query))
        	{
                $forReturn['status']="Success";
                $forReturn['returned']=array();
        		while($row=$result->fetch_assoc())
        		{
        			$forReturn['returned'][]=$row;
        		}
        	}
        	else
        	{
        		$forReturn['status']="Error";
        		$forReturn['message']="Błąd połączenia z bazą danych";
        	}
        	return $forReturn;
        }
    }
?>