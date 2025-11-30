<?php
session_start();
session_unset();   // borra variables
session_destroy(); // destruye el archivo
header('Location: login.php');
exit;