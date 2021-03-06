
<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysy�a si� do klienta.
// Wys�aniem odpowiedzi zajmie si� odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poni�szy skrypt przerwie przetwarzanie w tym punkcie gdy u�ytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametr�w
function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
}

//walidacja parametr�w z przygotowaniem zmiennych dla widoku
function validate(&$x,&$y,&$z,&$msgs,&$hide_intro){
	// sprawdzenie, czy parametry zosta�y przekazane
	if ( ! (isset($x) && isset($y) && isset($z))) {
		// sytuacja wyst�pi kiedy np. kontroler zostanie wywo�any bezpo�rednio - nie z formularza
		// teraz zak�adamy, ze nie jest to b��d. Po prostu nie wykonamy oblicze�
		$hide_intro = true;
	}

	// sprawdzenie, czy potrzebne warto�ci zosta�y przekazane
	if ( $x == "") {
		$msgs [] = 'Nie podano liczby 1';
	}
	if ( $y == "") {
		$msgs [] = 'Nie podano liczby 2';
	}
        if ( $z == "") {
		$msgs [] = 'Nie podano liczby 3';
	}

	//nie ma sensu walidowa� dalej gdy brak parametr�w
	if (count($msgs) != 0) {
        return false;
    }

    // sprawdzenie, czy $x i $y s� liczbami ca�kowitymi
	if (! is_numeric( $x )) {
		$msgs [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$msgs [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        if (! is_numeric( $z )) {
		$msgs [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	

	if (count($msgs) != 0) {
        return false;
    } else {
        return true;
    }
}

function process(&$x,&$y,&$z,&$result){
	
	//konwersja parametr�w na int
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
$hide_intro = false;

//pobierz parametry i wykonaj zadanie je�li wszystko w porz�dku
getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages, $hide_intro) ) { // gdy brak b��d�w
	process($x,$y,$z,$result);
}

// Wywo�anie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   b�d� dost�pne w do��czonym skrypcie



include 'calc_view.php';

