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

  }