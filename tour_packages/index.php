<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM tour_packages");
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tour Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Tour Packages</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add New Package</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Price</th><th>Duration</th><th>Start Date</th><th>End Date</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($packages as $row): ?>
            <tr>
                <td><?= $row['package_id'] ?></td>
                <td><?= htmlspecialchars($row['package_name']) ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['duration_days'] ?> days</td>
                <td><?= $row['start_date'] ?></td>
                <td><?= $row['end_date'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['package_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['package_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>