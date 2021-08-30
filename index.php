<?php
    require_once 'config/autoload.php';

    use Core\Router;
    use Core\Template;

    Router::Add('/students/add/(.*)/(.*)',function($Type, $Name){
        $StudentController = new \App\Controllers\StudentsController();
        $StudentController->AddNewStudent($Type, $Name);
    }, 'POST');

    Router::Run();