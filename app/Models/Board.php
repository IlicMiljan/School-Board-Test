<?php
  namespace App\Models;

  use Core\Model;

  class Board extends Model {

      public function CreateBoard($BoardName, $Format) {

          $SQL = "INSERT INTO Boards (BoardName, Format) VALUES (:BoardName, :Format)";
          $this->DB->Query($SQL);
          $this->DB->Bind(":BoardName", $BoardName);
          $this->DB->Bind(":Format", $Format);

          if($this->DB->Execute())
              return TRUE;

          return FALSE;
      }

      public function GetBoard($Name) {

          $SQL = "SELECT * FROM Boards WHERE BoardName = :BoardName";
          $this->DB->Query($SQL);
          $this->DB->Bind(":BoardName", $Name);
          $this->DB->Execute();

          if($this->DB->RowCount() > 0)
              return $this->DB->Single();

          return FALSE;
      }

  }