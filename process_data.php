<?php
// Database connection
$host = "localhost";
$username = "root";
$password = ""; // Replace with your database password
$database = "student_management_system";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'addStudent') {
        // Add a new student
        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $projectName = $_POST['projectName'];
        $dateOfWork = $_POST['dateOfWork'];

        $stmt = $conn->prepare("INSERT INTO students (student_id, student_name, project_name, date_of_work) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $studentId, $studentName, $projectName, $dateOfWork);

        if ($stmt->execute()) {
            echo "Student added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif ($action === 'assignTeacher') {
        // Assign project to a teacher
        $teacherId = $_POST['teacherId'];
        $teacherName = $_POST['teacherName'];
        $teacherDept = $_POST['teacherDept'];
        $teacherProjectName = $_POST['teacherProjectName'];
        $assignStudentId = $_POST['assignStudentId'];
        $teacherDateOfWork = $_POST['teacherDateOfWork'];

        $stmt = $conn->prepare("INSERT INTO teachers (teacher_id, teacher_name, teacher_department, project_name, assigned_student_id, date_of_work) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $teacherId, $teacherName, $teacherDept, $teacherProjectName, $assignStudentId, $teacherDateOfWork);

        if ($stmt->execute()) {
            echo "Project assigned to teacher successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
