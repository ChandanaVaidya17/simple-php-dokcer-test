<?php
$servername = "db"; // Docker service name
$username = "user";
$password = "password";
$database = "studentdb";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the last USN
$result = $conn->query("SELECT usn FROM students ORDER BY id DESC LIMIT 1");
$lastUSN = $result->fetch_assoc();
$nextUSN = "USN0001"; // Default if no records exist

if ($lastUSN) {
    $num = (int)substr($lastUSN['usn'], 3); // Extract number part
    $nextUSN = "USN" . str_pad($num + 1, 4, "0", STR_PAD_LEFT); // Increment USN
}

// Insert student data
$name = $_POST['name'];
$semester = $_POST['semester'];
$sql = "INSERT INTO students (usn, name, semester) VALUES ('$nextUSN', '$name', '$semester')";
$conn->query($sql);

echo "Student saved successfully! USN: $nextUSN";
$conn->close();
?>
