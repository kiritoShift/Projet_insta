<?php
header('Content-type: text/html; charset=UTF-8');
$conn = new PDO("mysql:host=localhost;dbname=projet_insta", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SET NAMES 'utf8'");
