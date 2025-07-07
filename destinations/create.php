<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["destination_id"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $description = $_POST["description"];

    $conn->query("INSERT INTO destinations (destination_id, country, city, region, description)
                  VALUES ('$id', '$country', '$city', '$region', '$description')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Destination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2>Add Destination</h2>
  <form method="POST" class="row g-3">
    <div class="col-md-4">
      <label>ID</label>
      <input type="number" name="destination_id" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label>Country</label>
      <input type="text" name="country" class="form-control">
    </div>
    <div class="col-md-4">
      <label>City</label>
      <input type="text" name="city" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Region</label>
      <input type="text" name="region" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Description</label>
      <textarea name="description" class="form-control"></textarea>
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