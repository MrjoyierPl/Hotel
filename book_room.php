<?php
// connect to the database
$conn = mysqli_connect("localhost", "root", "", "hoteldb");

// get the values from the form
$GuestName = $_POST['GuestName'];
$GuestEmail = $_POST['GuestEmail'];
$CheckIn = $_POST['CheckIn'];
$CheckOut = $_POST['CheckOut'];
$RoomType = $_POST['RoomType'];

// find an available room at the selected hotel
$sql = "SELECT * FROM Rooms WHERE HotelID='$HotelID' AND Type='$RoomType' AND Occupied=0";
$result = mysqli_query($conn, $sql);

// if an available room was found, create a reservation
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$room_id = $row['RoomID'];
	$sql = "INSERT INTO Reservations (RoomID, CheckIn, CheckOut, GuestName, GuestEmail) VALUES ('$room_id', '$CheckIn', '$CheckOut', '$GuestName', '$GuestEmail')";
	mysqli_query($conn, $sql);

	// update the room's status to occupied
	$sql = "UPDATE Rooms SET Occupied=1 WHERE RoomID='$room_id'";
	mysqli_query($conn, $sql);

	echo "Room booked successfully!";
} else {
	echo "Sorry, there are no available rooms of that type at the selected hotel.";
}
?>
