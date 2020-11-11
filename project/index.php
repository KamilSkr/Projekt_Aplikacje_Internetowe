<link rel="stylesheet" href="main.css">
<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przegladarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc.php");

//przekazanie zadania do nastepnego dokumentu ("forward")
include _ROOT_PATH.'/app/calc.php';