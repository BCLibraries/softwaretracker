<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('http/1.1 401 Unauthorized');
    header('Location: /softwaretracker/');
    exit("Access Restricted");
        }
?>