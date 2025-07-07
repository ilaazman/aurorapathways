<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM reservations WHERE booking_id = ?");
$stmt->execute([$id]);
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE reservations SET booking_status=?, number_of_pax=?, date_of_booking=?, package_id=?, agent_id=?, CustomerID=?, destination_id=? WHERE booking_id=?");
    $stmt->execute([
        $_POST['booking_status'],
        $_POST['number_of_pax'],
        $_POST['date_of_booking'],
        $_POST['package_id'],
        $_POST['agent_id'],
        $_POST['CustomerID'],
        $_POST['destination_id'],
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Update Reservation</h2>
    <form method="post">
        <div class="mb-3"><label>Status</label><input type="text" name="booking_status" value="<?= $reservation['booking_status'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Number of Pax</label><input type="number" name="number_of_pax" value="<?= $reservation['number_of_pax'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Date of Booking</label><input type="date" name="date_of_booking" value="<?= $reservation['date_of_booking'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Package ID</label><input type="number" name="package_id" value="<?= $reservation['package_id'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Agent ID</label><input type="number" name="agent_id" value="<?= $reservation['agent_id'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Customer ID</label><input type="number" name="CustomerID" value="<?= $reservation['CustomerID'] ?>" class="form-control"></div>
        <div class="mb-3"><label>Destination ID</label><input type="number" name="destination_id" value="<?= $reservation['destination_id'] ?>" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>