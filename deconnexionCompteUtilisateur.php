<?php
session_start();
unset($_SESSION['role']);
session_commit();

header('Location: index.php');

?>

