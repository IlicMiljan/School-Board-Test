<?php
    namespace App\Controllers;

    use App\Models\Student;
    use Core\Security;

    class StudentsController {

        public function AddNewStudent($Type, $Name) {
            $Type = Security::Input($Type);
            $Name = Security::Input($Name);

            switch (strtoupper($Type)) {
              case 'CSM' :
                  $Type = 'CSM';
                  break;
              case 'CSMB':
                  $Type = 'CSMB';
                  break;
              default:
                  $Type = NULL;
                  break;
            }

            if($Type == NULL) {
                http_response_code(400);
                exit();
            }

            $Student = new Student();
            $Student->CreateStudent($Type, $Name);

            $Data['Success'] = TRUE;

            return json_encode($Data);
        }
    }