<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO reviews (review_id, feedback, review_date, rating, booking_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['review_id'],
        $_POST['feedback'],
        $_POST['review_date'],
        $_POST['rating'],
        $_POST['booking_id']
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Create Review</h2>
    <form method="post">
        <div class="mb-3"><label>Review ID</label><input type="number" name="review_id" class="form-control" required></div>
        <div class="mb-3"><label>Feedback</label><textarea name="feedback" class="form-control" required></textarea></div>
        <div class="mb-3"><label>Review Date</label><input type="date" name="review_date" class="form-control"></div>
        <div class="mb-3"><label>Rating</label><input type="number" name="rating" min="1" max="5" class="form-control"></div>
        <div class="mb-3"><label>Booking ID</label><input type="number" name="booking_id" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>