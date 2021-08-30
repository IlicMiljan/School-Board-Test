<?php
    namespace App\Controllers;

    use App\Models\Board;
    use App\Models\Student;
    use Core\Security;
    use SimpleXMLElement;

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

        public function StudentResult($StudentID) {
            $StudentID = Security::Input($StudentID);

            $Student = new Student();
            $StudentData = $Student->GetStudentWithGrades($StudentID);

            $Format   = NULL;
            $Type     = NULL;
            $Data     = array();
            $MaxGrade = NULL;

            foreach ($StudentData as $Grade) {
                $Data['StudentID']         = $Grade['SID'];
                $Data['Name']              = $Grade['Name'];
                $Data['Grades'][]['Grade'] = $Grade['Grade'];
                $Data['AvgGrade']          = $Grade['AvgGrade'];
                $Format                    = $Grade['Format'];
                $Type                      = $Grade['BoardName'];
                $MaxGrade                  = $Grade['MaxGrade'];
            }

            switch($Type) {
                case 'CSM':
                    if($Data['AvgGrade'] >= 7)
                        $Data['FinalResult'] = "PASS";
                    else {
                        $Data['FinalResult'] = "FAIL";
                    }
                    break;
                case 'CSMB':
                    if($MaxGrade > 8)
                        $Data['FinalResult'] = "PASS";
                    else {
                        $Data['FinalResult'] = "FAIL";
                    }
                    break;
            }

            switch ($Format) {
                case 'JSON':
                    echo json_encode($Data);
                    break;
                case 'XML':
                    $XML = new SimpleXMLElement('<?xml version="1.0"?><Student></Student>');
                    ArrayToXML($Data, $XML);

                    echo $XML->asXML();
                    break;
            }
        }


    }