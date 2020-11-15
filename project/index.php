<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przegl�darki klienta (redirect)
//header("Location: "._APP_URL."/app/calc.php");

//przekazanie ��dania do nast�pnego dokumentu ("forward")
include _ROOT_PATH.'/app/calc.php';