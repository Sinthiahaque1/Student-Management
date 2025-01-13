<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "student_management_system";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each student
    while ($row = $result->fetch_assoc()) {
        echo "<div class='student'>";
        echo "<p><strong>Student ID:</strong> " . $row['student_id'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['student_name'] . "</p>";
        echo "<p><strong>Project Name:</strong> " . $row['project_name'] . "</p>";
        echo "<p><strong>Date of Work:</strong> " . $row['date_of_work'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No students found.";
}

$conn->close();
?>
