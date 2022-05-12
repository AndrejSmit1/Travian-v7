<?php
	$time = time();
        $installedFlagFile = file_put_contents("../config/installed", "".$time.PHP_EOL , FILE_APPEND | LOCK_EX);
?>