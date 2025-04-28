<?php
require_once "db.php";

// Sanitize inputs
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Insert into database
$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    // ✅ Alert on success
    echo "<script>alert('Merci pour votre message !'); window.location.href='contact.html';</script>";
} else {
    echo "<script>alert('Une erreur s\\'est produite.'); window.location.href='contact.html';</script>";
}

$stmt->close();
$conn->close();
?>
