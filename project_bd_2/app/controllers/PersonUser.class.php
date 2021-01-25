<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\PersonSearchForm;

class PersonUser {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonSearchForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->surname = ParamUtils::getFromRequest('sf_surname');
        $this->form->nazwa = ParamUtils::getFromRequest('sf_nazwa');
        $this->form->do_wykonania = ParamUtils::getFromRequest('sf_do_wykonania');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function action_User() {
        // 1. Walidacja danych formularza (z pobraniem)
        // - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
        //   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
        //   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->surname) && strlen($this->form->surname) > 0) {
            $search_params['surname[~]'] = $this->form->surname . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
        
//        ------- towar--------

        $search_paramsz = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->nazwa) && strlen($this->form->nazwa) > 0) {
            $search_paramsz['nazwa[~]'] = $this->form->nazwa . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
        
//        ---------- zadania ---------
        
         $search_params_s = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->do_wykonania) && strlen($this->form->do_wykonania) > 0) {
            $search_params_s['do_wykonania[~]'] = $this->form->do_wykonania . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
        
        
        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę osób bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "surname";
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("pracownicy", [
                "id_pracownika",
                "name",
                "surname",
                "age",
                "stanowisko",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
//        --------------------------

        
        $num_paramsz = sizeof($search_paramsz);
        if ($num_paramsz > 1) {
            $where = ["AND" => &$search_paramsz];
        } else {
            $where = &$search_paramsz;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "nazwa";
        //wykonanie zapytania

        try {
            $this->recordsz = App::getDB()->select("towar", [
                "id_towaru",
                "nazwa",
                "ilosc",
                "stan",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
//       --------------------------------
        
        $num_params_s = sizeof($search_params_s);
        if ($num_params_s > 1) {
            $where = ["AND" => &$search_params_s];
        } else {
            $where = &$search_params_s;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "stanowisko";
        //wykonanie zapytania

        try {
            $this->records_s = App::getDB()->select("zadania", [
                "id_zadania",
                "do_wykonania",
                "stanowisko",
                "status",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        
        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('pracownicy', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('towar', $this->recordsz);  // lista rekordów z bazy danych
        App::getSmarty()->assign('zadania', $this->records_s);  // lista rekordów z bazy danych
        App::getSmarty()->display('User.tpl');
    }

}
