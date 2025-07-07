<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO reservations (booking_id, booking_status, number_of_pax, date_of_booking, package_id, agent_id, CustomerID, destination_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['booking_id'],
        $_POST['booking_status'],
        $_POST['number_of_pax'],
        $_POST['date_of_booking'],
        $_POST['package_id'],
        $_POST['agent_id'],
        $_POST['CustomerID'],
        $_POST['destination_id']
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2>Create Reservation</h2>
    <form method="post">
        <div class="mb-3"><label>Booking ID</label><input type="number" name="booking_id" class="form-control" required></div>
        <div class="mb-3"><label>Status</label><input type="text" name="booking_status" class="form-control"></div>
        <div class="mb-3"><label>Number of Pax</label><input type="number" name="number_of_pax" class="form-control"></div>
        <div class="mb-3"><label>Date of Booking</label><input type="date" name="date_of_booking" class="form-control"></div>
        <div class="mb-3"><label>Package ID</label><input type="number" name="package_id" class="form-control" required></div>
        <div class="mb-3"><label>Agent ID</label><input type="number" name="agent_id" class="form-control" required></div>
        <div class="mb-3"><label>Customer ID</label><input type="number" name="CustomerID" class="form-control" required></div>
        <div class="mb-3"><label>Destination ID</label><input type="number" name="destination_id" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>