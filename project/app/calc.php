<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyla sie do klienta.
// Wyslaniem odpowiedzi zajmie sie odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - ponizszy skrypt przerwie przetwarzanie w tym punkcie gdy uzytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$x,&$y,&$z,&$messages){
	// sprawdzenie, czy parametry zostaly przekazane
	if ( ! (isset($x) && isset($y) && isset($z))) {
		// sytuacja wystapi kiedy np. kontroler zostanie wywolany bezposrednio - nie z formularza
		// teraz zakladamy, ze nie jest to blad. Po prostu nie wykonamy obliczen
		return false;
	}

	// sprawdzenie, czy potrzebne wartosci zostaly przekazane
	if ( $x == "") {
		$messages [] = 'Nie podano liczby 1';
	}
	if ( $y == "") {
		$messages [] = 'Nie podano liczby 2';
	}
        if ( $z == "") {
		$messages [] = 'Nie podano liczby 2';
	}

	//nie ma sensu walidowac dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y sa liczbami calkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartosc nie jest liczba calkowita';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartosc nie jest liczba calkowita';
	}
        if (! is_numeric( $z )) {
		$messages [] = 'Druga wartosc nie jest liczba calkowita';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$z,&$result){
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
        $z = intval($z);

	
	//wykonanie operacji
        $m = 12 *$z; 
	$p = $x + ($x * $y / 100);
	$result = ($p / $m);
}

//definicja zmiennych kontrolera
$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jesli wszystko w porzadku
getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages) ) { // gdy brak bledów
	process($x,$y,$z,$result);
}

// Wywolanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   beda dostepne w dolaczonym skrypcie
include 'calc_view.php';