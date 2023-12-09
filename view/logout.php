<?php
session_start();
session_unset();
session_destroy();
echo '<script>window.location.href = "../view/pagel_login_create.php";</script>';

exit();
?>
