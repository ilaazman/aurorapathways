<?php
include 'db.php';
$id = $_GET["id"];
$conn->query("DELETE FROM payments WHERE transaction_id='$id'");
header("Location: index.php");
?>