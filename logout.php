<?php
session_start();

// Zakończ sesję
session_destroy();

// Przekieruj na stronę logowania lub inną stronę
header('Location: login.php');
exit();
?>
