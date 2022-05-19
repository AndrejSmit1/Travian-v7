<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL & E_NOTICE);

include_once(dirname(__FILE__).'/../config/connection.php');
include_once(dirname(__FILE__).'/../config/config.php');
include("include/database.php");

$database->query('SET foreign_key_checks = 0');

if (DB_TYPE) {
    if ($result = $database->query("SHOW TABLES")) {
        while($row = $result->fetch_array(MYSQLI_NUM)) {
            $database->query('DROP TABLE IF EXISTS '.$row[0]);
        }
    }
    $database->query('SET foreign_key_checks = 1');
    $database->connection->close();
} else {
   if ($result = $database->query("SHOW TABLES")) {
        while($row = mysql_fetch_array($result, MYSQL_NUM)) {
            $database->query('DROP TABLE IF EXISTS '.$row[0]);
        }
    }
    $database->query('SET foreign_key_checks = 1');
    mysql_close($database);
}

unlink(dirname(__FILE__).'/../config/connection.php');
unlink(dirname(__FILE__).'/../config/config.php');
unlink(dirname(__FILE__).'/../config/installed');
echo "Uninstall success!";
?>