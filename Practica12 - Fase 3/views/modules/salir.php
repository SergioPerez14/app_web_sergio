<?php
//Se destruye la sesion y regresa al index
session_start();
session_destroy();

header("location:index.php");

?>


