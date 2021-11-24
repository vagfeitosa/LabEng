<?php

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.com"];
$cleardb_username = $cleardb_url["b79737e33a0f89"];
$cleardb_password = $cleardb_url["c2e946b2"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// DB Parametros
define("DB_HOST", "us-cdbr-east-04.cleardb.com");
define("DB_USER", "b79737e33a0f89");
define("DB_PASS", "c2e946b2");
define("DB_NAME", "heroku_e07c2aaa5eea120");

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
//define('URLROOT', '');*********************
// Nome do Site
define('SITENAME', 'APRENDI!');
