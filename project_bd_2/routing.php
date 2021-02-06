<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('personList'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('personList',    'PersonListCtrl');
Utils::addRoute('centrum',    'PersonAdmin');
Utils::addRoute('employee',    'PersonEmp');
Utils::addRoute('employeePracownik',    'PersonEmp');
Utils::addRoute('employeeTowar',    'PersonEmp');
Utils::addRoute('employeeZadania',    'PersonEmp');
Utils::addRoute('User',    'PersonUser');
Utils::addRoute('UserTowar',    'PersonUser');
Utils::addRoute('UserZadania',    'PersonUser');
Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('personNew',     'PersonEditCtrl',	['employee','admin']);
Utils::addRoute('personEdit',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personSave',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personDelete',  'PersonEditCtrl',	['admin']);



Utils::addRoute('personNewz',     'PersonEditCtrl',	['employee','admin']);
Utils::addRoute('personEditz',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personSavez',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personDeletez',  'PersonEditCtrl',	['admin']);



Utils::addRoute('personNewss',     'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personEdits',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personSaves',    'PersonEditCtrl',	['user','employee','admin']);
Utils::addRoute('personDeletes',  'PersonEditCtrl',	['admin']);