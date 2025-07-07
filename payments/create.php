<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["transaction_id"];
    $date = $_POST["payment_date"];
    $amount = $_POST["amount_paid"];
    $method = $_POST["payment_method"];
    $booking_id = $_POST["booking_id"];

    $conn->query("INSERT INTO payments (transaction_id, payment_date, amount_paid, payment_method, booking_id)
                  VALUES ('$id', '$date', '$amount', '$method', '$booking_id')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h2>Add Payment</h2>
  <form method="POST" class="row g-3">
    <div class="col-md-4">
      <label>Transaction ID</label>
      <input type="number" name="transaction_id" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label>Payment Date</label>
      <input type="date" name="payment_date" class="form-control">
    </div>
    <div class="col-md-4">
      <label>Amount Paid</label>
      <input type="number" step="0.01" name="amount_paid" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Payment Method</label>
      <input type="text" name="payment_method" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Booking ID</label>
      <input type="number" name="booking_id" class="form-control">
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