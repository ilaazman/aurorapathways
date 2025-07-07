<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO customers (CustomerID, CustomerName, EmailAddress, PhoneNumber, Address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['CustomerID'],
        $_POST['CustomerName'],
        $_POST['EmailAddress'],
        $_POST['PhoneNumber'],
        $_POST['Address']
    ]);
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="mb-4">Add Customer</h1>
      <form method="post">
        <div class="mb-3">
          <label for="CustomerID" class="form-label">Customer ID</label>
          <input type="number" class="form-control" name="CustomerID" required>
        </div>
        <div class="mb-3">
          <label for="CustomerName" class="form-label">Customer Name</label>
          <input type="text" class="form-control" name="CustomerName" required>
        </div>
        <div class="mb-3">
          <label for="EmailAddress" class="form-label">Email Address</label>
          <input type="email" class="form-control" name="EmailAddress">
        </div>
        <div class="mb-3">
          <label for="PhoneNumber" class="form-label">Phone Number</label>
          <input type="text" class="form-control" name="PhoneNumber">
        </div>
        <div class="mb-3">
          <label for="Address" class="form-label">Address</label>
          <textarea class="form-control" name="Address"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
