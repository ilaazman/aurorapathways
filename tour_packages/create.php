<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO tour_packages (package_id, package_name, price, duration_days, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['package_id'],
        $_POST['package_name'],
        $_POST['price'],
        $_POST['duration_days'],
        $_POST['start_date'],
        $_POST['end_date']
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Create Tour Package</h2>
    <form method="post">
        <div class="mb-3"><label>Package ID</label><input type="number" name="package_id" class="form-control" required></div>
        <div class="mb-3"><label>Package Name</label><input type="text" name="package_name" class="form-control" required></div>
        <div class="mb-3"><label>Price</label><input type="number" step="0.01" name="price" class="form-control"></div>
        <div class="mb-3"><label>Duration (days)</label><input type="number" name="duration_days" class="form-control"></div>
        <div class="mb-3"><label>Start Date</label><input type="date" name="start_date" class="form-control"></div>
        <div class="mb-3"><label>End Date</label><input type="date" name="end_date" class="form-control"></div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>