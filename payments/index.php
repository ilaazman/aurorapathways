<?php
include 'db.php';
$result = $conn->query("SELECT * FROM payments");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Payment Records</h2>
    <a href="create.php" class="btn btn-primary">Add Payment</a>
  </div>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Transaction ID</th><th>Date</th><th>Amount</th><th>Method</th><th>Booking ID</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['transaction_id'] ?></td>
        <td><?= $row['payment_date'] ?></td>
        <td><?= $row['amount_paid'] ?></td>
        <td><?= $row['payment_method'] ?></td>
        <td><?= $row['booking_id'] ?></td>
        <td>
          <a href="update.php?id=<?= $row['transaction_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete.php?id=<?= $row['transaction_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>