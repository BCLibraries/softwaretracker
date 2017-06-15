<?php
if($_SESSION["role"]!="admin") {
    header('http/1.1 401 Unauthorized');
    header('Location: /softwaretracker/');
    exit("Access Restricted");
}
