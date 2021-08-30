<?php
  namespace App\Models;

  use Core\Model;

  class Student extends Model {

      public function CreateStudent($BoardID, $Name) {

          $SQL = "INSERT INTO Students (BoardID, Name) VALUES (:BoardID, :Name)";
          $this->DB->Query($SQL);
          $this->DB->Bind(":BoardID", $BoardID);
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

      public function GetStudentWithGrades($ID) {

          $SQL = "SELECT S.ID AS SID, S.Name, G.Grade, B.BoardName, B.Format, 
                  (SELECT 
                          IF(B.BoardName = 'CSMB', IF(COUNT(Grade) > 1, ((SUM(Grade) - MIN(Grade)) / (COUNT(Grade) - 1)), AVG(Grade)), AVG(Grade)) 
                   FROM Grades WHERE StudentID = S.ID) AS AvgGrade,
                  (SELECT MAX(Grade) FROM Grades WHERE StudentID = S.ID) AS MaxGrade
                  FROM Grades G 
                  INNER JOIN Students S ON G.StudentID = S.ID  
                  INNER JOIN Boards B ON S.BoardID = B.ID
                  WHERE S.ID = :ID";
          $this->DB->Query($SQL);
          $this->DB->Bind(":ID", $ID);
          $this->DB->Execute();

          if($this->DB->RowCount() > 0)
              return $this->DB->ResultSet();

          return FALSE;
      }

  }