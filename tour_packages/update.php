<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tour_packages WHERE package_id = ?");
$stmt->execute([$id]);
$package = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE tour_packages SET package_name=?, price=?, duration_days=?, start_date=?, end_date=? WHERE package_id=?");
    $stmt->execute([
        $_POST['package_name'],
        $_POST['price'],
        $_POST['duration_days'],
        $_POST['start_date'],
        $_POST['end_date'],
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Update Tour Package</h2>
    <form method="post">
        <div class="mb-3"><label>Package Name</label><input type="text" name="package_name" value="<?= htmlspecialchars($package['package_name']) ?>" class="form-control"></div>
        <div class="mb-3"><label>Price</label><input type="number" name="price" step="0.01" value="<?= $package['price'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Duration (days)</label><input type="number" name="duration_days" value="<?= $package['duration_days'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Start Date</label><input type="date" name="start_date" value="<?= $package['start_date'] ?>" class="form-control"></div>
        <div class="mb-3"><label>End Date</label><input type="date" name="end_date" value="<?= $package['end_date'] ?>" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>