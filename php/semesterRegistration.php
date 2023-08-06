<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $phoneNo = $_POST["phoneNo"];
    $branch = $_POST["branch"];
    $currentYear = $_POST["currentYear"];
    $gender = $_POST["gender"];
    $feePaid = $_POST["feePaid"];

    // Database connection details
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "your_username";
$password = "your_password";
$dbname = "semester_registration_db"; // Use the correct database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO semester_registration (phoneNo, branch, currentYear, gender, feePaid)
            VALUES ('$phoneNo', '$branch', '$currentYear', '$gender', '$feePaid')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
