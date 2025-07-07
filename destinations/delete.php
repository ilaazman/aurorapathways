<?php
include 'db.php';
$id = $_GET["id"];
$conn->query("DELETE FROM destinations WHERE destination_id='$id'");
header("Location: index.php");
?>