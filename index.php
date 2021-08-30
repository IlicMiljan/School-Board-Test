<?php
    require_once 'config/autoload.php';

    use Core\Router;
    use Core\Template;

    Router::Add('/',function(){

    });

    Router::Run();