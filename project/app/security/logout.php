<?php
require_once dirname(__FILE__).'/../../config.php';

// 1. zakoñczenie sesji
session_start();
session_destroy();

// 2. przekieruj lub "forward" na stronê g³ówn¹
//redirect
header("Location: "._APP_URL);
//"forward"
//include _ROOT_PATH.'/index.php';