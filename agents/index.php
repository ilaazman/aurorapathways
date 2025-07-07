<?php
include 'db.php';
$result = $conn->query("SELECT * FROM agents");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agent List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Agent List</h2>
    <a href="create.php" class="btn btn-primary">Add Agent</a>
  </div>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Position</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['agent_id'] ?></td>
        <td><?= $row['first_name'] ?></td>
        <td><?= $row['last_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone_number'] ?></td>
        <td><?= $row['position'] ?></td>
        <td>
          <a href="update.php?id=<?= $row['agent_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $row['agent_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this agent?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>