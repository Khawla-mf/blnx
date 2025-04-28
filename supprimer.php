<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit();
}

require_once "db.php";

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header("Location: admin.php");
  exit();
} else {
  echo "ID non valide.";
}

