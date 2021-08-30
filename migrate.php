<?php
    require_once 'config/autoload.php';

    use Migrations\BoardsTableMigration;
    use Migrations\GradesTableMigration;
    use Migrations\StudentsTableMigration;

    $BoardsTableMigration = new BoardsTableMigration();
    $BoardsTableMigration->run();

    $StudentsTableMigration = new StudentsTableMigration();
    $StudentsTableMigration->run();

    $GradesTableMigration = new GradesTableMigration();
    $GradesTableMigration->run();