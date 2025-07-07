<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM customers WHERE CustomerID = ?");
$stmt->execute([$id]);
$customer = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE customers SET CustomerName = ?, EmailAddress = ?, PhoneNumber = ?, Address = ? WHERE CustomerID = ?");
    $stmt->execute([
        $_POST['CustomerName'],
        $_POST['EmailAddress'],
        $_POST['PhoneNumber'],
        $_POST['Address'],
        $id
    ]);
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="mb-4">Edit Customer</h1>
      <form method="post">
        <div class="mb-3">
          <label for="CustomerName" class="form-label">Customer Name</label>
          <input type="text" class="form-control" name="CustomerName" value="<?= htmlspecialchars($customer['CustomerName']) ?>" required>
        </div>
        <div class="mb-3">
          <label for="EmailAddress" class="form-label">Email Address</label>
          <input type="email" class="form-control" name="EmailAddress" value="<?= htmlspecialchars($customer['EmailAddress']) ?>">
        </div>
        <div class="mb-3">
          <label for="PhoneNumber" class="form-label">Phone Number</label>
          <input type="text" class="form-control" name="PhoneNumber" value="<?= htmlspecialchars($customer['PhoneNumber']) ?>">
        </div>
        <div class="mb-3">
          <label for="Address" class="form-label">Address</label>
          <textarea class="form-control" name="Address"><?= htmlspecialchars($customer['Address']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
