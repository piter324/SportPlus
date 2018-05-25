<?php
    class Sales{

        private $mysqli;
        function __construct($mysqli)
        {
            $this->mysqli = $mysqli;
        }
        function soldAndReserved()
        {
        	$forReturn = array();
        	$query = "SELECT impreza.nazwa,(IF (data_wygasniecia IS NOT NULL,'RESERVED','BOUGHT')) AS 'status',COUNT(*) AS 'count' FROM transakcja INNER JOIN bilet ON transakcja.id=bilet.id INNER JOIN impreza ON impreza_id=impreza.id WHERE typ_zakupu='B' GROUP BY impreza.nazwa, (IF (data_wygasniecia IS NOT NULL,'RESERVED','BOUGHT')) ORDER BY impreza.nazwa,status";
        	if($result = $this->mysqli->query($query))
        	{
                $forReturn['status']="Success";
        		$forReturn['returned']=array();
                $lastEventName='';
                $currEvent=null;
        		while($row=$result->fetch_assoc())
        		{
                    if($lastEventName != $row['nazwa'])
                    {
                        if($currEvent) $forReturn['returned'][]=$currEvent;

                        $currEvent = array();
                        $currEvent['nazwa'] = $row['nazwa'];
                        $currEvent['details']=array();
                        $lastEventName = $row['nazwa'];
                    }
                    $currEvent['details'][$row['status']] = $row['count'];
        		}
                if($currEvent) $forReturn['returned'][]=$currEvent;
        	}
        	else
        	{
        		$forReturn['status']="Error";
        		$forReturn['message']="Błąd połączenia z bazą danych";
        	}
        	return $forReturn;
        }

        function reservationsToExpire($endDate)
        {
            $forReturn = array();
            $query = "SELECT impreza.nazwa AS impreza_nazwa,COUNT(*) AS 'count' FROM transakcja INNER JOIN bilet ON transakcja.id=bilet.id INNER JOIN impreza ON impreza_id=impreza.id WHERE typ_zakupu='B' AND data_wygasniecia<'".$endDate."' GROUP BY impreza_id";
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