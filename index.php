<?php
include 'db.php';

$sql = "SELECT * FROM Cars WHERE availability = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Rental System</title>
</head>
<body>
    <h2>Available Cars</h2>
    <table border="1">
        <tr><th>Car ID</th><th>Model</th><th>Action</th></tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['car_id'] ?></td>
                <td><?= $row['model'] ?></td>
                <td><a href="book.php?car_id=<?= $row['car_id'] ?>">Book Now</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
