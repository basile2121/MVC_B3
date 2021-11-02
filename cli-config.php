<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . "/public/index.php";

return ConsoleRunner::createHelperSet($entityManager);