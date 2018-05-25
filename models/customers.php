<?php
    class Customers{

        private $mysqli;
        function __construct($mysqli)
        {
            $this->mysqli = $mysqli;
        }
        function customerCountInTypes()
        {
        	$forReturn = array();
        	$query = "SELECT typ_klienta_nazwa,COUNT(id) as 'count' FROM klient GROUP BY typ_klienta_nazwa";
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

        function mostUsedPaymentMethods()
        {
            $forReturn = array();
            $query = "SELECT typ_klienta_nazwa,forma_platnosci.typ,COUNT(forma_platnosci.id) AS 'count' FROM forma_platnosci INNER JOIN klient ON klient.id=klient_id GROUP BY forma_platnosci.typ,typ_klienta_nazwa ORDER BY typ_klienta_nazwa,COUNT(forma_platnosci.id)";
            if($result = $this->mysqli->query($query))
            {
                $forReturn['status']="Success";
                $forReturn['returned']=array();
                $lastCustomerTypeName='';
                $currCustomerType=null;
                while($row=$result->fetch_assoc())
                {
                    //$forReturn['returned'][]=$row;
                    if($lastCustomerTypeName != $row['typ_klienta_nazwa'])
                    {
                        if($currCustomerType) $forReturn['returned'][]=$currCustomerType;

                        $currCustomerType = array();
                        $currCustomerType['typ_klienta_nazwa'] = $row['typ_klienta_nazwa'];
                        $currCustomerType['details']=array();
                        $lastCustomerTypeName = $row['typ_klienta_nazwa'];
                    }
                    $currCustomerType['details'][$row['typ']] = $row['count'];
                }
                if($currCustomerType) $forReturn['returned'][]=$currCustomerType;
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