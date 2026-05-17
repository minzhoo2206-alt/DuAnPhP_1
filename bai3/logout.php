<?php

session_start();
function dangXuat() {
    session_unset();

    session_destroy();
}

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    dangXuat();
    header('Location: login.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>