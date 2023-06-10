<?php



$conn = mysqli_connect("localhost", "root", "", "hoteldb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

       
        if (password_verify($password, $hashedPassword)) {
         
            echo "Zalogowano Pomyślnie";
          
        } else {
          
            echo "Nieprawidłowe Hasło.";
        }
    } else {
     
        echo "Nieprawidłowa Nazwa Użytkowika.";
    }
}


$conn->close();
?>
