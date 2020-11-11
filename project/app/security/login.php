<?php
require_once dirname(__FILE__).'/../../config.php';

//pobranie parametrów
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['pass'] = isset ($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validateLogin(&$form,&$messages){
	// sprawdzenie, czy parametry zostaly przekazane
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		//sytuacja wystapi kiedy np. kontroler zostanie wywolany bezposrednio - nie z formularza
		return false;
	}

	// sprawdzenie, czy potrzebne wartosci zostaly przekazane
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['pass'] == "") {
		$messages [] = 'Nie podano hasla';
	}

	//nie ma sensu walidowac dalej, gdy brak parametrów
	if (count ( $messages ) > 0) return false;

	// sprawdzenie, czy dane logowania sa poprawne
	// - takie informacje najczesciej przechowuje sie w bazie danych
	//   jednak na potrzeby przykladu sprawdzamy bezposrednio
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
	
	$messages [] = 'Niepoprawny login lub haslo';
	return false; 
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcje
getParamsLogin($form);

if (!validateLogin($form,$messages)) {
	//jesli blad logowania to wyswietl formularz z tekstami z $messages
	include _ROOT_PATH.'/app/security/login_view.php';
} else { 
	//ok przekieruj lub "forward" na strone glówna
	
	//redirect - przegladarka dostanie ten adres do "przejscia" na niego (wyslania kolejnego zadania)
	header("Location: "._APP_URL);
	
	//"forward"
	//include _ROOT_PATH.'/index.php';
}