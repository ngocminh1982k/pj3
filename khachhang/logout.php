<?php
session_start();
unset($_SESSION["useName"]);
header("location:trangchu.php");
?>