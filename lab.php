<?php
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Validate the form data (you can add more validation if needed)
if (empty($fullname) || empty($email) || empty($gender)) {
    die("Error: All fields are required");
}

// Prepare and execute the SQL statement to insert data into the "students" table
$sql = "INSERT INTO students (full_name, email, gender) VALUES ('$fullname', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
