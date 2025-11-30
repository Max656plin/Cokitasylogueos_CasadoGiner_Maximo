<?php
session_start(); // 1. siempre primero
session_destroy(); // borra TODA la sesión (PDF)
header('Location: login.php'); // de vuelta al login
exit;