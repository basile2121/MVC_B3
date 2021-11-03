<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Connection{
    function getEntityManager(): EntityManager
    {
        $paths = [__DIR__ . "/../src/Entity"];
        $isDevMode = ($_ENV['APP_ENV'] === 'dev');

        // the connection configuration
        $dbParams = array(
            'driver'   => $_ENV['DB_DRIVER'],
            'host'     => $_ENV['DB_HOST'],
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname'   => $_ENV['DB_NAME'],
        );
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null , null , false);
        return EntityManager::create($dbParams, $config);
    }
}