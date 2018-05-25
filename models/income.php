<?php
    class Income{

        private $mysqli;
        function __construct($mysqli)
        {
            $this->mysqli = $mysqli;
        }
        function incomeFromClientsInSelectedTime($startDate,$endDate)
        {
        	$forReturn = array();
        	$query = "SELECT COUNT(kwota) as 'ticket_count',SUM(kwota) AS 'income',typ_klienta_nazwa FROM transakcja INNER JOIN klient ON klient_id=klient.id WHERE data_platnosci BETWEEN '".$startDate."' AND '".$endDate."' GROUP BY typ_klienta_nazwa";
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

        function discountsForEventsForCustomerTypes()
        {
            $forReturn = array();
            $query = "SELECT impreza.nazwa AS 'event_name', klient.typ_klienta_nazwa, SUM(cena_biletu.cena-kwota) as 'discount' FROM transakcja INNER JOIN bilet ON bilet.id = transakcja.id INNER JOIN cena_biletu ON (bilet.miejsce_litera = cena_biletu.sektor_litera AND bilet.impreza_id = cena_biletu.impreza_id) INNER JOIN klient ON transakcja.klient_id = klient.id INNER JOIN impreza ON bilet.impreza_id = impreza.id WHERE cena_biletu.cena-kwota>0 GROUP BY impreza.nazwa,klient.typ_klienta_nazwa ORDER BY impreza.nazwa, klient.typ_klienta_nazwa";
            if($result = $this->mysqli->query($query))
            {
                $forReturn['status']="Success";
                $forReturn['returned']=array();
                $lastEventName='';
                $currEvent=null;
                while($row=$result->fetch_assoc())
                {
                    if($lastEventName != $row['event_name'])
                    {
                        if($currEvent) $forReturn['returned'][]=$currEvent;

                        $currEvent = array();
                        $currEvent['event_name'] = $row['event_name'];
                        $currEvent['details']=array();
                        $lastEventName = $row['event_name'];
                    }
                    $currEvent['details'][$row['typ_klienta_nazwa']] = $row['discount'];
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

        function incomeFromEvents()
        {
            $forReturn = array();
            $query = "SELECT impreza.nazwa AS 'impreza_nazwa',SUM(kwota) AS 'income' FROM transakcja INNER JOIN bilet ON bilet.id = transakcja.id INNER JOIN impreza ON bilet.impreza_id = impreza.id WHERE data_platnosci IS NOT NULL GROUP BY impreza.nazwa";
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

        function incomeByPaymentMethods()
        {
            $forReturn = array();
            $query = "SELECT COUNT(kwota) AS 'count',SUM(kwota) AS 'income',forma_platnosci.typ FROM transakcja INNER JOIN forma_platnosci ON transakcja.forma_platnosci_id = forma_platnosci.id WHERE data_platnosci IS NOT NULL GROUP BY forma_platnosci.typ";
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