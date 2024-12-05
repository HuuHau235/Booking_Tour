<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

require_once('model/function.php'); /* Utility functions */

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "HappyTrips");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check and retrieve POST data
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

if (!isset($_POST['paymentMethod']) || empty($_POST['paymentMethod'])) {
    die("Payment method is missing.");
}

$payment_method = $_POST['paymentMethod'];
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("User is not logged in.");
}

// Retrieve user's email from the User table
$query_user = "SELECT email FROM User WHERE user_id = ?";
$stmt_user = $mysqli->prepare($query_user);
$stmt_user->bind_param("i", $user_id);

if (!$stmt_user->execute()) {
    die("User query failed: " . $stmt_user->error);
}

$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $email = $result_user->fetch_assoc()['email'];
} else {
    die("Email not found for user_id: " . $user_id);
}

// Query to get booking_id and tour_id
$query_booking = "SELECT booking_id, tour_id FROM Booking WHERE user_id = ? ORDER BY booking_id DESC LIMIT 1";
$stmt_booking = $mysqli->prepare($query_booking);
$stmt_booking->bind_param("i", $user_id);

if (!$stmt_booking->execute()) {
    die("Booking query failed: " . $stmt_booking->error);
}

$result_booking = $stmt_booking->get_result();

if ($result_booking->num_rows > 0) {
    $booking = $result_booking->fetch_assoc();
    $booking_id = $booking['booking_id'];
    $tour_id = $booking['tour_id'];

    // Query to get tour details
    $query_tour = "SELECT name, description, start_date, end_date, price, duration, type FROM Tour WHERE tour_id = ?";
    $stmt_tour = $mysqli->prepare($query_tour);
    $stmt_tour->bind_param("i", $tour_id);

    if (!$stmt_tour->execute()) {
        die("Tour query failed: " . $stmt_tour->error);
    }

    $result_tour = $stmt_tour->get_result();

    if ($result_tour->num_rows > 0) {
        $tour = $result_tour->fetch_assoc();
        $tour_name = $tour['name'];
        $tour_description = $tour['description'];
        $start_date = $tour['start_date'];
        $end_date = $tour['end_date'];
        $price = $tour['price'];
        $tour_duration = $tour['duration'];
        $category = $tour['type'];

        // Query to get itinerary details
        $query_schedule = "SELECT day, description FROM itinerary WHERE tour_id = ?";
        $stmt_schedule = $mysqli->prepare($query_schedule);
        $stmt_schedule->bind_param("i", $tour_id);

        if (!$stmt_schedule->execute()) {
            die("Schedule query failed: " . $stmt_schedule->error);
        }

        $result_schedule = $stmt_schedule->get_result();

        if ($result_schedule->num_rows > 0) {
            $itinerary = "";
            while ($row = $result_schedule->fetch_assoc()) {
                $itinerary .= "<p><strong>Day " . $row['day'] . ":</strong> " . $row['description'] . "</p>";
            }

            // Insert payment details into the Payment table
            $query_payment = "INSERT INTO Payment (user_id, booking_id, payment_method) VALUES (?, ?, ?)";
            $stmt_payment = $mysqli->prepare($query_payment);

            if (!$stmt_payment) {
                die("Prepare statement failed: " . $mysqli->error);
            }

            $stmt_payment->bind_param("iis", $user_id, $booking_id, $payment_method);

            if ($stmt_payment->execute()) {
                // Prepare email content
                $subject = "Tour Booking Confirmation";
                $message = "<p>Dear Customer,</p>
                            <p>Thank you for booking a tour with HappyTrips. Here are your tour details:</p>
                            <p><strong>Tour Name:</strong> $tour_name</p>
                            <p><strong>Start Date:</strong> $start_date</p>
                            <p><strong>End Date:</strong> $end_date</p>
                            <p><strong>Category:</strong> $category</p>
                            <p><strong>Price:</strong> $price VND</p>
                            <p><strong>Duration:</strong> $tour_duration</p>
                            <p><strong>Itinerary:</strong> $itinerary</p>
                            <p>We wish you a wonderful trip!</p>
                            <p>Best regards,</p>
                            <p><strong>Happy Trips.</strong></p>
                            ";

                // Send email using the sendMail function
                sendMail($email, $subject, $message);

                // Display success message
                echo "<script>
                    alert('Booking successful! A confirmation email has been sent.');
                    window.location.href = 'index.php';
                </script>";
            } else {
                die("Insert payment failed: " . $stmt_payment->error);
            }
        } else {
            die("No itinerary found for tour_id: " . $tour_id);
        }
    } else {
        die("No tour found for tour_id: " . $tour_id);
    }
} else {
    die("No booking found for user_id: " . $user_id);
}
?>

