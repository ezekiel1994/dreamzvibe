<?php
session_start();
session_unset($SESSION['admin_id']);
//session_destroy();
header('Location:../login.php');
?>