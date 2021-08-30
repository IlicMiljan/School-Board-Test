<?php
    require_once 'config/autoload.php';

    use Core\Router;
    use Core\Template;

    Router::Add('/boards/add/(.*)/(.*)', function($BoardName, $Format) {
        $BoardController = new \App\Controllers\BoardController();

        return $BoardController->AddNewBoard($BoardName, $Format);
    }, 'GET');

    Router::Add('/students/add/(.*)/(.*)',function($Type, $Name) {
        $StudentController = new \App\Controllers\StudentsController();
        return $StudentController->AddNewStudent($Type, $Name);
    }, 'GET');

    Router::Add('/students/([0-9]*)',function($StudentID) {
        $StudentController = new \App\Controllers\StudentsController();
        return $StudentController->StudentResult($StudentID);
    }, 'GET');

    Router::Add('/grades/add/([0-9]*)/([0-9]*)', function($StudentID, $Grade) {
        $GradeController = new \App\Controllers\GradeController();

        return $GradeController->AddNewGrade($StudentID, $Grade);
    }, 'GET');

    Router::Run();