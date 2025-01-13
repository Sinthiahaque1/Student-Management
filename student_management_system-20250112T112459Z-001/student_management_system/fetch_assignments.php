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

// Fetch teacher assignment data
$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each assignment
    while ($row = $result->fetch_assoc()) {
        echo "<div class='assignment'>";
        echo "<p><strong>Teacher ID:</strong> " . $row['teacher_id'] . "</p>";
        echo "<p><strong>Teacher Name:</strong> " . $row['teacher_name'] . "</p>";
        echo "<p><strong>Department:</strong> " . $row['teacher_department'] . "</p>";
        echo "<p><strong>Project Name:</strong> " . $row['project_name'] . "</p>";
        echo "<p><strong>Assigned Student ID:</strong> " . $row['assign_student_id'] . "</p>";
        echo "<p><strong>Date of Work:</strong> " . $row['date_of_work'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No assignments found.";
}

$conn->close();
?>
