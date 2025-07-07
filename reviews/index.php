<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM reviews");
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Reviews</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add New Review</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Feedback</th><th>Date</th><th>Rating</th><th>Booking ID</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reviews as $row): ?>
            <tr>
                <td><?= $row['review_id'] ?></td>
                <td><?= htmlspecialchars($row['feedback']) ?></td>
                <td><?= $row['review_date'] ?></td>
                <td><?= $row['rating'] ?></td>
                <td><?= $row['booking_id'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['review_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['review_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>