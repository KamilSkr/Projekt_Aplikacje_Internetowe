<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;
//                         ---- ----
if (\core\RoleUtils::inRole('admin')){
class PersonEditCtrl {
    
    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->age = ParamUtils::getFromRequest('age', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię');
        }
        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->form->age))) {
            Utils::addErrorMessage('Wprowadź wiek');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("pracownicy", "*", [
                    "id_pracownika" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_pracownika'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->age = $record['age'];
                $this->form->stanowisko = $record['stanowisko'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_personDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("pracownicy", [
                    "id_pracownika" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("pracownicy");
                    if ($count <= 20) {
                        App::getDB()->insert("pracownicy", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "age" => $this->form->age,
                            "stanowisko" => $this->form->stanowisko
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("pracownicy", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "age" => $this->form->age,
                        "stanowisko" => $this->form->stanowisko
                            ], [
                        "id_pracownika" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdit.tpl');
    }
    
//    -------------------------------------------
    
//    kierownik
    
    
    
    public function __constructz() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSavez() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_towaru', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->ilosc = ParamUtils::getFromRequest('ilosc', true, 'Błędne wywołanie aplikacji');
        $this->form->stan = ParamUtils::getFromRequest('stan', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if ($this->form->ilosc < 0) {
            Utils::addErrorMessage('Wprowadź ilosc');
        }
        if (empty(trim($this->form->stan))) {
            Utils::addErrorMessage('Wprowadź stan');
        }
        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEditz() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewz() {
        $this->generateViewz();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEditz() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEditz()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("towar", "*", [
                    "id_towaru" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_towaru'];
                $this->form->nazwa = $record['nazwa'];
                $this->form->ilosc = $record['ilosc'];
                $this->form->stan = $record['stan'];
                $this->form->id_p = $record['id_pracownika'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViewz();
    }

    public function action_personDeletez() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEditz()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("towar", [
                    "id_towaru" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSavez() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSavez()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("towar");
                    if ($count <= 100) {
                        App::getDB()->insert("towar", [
                            "nazwa" => $this->form->nazwa,
                            "ilosc" => $this->form->ilosc,
                            "stan" => $this->form->stan,
                            "id_pracownika" => $this->form->id_p
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViewz(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("towar", [
                        "nazwa" => $this->form->nazwa,
                        "ilosc" => $this->form->ilosc,
                        "stan" => $this->form->stan,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_towaru" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViewz();
        }
    }

    public function generateViewz() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEditz.tpl');
    }
    
    
//    -----------  -------------
    
    
    public function __constructs() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSaves() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_zadania', true, 'Błędne wywołanie aplikacji');
        $this->form->do_wykonania = ParamUtils::getFromRequest('do_wykonania', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');
        $this->form->status = ParamUtils::getFromRequest('status', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->do_wykonania))) {
            Utils::addErrorMessage('Wprowadź zadanie');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }
        if (empty(trim($this->form->status))) {
            Utils::addErrorMessage('Wprowadź status');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdits() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewss() {
        $this->generateViews();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdits() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdits()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("zadania", "*", [
                    "id_zadania" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_zadania'];
                $this->form->do_wykonania = $record['do_wykonania'];
                $this->form->stanowisko = $record['stanowisko'];
                $this->form->status = $record['status'];
                $this->form->id_p = $record['id_pracownika'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViews();
    }

    public function action_personDeletes() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdits()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("zadania", [
                    "id_zadania" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSaves() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSaves()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("zadania");
                    if ($count <= 20) {
                        App::getDB()->insert("zadania", [
                            "do_wykonania" => $this->form->do_wykonania,
                            "stanowisko" => $this->form->stanowisko,
                            "status" => $this->form->status,
                            "id_pracownika" => $this->form->id_p
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViews(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("zadania", [
                        "do_wykonania" => $this->form->do_wykonania,
                        "stanowisko" => $this->form->stanowisko,
                        "status" => $this->form->status,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_zadania" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViews();
        }
    }

    public function generateViews() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdits.tpl');
    }

}
}else if (\core\RoleUtils::inRole('employee')){
    class PersonEditCtrl {
    
    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->age = ParamUtils::getFromRequest('age', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię');
        }
        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->form->age))) {
            Utils::addErrorMessage('Wprowadź wiek');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("pracownicy", "*", [
                    "id_pracownika" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_pracownika'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->age = $record['age'];
                $this->form->stanowisko = $record['stanowisko'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_personDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("pracownicy", [
                    "id_pracownika" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("pracownicy");
                    if ($count <= 20) {
                        App::getDB()->insert("pracownicy", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "age" => $this->form->age,
                            "stanowisko" => $this->form->stanowisko
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("pracownicy", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "age" => $this->form->age,
                        "stanowisko" => $this->form->stanowisko
                            ], [
                        "id_pracownika" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdit.tpl');
    }
    
//    -------------------------------------------
    
//   
    
    
    
    public function __constructz() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSavez() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_towaru', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->ilosc = ParamUtils::getFromRequest('ilosc', true, 'Błędne wywołanie aplikacji');
        $this->form->stan = ParamUtils::getFromRequest('stan', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if ($this->form->ilosc < 0) {
            Utils::addErrorMessage('Wprowadź ilosc');
        }
        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEditz() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewz() {
        $this->generateViewz();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEditz() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEditz()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("towar", "*", [
                    "id_towaru" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_towaru'];
                $this->form->nazwa = $record['nazwa'];
                $this->form->ilosc = $record['ilosc'];
                $this->form->stan = $record['stan'];
                $this->form->id_p = $record['id_pracownika'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViewz();
    }

    public function action_personDeletez() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEditz()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("towar", [
                    "id_towaru" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSavez() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSavez()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("towar");
                    if ($count <= 100) {
                        App::getDB()->insert("towar", [
                            "nazwa" => $this->form->nazwa,
                            "ilosc" => $this->form->ilosc,
                            "id_pracownika" => $this->form->id_p,
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViewz(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("towar", [
                        "nazwa" => $this->form->nazwa,
                        "ilosc" => $this->form->ilosc,
                        "stan" => $this->form->stan,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_towaru" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViewz();
        }
    }

    public function generateViewz() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEditz.tpl');
    }
    
    
//    -----------  -------------
    
    
    public function __constructs() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSaves() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_zadania', true, 'Błędne wywołanie aplikacji');
        $this->form->do_wykonania = ParamUtils::getFromRequest('do_wykonania', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');
        $this->form->status = ParamUtils::getFromRequest('status', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->do_wykonania))) {
            Utils::addErrorMessage('Wprowadź zadanie');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdits() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewss() {
        $this->generateViews();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdits() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdits()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("zadania", "*", [
                    "id_zadania" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_zadania'];
                $this->form->do_wykonania = $record['do_wykonania'];
                $this->form->stanowisko = $record['stanowisko'];
                $this->form->status = $record['status'];
                $this->form->id_p = $record['id_pracownika'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViews();
    }

    public function action_personDeletes() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdits()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("zadania", [
                    "id_zadania" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSaves() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSaves()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("zadania");
                    if ($count <= 20) {
                        App::getDB()->insert("zadania", [
                            "do_wykonania" => $this->form->do_wykonania,
                            "stanowisko" => $this->form->stanowisko,
                            "id_pracownika" => $this->form->id_p,

                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViews(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("zadania", [
                        "do_wykonania" => $this->form->do_wykonania,
                        "stanowisko" => $this->form->stanowisko,
                        "status" => $this->form->status,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_zadania" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViews();
        }
    }

    public function generateViews() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdits.tpl');
    }

}
    
}else if (\core\RoleUtils::inRole('user')){
    class PersonEditCtrl {
    
    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->age = ParamUtils::getFromRequest('age', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię');
        }
        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->form->age))) {
            Utils::addErrorMessage('Wprowadź wiek');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("pracownicy", "*", [
                    "id_pracownika" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_pracownika'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->age = $record['age'];
                $this->form->stanowisko = $record['stanowisko'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_personDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("pracownicy", [
                    "id_pracownika" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("pracownicy");
                    if ($count <= 20) {
                        App::getDB()->insert("pracownicy", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "age" => $this->form->age,
                            "stanowisko" => $this->form->stanowisko
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("pracownicy", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "age" => $this->form->age,
                        "stanowisko" => $this->form->stanowisko
                            ], [
                        "id_pracownika" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdit.tpl');
    }
    
//    -------------------------------------------
    
//    user
    
    
    
    public function __constructz() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSavez() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_towaru', true, 'Błędne wywołanie aplikacji');
        $this->form->nazwa = ParamUtils::getFromRequest('nazwa', true, 'Błędne wywołanie aplikacji');
        $this->form->ilosc = ParamUtils::getFromRequest('ilosc', true, 'Błędne wywołanie aplikacji');
        $this->form->stan = ParamUtils::getFromRequest('stan', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->nazwa))) {
            Utils::addErrorMessage('Wprowadź nazwe');
        }
        if ($this->form->ilosc < 0) {
            Utils::addErrorMessage('Wprowadź ilosc');
        }
        if (empty(trim($this->form->stan))) {
            Utils::addErrorMessage('Wprowadź stan');
        }
        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEditz() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewz() {
        $this->generateViewz();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEditz() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEditz()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("towar", "*", [
                    "id_towaru" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_towaru'];
                $this->form->nazwa = $record['nazwa'];
                $this->form->ilosc = $record['ilosc'];
                $this->form->stan = $record['stan'];
                $this->form->ilosc = $record['ilosc'];
                $this->form->id_p = $record['id_pracownika'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViewz();
    }

    public function action_personDeletez() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEditz()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("towar", [
                    "id_towaru" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSavez() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSavez()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("towar");
                    if ($count <= 100) {
                        App::getDB()->insert("towar", [
                            "nazwa" => $this->form->nazwa,
                            "ilosc" => $this->form->ilosc,
                            "stan" => $this->form->stan,
                            "id_pracownika" => $this->form->id_p
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViewz(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("towar", [
                        "nazwa" => $this->form->nazwa,
                        "ilosc" => $this->form->ilosc,
                        "stan" => $this->form->stan,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_towaru" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViewz();
        }
    }

    public function generateViewz() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEditz.tpl');
    }
    
    
//    -----------  -------------
    
    
    public function __constructs() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSaves() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_zadania', true, 'Błędne wywołanie aplikacji');
        $this->form->do_wykonania = ParamUtils::getFromRequest('do_wykonania', true, 'Błędne wywołanie aplikacji');
        $this->form->stanowisko = ParamUtils::getFromRequest('stanowisko', true, 'Błędne wywołanie aplikacji');
        $this->form->status = ParamUtils::getFromRequest('status', true, 'Błędne wywołanie aplikacji');
        $this->form->id_p = ParamUtils::getFromRequest('id_pracownika', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->do_wykonania))) {
            Utils::addErrorMessage('Wprowadź zadanie');
        }
        if (empty(trim($this->form->stanowisko))) {
            Utils::addErrorMessage('Wprowadź stanowisko');
        }
        if (empty(trim($this->form->status))) {
            Utils::addErrorMessage('Wprowadź status');
        }

        if (App::getMessages()->isError())
            return false;


        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdits() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_personNewss() {
        $this->generateViews();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_personEdits() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdits()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("zadania", "*", [
                    "id_zadania" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_zadania'];
                $this->form->do_wykonania = $record['do_wykonania'];
                $this->form->stanowisko = $record['stanowisko'];
                $this->form->status = $record['status'];
                $this->form->id_p = $record['id_pracownika'];
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateViews();
    }

    public function action_personDeletes() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdits()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("zadania", [
                    "id_zadania" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
    }

    public function action_personSaves() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSaves()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("zadania");
                    if ($count <= 20) {
                        App::getDB()->insert("zadania", [
                            "do_wykonania" => $this->form->do_wykonania,
                            "stanowisko" => $this->form->stanowisko,
                            "status" => $this->form->status,
                            "id_pracownika" => $this->form->id_p
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViews(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("zadania", [
                        "do_wykonania" => $this->form->do_wykonania,
                        "stanowisko" => $this->form->stanowisko,
                        "status" => $this->form->status,
                        "id_pracownika" => $this->form->id_p
                            ], [
                        "id_zadania" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            if (\core\RoleUtils::inRole('admin')){	
        App::getRouter()->forwardTo('centrum');
    } else if (\core\RoleUtils::inRole('user')){	
        App::getRouter()->forwardTo('User');
    } else if (\core\RoleUtils::inRole('employee')){	
        App::getRouter()->forwardTo('employee');
    }
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViews();
        }
    }

    public function generateViews() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEdits.tpl');
    }

}
}

