<?php
include 'db.php';
$id = $_GET["id"];
$result = $conn->query("SELECT * FROM destinations WHERE destination_id = '$id'");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST["country"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $description = $_POST["description"];

    $conn->query("UPDATE destinations SET country='$country', city='$city', region='$region', description='$description' WHERE destination_id='$id'");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Destination</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2>Edit Destination</h2>
  <form method="POST" class="row g-3">
    <div class="col-md-4">
      <label>ID (Read-only)</label>
      <input type="number" name="destination_id" class="form-control" value="<?= $row['destination_id'] ?>" readonly>
    </div>
    <div class="col-md-4">
      <label>Country</label>
      <input type="text" name="country" class="form-control" value="<?= $row['country'] ?>">
    </div>
    <div class="col-md-4">
      <label>City</label>
      <input type="text" name="city" class="form-control" value="<?= $row['city'] ?>">
    </div>
    <div class="col-md-6">
      <label>Region</label>
      <input type="text" name="region" class="form-control" value="<?= $row['region'] ?>">
    </div>
    <div class="col-md-6">
      <label>Description</label>
      <textarea name="description" class="form-control"><?= $row['description'] ?></textarea>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>