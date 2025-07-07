<?php
include 'db.php';
$result = $conn->query("SELECT * FROM destinations");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Destination List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Destination List</h2>
    <a href="create.php" class="btn btn-primary">Add Destination</a>
  </div>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>Country</th><th>City</th><th>Region</th><th>Description</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['destination_id'] ?></td>
        <td><?= $row['country'] ?></td>
        <td><?= $row['city'] ?></td>
        <td><?= $row['region'] ?></td>
        <td><?= $row['description'] ?></td>
        <td>
          <a href="update.php?id=<?= $row['destination_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $row['destination_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this destination?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>