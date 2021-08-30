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

            echo "Table <b>Students</b> Successfully Created! <br/>";
        }

    }