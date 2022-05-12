<?php
include("../config/connection.php");
include("../config/config.php");
$time = time();
$installedFlagFile = file_put_contents("../config/installed", "".$time.PHP_EOL , FILE_APPEND | LOCK_EX);
?>
<div id="content" class="login">
<div class="headline"><h2>TravianT4 Installation Script</h2></div><br>
<br>
&nbsp;&nbsp;The installation was completed
    <h4>&nbsp;&nbsp;For security installation folder name is automatically changed.<br/><br/>
    &nbsp;&nbsp;The file config.php was replaced.</h4>
  
<br /><br />

<div align="center"><font size="4"><a href="<?php echo HOMEPAGE; ?>"> My TravianT4 homepage</font></a>
</div></div>
