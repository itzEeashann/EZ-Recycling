<?php
session_start();
if(!isset ($_SESSION['mySession'])){
	
header("Location: admin_login.php");
session_write_close();
exit();
}
?>