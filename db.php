<?php
$host = "sql7.freesqldatabase.com";
$user = "sql7776224";
$password = "xtqjJRxi7";
$db = "sql7776224";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
  die("Erreur de connexion : " . $conn->connect_error);
}
