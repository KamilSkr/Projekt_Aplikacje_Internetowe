<?php //
require_once dirname(__FILE__).'/../../config.php';

//pobranie parametr�w
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['pass'] = isset ($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

//walidacja parametr�w z przygotowaniem zmiennych dla widoku
function validateLogin(&$form,&$messages){
	// sprawdzenie, czy parametry zosta�y przekazane
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		//sytuacja wyst�pi kiedy np. kontroler zostanie wywo�any bezpo�rednio - nie z formularza
		return false;
	}

	// sprawdzenie, czy potrzebne warto�ci zosta�y przekazane
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['pass'] == "") {
		$messages [] = 'Nie podano hasła';
	}

	//nie ma sensu walidowa� dalej, gdy brak parametr�w
	if (count ( $messages ) > 0) return false;

	// sprawdzenie, czy dane logowania s� poprawne
	// - takie informacje najcz�ciej przechowuje si� w bazie danych
	//   jednak na potrzeby przyk�adu sprawdzamy bezpo�rednio
	if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$messages [] = 'Niepoprawny login lub has�o';
	return false; 
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcj�
getParamsLogin($form);

if (!validateLogin($form,$messages)) {
	//je�li b��d logowania to wy�wietl formularz z tekstami z $messages
	include _ROOT_PATH.'/app/security/login_view.php';
} else { 
	//ok przekieruj lub "forward" na stron� g��wn�
	
	//redirect - przegl�darka dostanie ten adres do "przej�cia" na niego (wys�ania kolejnego ��dania)
	header("Location: "._APP_URL);
	
	//"forward"
	//include _ROOT_PATH.'/index.php';
}