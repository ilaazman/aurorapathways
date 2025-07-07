<?php
include 'db.php';
$id = $_GET["id"];
$result = $conn->query("SELECT * FROM payments WHERE transaction_id = '$id'");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["payment_date"];
    $amount = $_POST["amount_paid"];
    $method = $_POST["payment_method"];
    $booking_id = $_POST["booking_id"];

    $conn->query("UPDATE payments SET payment_date='$date', amount_paid='$amount', payment_method='$method', booking_id='$booking_id' WHERE transaction_id='$id'");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2>Edit Payment</h2>
  <form method="POST" class="row g-3">
    <div class="col-md-4">
      <label>Transaction ID (Read-only)</label>
      <input type="number" name="transaction_id" class="form-control" value="<?= $row['transaction_id'] ?>" readonly>
    </div>
    <div class="col-md-4">
      <label>Payment Date</label>
      <input type="date" name="payment_date" class="form-control" value="<?= $row['payment_date'] ?>">
    </div>
    <div class="col-md-4">
      <label>Amount Paid</label>
      <input type="number" step="0.01" name="amount_paid" class="form-control" value="<?= $row['amount_paid'] ?>">
    </div>
    <div class="col-md-6">
      <label>Payment Method</label>
      <input type="text" name="payment_method" class="form-control" value="<?= $row['payment_method'] ?>">
    </div>
    <div class="col-md-6">
      <label>Booking ID</label>
      <input type="number" name="booking_id" class="form-control" value="<?= $row['booking_id'] ?>">
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