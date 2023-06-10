
<html>
<head>
	<title>Hotel Booking Form</title>
</head>
<body>
	<h1>Hotel Booking Form</h1>
	<form method="POST" action="book_room.php">
		<label for="hotel_id">Hotel:</label>
		<select id="hotel_id" name="hotel_id">
			<?php
			// connect to the database
			$conn = mysqli_connect("localhost", "root", "", "HotelDB");

			// select all hotels from the database
			$sql = "SELECT * FROM Hotels";
			$result = mysqli_query($conn, $sql);

			// loop through the result and add each hotel as an option in the select dropdown
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option value="'.$row['HotelID'].'">'.$row['Name'].'</option>';
			}
			?>
		</select>
		<br>
		<label for="room_type">Room Type:</label>
		<select id="room_type" name="room_type">
			<option value="Single">Single</option>
			<option value="Double">Double</option>
			<option value="Triple">Triple</option>
			<option value="Quad">Quad</option>
		</select>
		<br>
		<label for="check_in_date">Check-in Date:</label>
		<input type="date" id="check_in_date" name="check_in_date">
		<br>
		<label for="check_out_date">Check-out Date:</label>
		<input type="date" id="check_out_date" name="check_out_date">
		<br>
		<label for="guest_name">Guest Name:</label>
		<input type="text" id="guest_name" name="guest_name">
		<br>
		<label for="guest_email">Guest Email:</label>
		<input type="email" id="guest_email" name="guest_email">
		<br>
		<input type="submit" value="Book Room">
	</form>
</body>
</html>
