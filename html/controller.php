<?php
header('Content-Type:application/json');
if(!isset($_GET['url'])) die("{\"status\":\"Error\", \"message\":\"Invalid API call\"}");

require "../models/dataModel.php";
$dataModel = new DataModel();
$mysqli = $dataModel->connectToDB();

$url = explode('/',$_GET['url']);
switch ($url[0]) {
	case 'events':
		require "../models/events.php";
		$events = new Events($mysqli);
		switch($url[1]){
			case 'listAll':
				$output = $events->listAll();
				echo json_encode($output);
			break;
			default:
				echo "{\"status\":\"Error\", \"message\":\"Invalid API call\"}";
			break;
		}
	break;
	case 'sales':
		require "../models/sales.php";
		$sales = new Sales($mysqli);
		switch($url[1]){
			case 'soldAndReserved':
				$output = $sales->soldAndReserved();
				echo json_encode($output);
			break;
			case 'reservationsToExpire':
				$output = $sales->reservationsToExpire($url[2]);
				echo json_encode($output);
			break;
			default:
				echo "{\"status\":\"Error\", \"message\":\"Invalid API call\"}";
			break;
		}
		break;

		case 'income':
		require "../models/income.php";
		$income = new Income($mysqli);
		switch($url[1]){
			case 'incomeFromClientsInSelectedTime':
				$output = $income->incomeFromClientsInSelectedTime($url[2],$url[3]);
				echo json_encode($output);
			break;
			case 'discountsForEventsForCustomerTypes':
				$output = $income->discountsForEventsForCustomerTypes($url[2],$url[3]);
				echo json_encode($output);
			break;
			case 'incomeFromEvents':
				$output = $income->incomeFromEvents($url[2],$url[3]);
				echo json_encode($output);
			break;
			case 'incomeByPaymentMethods':
				$output = $income->incomeByPaymentMethods();
				echo json_encode($output);
			break;
			default:
				echo "{\"status\":\"Error\", \"message\":\"Invalid API call\"}";
			break;
		}
		break;

		case 'customers':
		require "../models/customers.php";
		$customers = new Customers($mysqli);
		switch($url[1]){
			case 'customerCountInTypes':
				$output = $customers->customerCountInTypes();
				echo json_encode($output);
			break;
			case 'mostUsedPaymentMethods':
				$output = $customers->mostUsedPaymentMethods();
				echo json_encode($output);
			break;
			default:
				echo "{\"status\":\"Error\", \"message\":\"Invalid API call\"}";
			break;
		}
		break;
	
	default:
		echo "{\"status\":\"Error\", \"message\":\"Invalid API call\"}";
		break;
}
$mysqli->close();
?>