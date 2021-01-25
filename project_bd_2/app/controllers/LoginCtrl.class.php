<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;
    
    public $login_1;
    public $pass_1;
      public $accountData;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');
        
        if(!empty(SessionUtils::load("id_pracownika", true))) return true;
        
 
        
        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        
       
        
//            try {
//                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
//                $record = App::getDB()->get("uzytkownik", "*", [
//                    "login" => $this->form->login         
//                ]);
//                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
//                if($this->form->login == $this->login_1){
//                    RoleUtils::addRole('admin');
//                    App::getRouter()->redirectTo("centrum");
//                } else {
//                    Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
//                }
//            } catch (\PDOException $e) {
//                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
//                if (App::getConf()->debug)
//                    Utils::addErrorMessage($e->getMessage());
//            }
        
        
        
        
        
         // sprawdzenie, czy dane logowania poprawne
         //(takie informacje najczęściej przechowuje się w bazie danych)
        if ($this->form->login == "admin" && $this->form->pass == "admin") {
            RoleUtils::addRole('admin');
            App::getRouter()->redirectTo("centrum");
        } else if ($this->form->login == "user" && $this->form->pass == "user") {
            RoleUtils::addRole('user');
            App::getRouter()->redirectTo("User");
        } else if ($this->form->login == "employee" && $this->form->pass == "employee") {
            RoleUtils::addRole('employee');
            App::getRouter()->redirectTo("employee");
        }else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("centrum");
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('personList');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }

}
