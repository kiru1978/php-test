<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
     
require_once __DIR__ . '/../app/controllers/CaractersController.php';


require_once __DIR__ . '/../helpers/functions.php';

require_once __DIR__ . '/../core/Router.php';

require_once __DIR__ . '/../vendor/autoload.php';
