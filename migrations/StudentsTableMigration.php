<?php

    namespace Migrations;

    use Migrations\Migration;

    class StudentsTableMigration extends Migration {

        public function run() {
            $SQL = "CREATE TABLE IF NOT EXISTS `Students` (
              ID        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              BoardID   INT(10) UNSIGNED NOT NULL,
              Name      VARCHAR(255) NOT NULL,
              Timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
              FOREIGN KEY (BoardID) REFERENCES Boards(ID)
            )";

            $this->DB->Query($SQL);
            $this->DB->Execute();

            $SQL = "SELECT * FROM Students";
            $this->DB->Query($SQL);
            $this->DB->Execute();

            if($this->DB->RowCount() == 0) {
                $SQL = "INSERT INTO Students (BoardID, Name) VALUES (:BoardID, :Name)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":BoardID", 1);
                $this->DB->Bind(":Name", 'Petar');
                $this->DB->Execute();

                $SQL = "INSERT INTO Students (BoardID, Name) VALUES (:BoardID, :Name)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":BoardID", 2);
                $this->DB->Bind(":Name", 'Marko');
                $this->DB->Execute();
            }

            echo "Table <b>Students</b> Successfully Created! <br/>";
        }

    }