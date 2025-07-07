<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM customers");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="mb-4">Customer List</h1>
      <a href="create.php" class="btn btn-primary mb-3">Add New Customer</a>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $stmt->fetch()): ?>
          <tr>
            <td><?= $row['CustomerID'] ?></td>
            <td><?= htmlspecialchars($row['CustomerName']) ?></td>
            <td><?= htmlspecialchars($row['EmailAddress']) ?></td>
            <td><?= htmlspecialchars($row['PhoneNumber']) ?></td>
            <td><?= htmlspecialchars($row['Address']) ?></td>
            <td>
              <a href="update.php?id=<?= $row['CustomerID'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="delete.php?id=<?= $row['CustomerID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
