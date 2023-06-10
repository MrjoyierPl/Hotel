<?php

$conn = mysqli_connect("localhost", "root", "", "hoteldb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$check_in_date = $_POST['checkin'];
$check_out_date = $_POST['checkout'];
$room_type = $_POST['room-type'];
$comment = $_POST['comments'];


$sql = "INSERT INTO guests (name, email, phone, check_in_date, check_out_date, room_type, comment)
        VALUES ('$name', '$email', '$phone', '$check_in_date', '$check_out_date', '$room_type', $comment)";


if ($conn->query($sql) === TRUE) {
    echo "Rezerwacja Przebiegła pomyślnie.";
} else {
    echo "Błąd " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
