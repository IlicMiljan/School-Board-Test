<?php
    namespace App\Controllers;

    use App\Models\Board;
    use App\Models\Student;
    use Core\Security;

    class StudentsController {

        public function AddNewStudent($Type, $Name) {
            $Type = Security::Input($Type);
            $Name = Security::Input($Name);

            $Board = new Board();
            $BoardData = $Board->GetBoard(strtoupper($Type));

            if($BoardData == FALSE) {
                http_response_code(400);
                exit();
            }

            $Student = new Student();
            $Student->CreateStudent($BoardData['ID'], $Name);

            $Data['Success'] = TRUE;

            return json_encode($Data);
        }
    }