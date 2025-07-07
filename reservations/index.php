<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM reservations");
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Reservations</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add New Reservation</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Status</th><th>Pax</th><th>Date</th>
                <th>Package ID</th><th>Agent ID</th><th>Customer ID</th><th>Destination ID</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations as $row): ?>
            <tr>
                <td><?= $row['booking_id'] ?></td>
                <td><?= $row['booking_status'] ?></td>
                <td><?= $row['number_of_pax'] ?></td>
                <td><?= $row['date_of_booking'] ?></td>
                <td><?= $row['package_id'] ?></td>
                <td><?= $row['agent_id'] ?></td>
                <td><?= $row['CustomerID'] ?></td>
                <td><?= $row['destination_id'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['booking_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['booking_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>