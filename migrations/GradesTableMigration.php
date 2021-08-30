<?php

    namespace Migrations;

    use Migrations\Migration;

    class GradesTableMigration extends Migration {

        public function run() {
            $SQL = "CREATE TABLE IF NOT EXISTS `Grades` (
              ID        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              StudentID    INT(10) UNSIGNED,
              Grade     TINYINT(2) NOT NULL,
              Timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
              FOREIGN KEY (StudentID) REFERENCES Students(ID)    
            )";

            $this->DB->Query($SQL);
            $this->DB->Execute();

            echo "Table <b>Grades</b> Successfully Created! <br/>";
        }

    }