<?php
session_start();

if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
    $restricted_access = true;
    header("Location: ../index.php?restricted=$restricted_access");
    exit;
}

$loggedIn = true;
?>