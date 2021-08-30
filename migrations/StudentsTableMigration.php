<?php

    namespace Migrations;

    use Migrations\Migration;

    class StudentsTableMigration extends Migration {

        public function run() {
            $SQL = "CREATE TABLE IF NOT EXISTS `Students` (
              ID        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              Type      VARCHAR(8) NOT NULL,
              Name      VARCHAR(255) NOT NULL,
              Timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";

            $this->DB->Query($SQL);
            $this->DB->Execute();

            echo "Table <b>Students</b> Successfully Created! <br/>";
        }

    }