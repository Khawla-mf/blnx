<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit();
}

require_once "db.php";

$result = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin - Messages</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      padding: 30px;
      font-family: Arial, sans-serif;
    }

    h2 {
      color: #004c99;
      margin-bottom: 30px;
    }

    .top-btns {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

  


    @media (max-width: 768px) {
      .top-btns {
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Boîte de Réception - BleuNox</h2>

  <div class="top-btns">
    <a href="index.html" class="btn btn-danger">
      <i class="bi bi-box-arrow-right"></i> Se déconnecter
    </a>
    <a href="index.html" class="btn btn-primary">
      <i class="bi bi-house-door"></i> Routeur
    </a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Message</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
  <?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td>
        <?= substr(htmlspecialchars($row['message']), 0, 50) ?>...
      </td>
      <td><?= $row['created_at'] ?></td>
      <td>
        <a href="voir_message.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info me-1">
          <i class="bi bi-eye text-white"></i>
        </a>
        <a href="supprimer.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Tu veux vraiment supprimer ce message ?');">
          <i class="bi bi-trash"></i> 
        </a>
      </td>
    </tr>
    
  <?php endwhile; ?>
</tbody>

    </table>
  </div>
</div>

</body>
</html>
