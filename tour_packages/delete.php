<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM tour_packages WHERE package_id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>