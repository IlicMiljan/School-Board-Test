<?php
    namespace App\Controllers;

    use App\Models\Board;
    use Core\Security;

    class BoardController {

        public function AddNewBoard($BoardName, $Format) {
            $BoardName = Security::Input($BoardName);
            $Format    = Security::Input($Format);

            $Board = new Board();
            $Board->CreateBoard($BoardName, $Format);


            $Data['Success'] = TRUE;

            return json_encode($Data);
        }
    }