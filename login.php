<?php
session_start();

$admin_username = "admin";
$admin_password = "101010";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Admin</title>
  <style>
    body { font-family: Arial; background-color:rgb(5, 9, 19); padding: 40px; }
    .login-box {
      max-width: 400px;
      margin: auto;
      background-color:#050913;
      padding: 50px;
      box-shadow: 0px 10px 20px black ; 
      border-radius: 50% 8px;
      margin-top: 100px;

    }
    input { width: 92%;
       padding: 10px;
        margin: 10px 0;
        background-color: transparent;
        color: white;
        border: 1px solid #d1d5db;
        background: transparent;
    
    }
    input::placeholder{
      color:#d1d5db ;
    }
    input:hover{
      border: 1px solid #004c99;
    }
    button { background: #004c99; color: white;
      margin-top: 20px;
      border-radius: 20px;
      padding: 10px 30px; border: none; cursor: pointer; 
       text-align: center;
       margin-left: 130px;
      
       
  }
  button:hover{
    background:rgb(0, 30, 60); color: white;
  }
    .error { color: red; }
  </style>
</head>
<body>
  <div class="login-box">
    <h2 style="text-align:center;color:#004c99">Connexion Admin</h2>
    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>
</html>