<?php
  namespace App\Models;

  use Core\Model;

  class Student extends Model {

      public function CreateStudent($Type, $Name) {

          $SQL = "INSERT INTO Students (Type, Name) VALUES (:Type, :Name)";
          $this->DB->Query($SQL);
          $this->DB->Bind(":Type", $Type);
          $this->DB->Bind(":Name", $Name);

          if($this->DB->Execute())
              return TRUE;

          return FALSE;
      }

      public function GetStudent($ID) {

          $SQL = "SELECT * FROM Students WHERE ID = :ID";
          $this->DB->Query($SQL);
          $this->DB->Bind(":ID", $ID);
          $this->DB->Execute();

          if($this->DB->RowCount() > 0)
              return $this->DB->Single();

          return FALSE;
      }

  }