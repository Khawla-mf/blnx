<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit();
}

require_once "db.php";

if (!isset($_GET['id'])) {
  die("Aucun message sélectionné.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM contacts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
  die("Message introuvable.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Voir le Message</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
      padding: 40px;
      font-family: Arial, sans-serif;
    }

    .message-box {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 700px;
      margin: auto;
      white-space: pre-wrap;
    }

    .btn-back {
      display: block;
      margin: 30px auto 0;
      text-align: center;
    }
    .message-content {
  word-wrap: break-word; /* تتكسر الكلمات الطويلة */
  white-space: pre-wrap; /* كتحافظ على التنسيق والسطر */
}

  </style>
</head>
<body>

  <div class="message-box">
    <h4 style="color:blue;"><strong>De :</strong> <?= htmlspecialchars($row['name']) ?> (<?= htmlspecialchars($row['email']) ?>)</h4>
    <hr style="border:2px solid blue">
    <p class="message-content"><?= htmlspecialchars($row['message'])?></p>
    <div class="text-end mt-3 text-primary"><em>Envoyé le <?= $row['created_at'] ?></em></div>
  </div>

  <div class="btn-back">
    <a href="admin.php" class="btn btn-secondary mt-4">← Retour à l'administration</a>
  </div>

</body>
</html>
