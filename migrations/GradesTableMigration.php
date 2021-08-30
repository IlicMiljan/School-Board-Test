<?php

    namespace Migrations;

    use Migrations\Migration;

    class GradesTableMigration extends Migration {

        public function run() {
            $SQL = "CREATE TABLE IF NOT EXISTS `Grades` (
              ID        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              StudentID    INT(10) UNSIGNED NOT NULL,
              Grade     TINYINT(2) NOT NULL,
              Timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
              FOREIGN KEY (StudentID) REFERENCES Students(ID)    
            )";

            $this->DB->Query($SQL);
            $this->DB->Execute();

            $SQL = "SELECT * FROM Grades";
            $this->DB->Query($SQL);
            $this->DB->Execute();

            if($this->DB->RowCount() == 0) {
                $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":StudentID", 1);
                $this->DB->Bind(":Grade", 7);
                $this->DB->Execute();

                $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":StudentID", 1);
                $this->DB->Bind(":Grade", 9);
                $this->DB->Execute();

                $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":StudentID", 2);
                $this->DB->Bind(":Grade", 6);
                $this->DB->Execute();

                $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":StudentID", 2);
                $this->DB->Bind(":Grade", 7);
                $this->DB->Execute();

                $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":StudentID", 2);
                $this->DB->Bind(":Grade", 5);
                $this->DB->Execute();
            }

            echo "Table <b>Grades</b> Successfully Created! <br/>";
        }

    }