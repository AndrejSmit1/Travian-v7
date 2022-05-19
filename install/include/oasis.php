<?php
        include ("../../config/connection.php");
        include ("../../config/config.php");
        include ("../../GameEngine/Database.php");
        //include ("../../GameEngine/Admin/database.php");

        //mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
        //mysql_select_db(SQL_DB);

        $database->populateOasisdata();  
        $database->populateOasis();
		$database->populateOasisUnitsLow();

header("Location: ../index.php?s=6");
?>