<?php
require_once dirname(__FILE__).'/../../config.php';

// 1. zako�czenie sesji
session_start();
session_destroy();

// 2. przekieruj lub "forward" na stron� g��wn�
//redirect
header("Location: "._APP_URL);
//"forward"
//include _ROOT_PATH.'/index.php';