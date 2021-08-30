# SchoolBoardTest
Quantox Tech Assessment

# Installation

To install SchoolBoardTest Script, you need to run `composer install`.
After Composer Installation is finished, you need to change MySQL Database Login Credentials inside `config/database.php` 

# Migrations

To import MySQL Tables and Mock data you can use *MockDataAndMigrations.sql* or run */migrate.php* file. keep in mind that MockDataAndMigrations.sql is 
exported from a case-insensitive Database, so it might not work on Linux. It is recommended to use */migrate.php* to insert mock data in creating tables.

# Retrieving Student Data

To retrieve Student data you can use route `/students/{ID}`.
For students who are registered under CSM Board, you will get JSON responses like this:
```
{
   "StudentID":"1",
   "Name":"Petar",
   "Grades":[
      {
         "Grade":"7"
      },
      {
         "Grade":"9"
      }
   ],
   "AvgGrade":"8.0000",
   "FinalResult":"PASS"
}
```
For students registered under CSMB Board, you will get XML response like this:
```
<Student>
  <StudentID>2</StudentID>
  <Name>Marko</Name>
  <Grades>
    <Item-0>
      <Grade>6</Grade>
    </Item-0>
    <Item-1>
      <Grade>7</Grade>
    </Item-1>
    <Item-2>
      <Grade>5</Grade>
    </Item-2>
  </Grades>
  <AvgGrade>6.5000</AvgGrade>
  <FinalResult>FAIL</FinalResult>
</Student>
```

# Adding Students, Boards, And Grades

To add new Student you can use this route `students/add/{CSM|CSMB}/{Name}` `GET Request`  
To add new Board you can use this route `boards/add/{boardName}/{JSON|XML}` `GET Request`  
To add new Grade you can use this route `/grades/add/{StudentID}/{GradeValue}` `GET Request`  
