<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM reservations WHERE booking_id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>