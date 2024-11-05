<?php
session_start();
session_unset();
session_destroy();

// Clear the username cookie
setcookie("username", "", time() - 3600, "/");

header("Location: index.php");
exit();
?>
