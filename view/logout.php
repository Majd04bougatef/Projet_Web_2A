<?php
session_start();
session_unset();
session_destroy();
header("Location: pagel_login_create.php");
exit();
?>
