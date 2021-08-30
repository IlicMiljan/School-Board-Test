<?php
    require_once 'config/config.php';
    require_once 'config/database.php';

    // Helpers
    require_once 'helpers/xml-helper.php';

    spl_autoload_register(function($ClassName) {
        $CorePath = "{$ClassName}.Class.php";
        $UserPath = "{$ClassName}.php";

        if (file_exists($CorePath)) {
            require_once($CorePath);
        } else if (file_exists($UserPath)) {
            require_once($UserPath);
        } else {
            die("The file {$ClassName}.php could Not Be Found!");
        }
    });