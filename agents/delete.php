<?php
include 'db.php';
$id = $_GET["id"];
$conn->query("DELETE FROM agents WHERE agent_id='$id'");
header("Location: index.php");
?>