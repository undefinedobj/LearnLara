<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23 0023
 * Time: 17:45
 */

require_once '../vendor/autoload.php';
// bootstrap.php
use Doctrine\ORM\Query\ResultSetMappingBuilder;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\Query\ResultSetMapping;

$paths = array("/path/to/entity-files");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'menu',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$result = $entityManager = EntityManager::create($dbParams, $config);

dd($result);