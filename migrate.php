<?php
    require_once 'config/autoload.php';

    use Migrations\GradesTableMigration;
    use Migrations\StudentsTableMigration;

    $StudentsTableMigration = new StudentsTableMigration();
    $StudentsTableMigration->run();

    $GradesTableMigration = new GradesTableMigration();
    $GradesTableMigration->run();