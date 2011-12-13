<?php
$conn = new PDO("mysql:host=localhost;dbname=projet_insta", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SET NAMES 'utf8'");
