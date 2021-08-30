<?php
    namespace App\Controllers;

    use App\Models\Grade;
    use Core\Security;

    class GradeController {

        public function AddNewGrade($StudentID, $StudentGrade) {
            $StudentID    = Security::Input($StudentID);
            $StudentGrade = Security::Input($StudentGrade);

            $Grade = new Grade();

            try {
                $Grade->CreateGrade($StudentID, $StudentGrade);
            } catch (\Exception $E) {
                http_response_code(400);
                exit();
            }

            $Data['Success'] = TRUE;

            return json_encode($Data);
        }
    }