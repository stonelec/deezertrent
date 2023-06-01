<?php

    require_once('database.php');

    $db = database::connexionBD();
    if (!$db)
    {
        header('HTTP/1.1 503 Service Unavailable');
        exit;
    }

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestRessource = array_shift($request);