<?php
    namespace App\Controllers;

    use App\Models\Grade;

    class GradeController {

        public function AddNewGrade($StudentID, $StudentGrade) {

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