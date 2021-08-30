<?php
    require_once 'config/autoload.php';

    use Core\Router;
    use Core\Template;

    Router::Add('/students/add/(.*)/(.*)',function($Type, $Name){
        $StudentController = new \App\Controllers\StudentsController();
        $StudentController->AddNewStudent($Type, $Name);
    }, 'POST');

    Router::Add('/grades/add/([0-9]*)/([0-9]*)', function($StudentID, $Grade) {
        $GradeController = new \App\Controllers\GradeController();
        $GradeController->AddNewGrade($StudentID, $Grade);
    }, 'POST');

    Router::Run();