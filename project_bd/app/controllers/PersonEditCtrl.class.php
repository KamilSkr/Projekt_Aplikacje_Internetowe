<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;

class PersonEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_trenera', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->age = ParamUtils::getFromRequest('age', true, 'Błędne wywołanie aplikacji');
        $this->form->club = ParamUtils::getFromRequest('club', true, 'Błędne wywołanie aplikacji');

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
        if (empty(trim($this->form->club))) {
            Utils::addErrorMessage('Wprowadź klub');
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
                $record = App::getDB()->get("trenerzy", "*", [
                    "id_trenera" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_trenera'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->age = $record['age'];
                $this->form->club = $record['club'];
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
                App::getDB()->delete("trenerzy", [
                    "id_trenera" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('personList');
    }

    public function action_personSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("trenerzy");
                    if ($count <= 20) {
                        App::getDB()->insert("trenerzy", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "age" => $this->form->age,
                            "club" => $this->form->club
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("trenerzy", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "age" => $this->form->age,
                        "club" => $this->form->club
                            ], [
                        "id_trenera" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('personList');
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
    
//    Zawodnik
    
    
    
    public function __constructz() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSavez() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_zawodnika', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->position= ParamUtils::getFromRequest('position', true, 'Błędne wywołanie aplikacji');
        $this->form->club = ParamUtils::getFromRequest('club', true, 'Błędne wywołanie aplikacji');
        $this->form->date = ParamUtils::getFromRequest('date', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię');
        }
        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->form->position))) {
            Utils::addErrorMessage('Wprowadź pozycje');
        }
        if (empty(trim($this->form->club))) {
            Utils::addErrorMessage('Wprowadź klub');
        }
        if (empty(trim($this->form->date))) {
            Utils::addErrorMessage('Wprowadź date');
        }
        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów

        $d = \DateTime::createFromFormat('Y-m-d', $this->form->date);
        if ($d === false) {
            Utils::addErrorMessage('Zły format daty. Przykład: 2015-12-20');
        }

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
                $record = App::getDB()->get("zawodnik", "*", [
                    "id_zawodnika" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_zawodnika'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->club = $record['club'];
                $this->form->position = $record['position'];
                $this->form->date = $record['date'];
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
                App::getDB()->delete("zawodnik", [
                    "id_zawodnika" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('personList');
    }

    public function action_personSavez() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSavez()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("zawodnik");
                    if ($count <= 20) {
                        App::getDB()->insert("zawodnik", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "club" => $this->form->club,
                            "position" => $this->form->position,
                            "date" => $this->form->date
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViewz(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("zawodnik", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "club" => $this->form->club,
                        "position" => $this->form->position,
                        "date" => $this->form->date
                            ], [
                        "id_zawodnika" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('personList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateViewz();
        }
    }

    public function generateViewz() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('PersonEditz.tpl');
    }
    
    
//    ----------- sedzia -------------
    
    
    public function __constructs() {
        //stworzenie potrzebnych obiektów
        $this->form = new PersonEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSaves() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('id_sedzia', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->age = ParamUtils::getFromRequest('age', true, 'Błędne wywołanie aplikacji');
        $this->form->experience = ParamUtils::getFromRequest('experience', true, 'Błędne wywołanie aplikacji');

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
        if (empty(trim($this->form->experience))) {
            Utils::addErrorMessage('Doswiadczenie (w latach)');
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
                $record = App::getDB()->get("sedzia", "*", [
                    "id_sedzia" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['id_sedzia'];
                $this->form->name = $record['name'];
                $this->form->surname = $record['surname'];
                $this->form->age = $record['age'];
                $this->form->experience = $record['experience'];
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
                App::getDB()->delete("sedzia", [
                    "id_sedzia" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('personList');
    }

    public function action_personSaves() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSaves()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("sedzia");
                    if ($count <= 20) {
                        App::getDB()->insert("sedzia", [
                            "name" => $this->form->name,
                            "surname" => $this->form->surname,
                            "age" => $this->form->age,
                            "experience" => $this->form->experience
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateViews(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("sedzia", [
                        "name" => $this->form->name,
                        "surname" => $this->form->surname,
                        "age" => $this->form->age,
                        "experience" => $this->form->experience
                            ], [
                        "id_sedzia" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('personList');
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
