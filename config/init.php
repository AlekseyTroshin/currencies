<?php

define("ROOT", dirname(__DIR__));

define("WWW", ROOT . "/public");
define("APP", ROOT . "/app");
define("CONFIG", ROOT . "/config");

define("PORT", 8888);
define("PATH", "http://localhost:" . PORT);

require_once ROOT . "/vendor/autoload.php";