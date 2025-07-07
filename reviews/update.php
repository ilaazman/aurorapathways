<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM reviews WHERE review_id = ?");
$stmt->execute([$id]);
$review = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE reviews SET feedback=?, review_date=?, rating=?, booking_id=? WHERE review_id=?");
    $stmt->execute([
        $_POST['feedback'],
        $_POST['review_date'],
        $_POST['rating'],
        $_POST['booking_id'],
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Update Review</h2>
    <form method="post">
        <div class="mb-3"><label>Feedback</label><textarea name="feedback" class="form-control"><?= htmlspecialchars($review['feedback']) ?></textarea></div>
        <div class="mb-3"><label>Review Date</label><input type="date" name="review_date" value="<?= $review['review_date'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Rating</label><input type="number" name="rating" value="<?= $review['rating'] ?>" class="form-control" min="1" max="5"></div>
        <div class="mb-3"><label>Booking ID</label><input type="number" name="booking_id" value="<?= $review['booking_id'] ?>" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>