<?php

require_once __DIR__ . "/../vendor/autoload.php";

if (
    php_sapi_name() !== 'cli' &&
    preg_match('/\.(?:png|jpg|jpeg|gif|ico)$/', $_SERVER['REQUEST_URI'])
  ) {
      return false;
  }

use App\Entity\User;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [ __DIR__  . "/../src/Entity"];
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'basile',
    'password' => 'Happy21bb!',
    'dbname'   => 'php_mvc',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null , null , false);
$entityManager = EntityManager::create($dbParams, $config); 

$user = new User();
$user->setName("Regnault")
     ->setUsername("Basile")
     ->setPassword("BABA")
     ->setFirstName("Basile2")
     ->setEmail("basile.regnaily");

$entityManager->persist($user);
$entityManager->flush();

echo "Coucou";