<?php

    namespace Migrations;

    use Migrations\Migration;

    class BoardsTableMigration extends Migration {

        public function run() {
            $SQL = "CREATE TABLE IF NOT EXISTS `Boards` (
              ID        INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              BoardName VARCHAR(8) NOT NULL,
              Format    VARCHAR(4) NOT NULL,
              Timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";

            $this->DB->Query($SQL);
            $this->DB->Execute();

            $SQL = "SELECT * FROM Boards";
            $this->DB->Query($SQL);
            $this->DB->Execute();

            if($this->DB->RowCount() == 0) {
                $SQL = "INSERT INTO Boards (BoardName, Format) VALUES (:BoardName, :Format)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":BoardName", 'CSM');
                $this->DB->Bind(":Format", 'JSON');
                $this->DB->Execute();

                $SQL = "INSERT INTO Boards (BoardName, Format) VALUES (:BoardName, :Format)";
                $this->DB->Query($SQL);
                $this->DB->Bind(":BoardName", 'CSMB');
                $this->DB->Bind(":Format", 'XML');
                $this->DB->Execute();
            }

            echo "Table <b>Boards</b> Successfully Created! <br/>";
        }

    }