<?php
chdir(dirname(__DIR__));

require  __DIR__.'/core/bootstrap.php';

$appConfig = require  __DIR__.'/config/app.config.php';


try {
    
    $router  = new Router();
    $router->loadRoutes($appConfig['routes']);

    $controller = $router->dispatch();
    $controller->display();
   
} catch (\PDOException $e) {
    echo $e->getMessage();
} catch (\Exception $e){
    echo $e->getMessage();
}
 
