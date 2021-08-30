<?php
  namespace App\Models;

  use Core\Model;

  class Grade extends Model {

      /**
       * @throws \Exception
       */
      public function CreateGrade($StudentID, $Grade) {
          $Student = new Student();
          $StudentData =  $Student->GetStudent($StudentID);

          if($StudentData != FALSE) {
              if($this->CountGrades($StudentID) < 4) {
                  $SQL = "INSERT INTO Grades (StudentID, Grade) VALUES (:StudentID, :Grade)";
                  $this->DB->Query($SQL);
                  $this->DB->Bind(":StudentID", $StudentID);
                  $this->DB->Bind(":Grade", $Grade);
              } else {
                  throw new \Exception('Grade Count Limit Exceed');
              }
          } else {
              throw new \Exception('User Not Found');
          }

          if($this->DB->Execute())
              return TRUE;

          return FALSE;
      }

      public function CountGrades($StudentID) {
          $SQL = "SELECT * FROM Grades WHERE StudentID = :StudentID";
          $this->DB->Query($SQL);
          $this->DB->Bind(":StudentID", $StudentID);
          $this->DB->Execute();

          return $this->DB->RowCount();
      }

  }