<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM reviews WHERE review_id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>