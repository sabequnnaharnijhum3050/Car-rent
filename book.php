<?php
include 'db.php';

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // Fetch the current timestamp of the car
    $sql = "SELECT last_updated_timestamp FROM Cars WHERE car_id = $car_id AND availability = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $timestamp = $row['last_updated_timestamp'];

        // Try to book the car
        $user_id = 1; // Hardcoded for now (later, replace with session user)
        $sql = "UPDATE Cars SET availability = 0 WHERE car_id = $car_id AND last_updated_timestamp = '$timestamp'";
        
        if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
            // Insert booking record
            $conn->query("INSERT INTO Bookings (user_id, car_id) VALUES ($user_id, $car_id)");
            echo "Booking successful!";
        } else {
            echo "Sorry, this car was just booked by another user.";
        }
    } else {
        echo "Car not available.";
    }
}
?>
