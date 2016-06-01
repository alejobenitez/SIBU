<?php
@session_start();
session_destroy();
header("Location: ../Presentacion/login.php");
?>