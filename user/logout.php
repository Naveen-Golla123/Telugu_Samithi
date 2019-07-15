<?php
session_start();
unset($_SESSION["roll"]);
session_destroy();
header("location:../index.php");
?>