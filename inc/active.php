<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$page = $components[2];
$comp = explode('.', $page);
$active = $comp[0];

switch($active) {

	case 'index' : $title = 'ቤት';
		break;
	case 'login' : $title = 'ግባ';
		break;
	case 'register' : $title = 'መዝግብ';
		break;
	case 'reservation' : $title = 'አዲስ ቦታ ማስያዝ';
		break;
	case 'dashboard' : $title = 'የመጠለያ ሁኔታ';
			break;
	case 'management' : $title = 'የቅበላ አስተዳደርt';
				break;
	default : $title = '';

}

?>
