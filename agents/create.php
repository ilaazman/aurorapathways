<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["agent_id"];
    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone_number"];
    $position = $_POST["position"];

    $conn->query("INSERT INTO agents (agent_id, first_name, last_name, email, phone_number, position)
                  VALUES ('$id', '$first', '$last', '$email', '$phone', '$position')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Agent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2>Add Agent</h2>
  <form method="POST" class="row g-3">
    <div class="col-md-4">
      <label>ID</label>
      <input type="number" name="agent_id" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label>First Name</label>
      <input type="text" name="first_name" class="form-control">
    </div>
    <div class="col-md-4">
      <label>Last Name</label>
      <input type="text" name="last_name" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Phone Number</label>
      <input type="text" name="phone_number" class="form-control">
    </div>
    <div class="col-md-12">
      <label>Position</label>
      <input type="text" name="position" class="form-control">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-success">Save</button>
      <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>