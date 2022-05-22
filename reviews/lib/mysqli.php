<?php

require __DIR__ . '/../../vendor/autoload.php';

function dbConnect()
{
  $doenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../../');
  $doenv->load();

  $doHost = $_ENV['DB_HOST'];
  $doUsername = $_ENV['DB_USERNAME'];
  $dbPassword = $_ENV['DB_PASSWORD'];
  $doDatabase = $_ENV['DB_DATABASE'];

  $link = mysqli_connect($doHost, $doUsername, $dbPassword, $doDatabase);
    if (!$link) {
        echo 'Error: データベースに接続できません' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $link;
}
