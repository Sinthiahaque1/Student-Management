<?php
// Database connection
$host = "localhost";
$username = "root";
$password = ""; // Replace with your password if necessary
$database = "student_management_system";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student and Teacher Management</title>
    <style>
    /* Reset default margins and paddings */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body and general layout */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        padding: 20px;
    }

    h1, h2 {
        color: #333;
    }

    header {
        background-color: #2d3748;
        color: #fff;
        text-align: center;
        padding: 20px;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 2.5rem;
        letter-spacing: 1px;
        font-weight: 700;
        color: white;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #28a745;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Container for better layout control */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Home button styles */
    .home-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .home-button:hover {
        background-color: #218838;
    }

    /* Styling for the headings */
    h2 {
        margin-bottom: 15px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        .home-button {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        table {
            font-size: 0.9rem;
        }

        th, td {
            padding: 8px;
        }

        .container {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 1.5rem;
        }

        .home-button {
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        table {
            font-size: 0.8rem;
        }

        th, td {
            padding: 6px;
        }

        .container {
            padding: 10px;
        }

        header {
            padding: 15px;
        }
    }
</style>
</head>
<body>

    <!-- Home button link -->
    <a href="index.php" class="home-button">Home</a>

    <header>
        <h1>Student and Teacher Management</h1>
    </header>

    <div class="container">
        <!-- Students List Section -->
        <h2>Students List</h2>
        <table>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Project Name</th>
                <th>Date of Work</th>
            </tr>
            <?php
            // Fetch students from the database
            $sql = "SELECT student_name, student_id, project_name, date_of_work FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display student data
                    echo "<tr>
                            <td>{$row['student_name']}</td>
                            <td>{$row['student_id']}</td>
                            <td>{$row['project_name']}</td>
                            <td>{$row['date_of_work']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found</td></tr>";
            }
            ?>
        </table>

        <!-- Teacher Assignments Section -->
        <h2>Teacher Assignments</h2>
        <table>
            <tr>
                <th>Teacher ID</th>
                <th>Teacher Name</th>
                <th>Teacher Department</th>
                <th>Project Name</th>
                <th>Assigned Student ID</th>
                <th>Date of Work</th>
            </tr>
            <?php
            // Fetch teacher assignments from the database
            $sql = "SELECT 
                        teacher_id, 
                        teacher_name, 
                        teacher_department, 
                        project_name, 
                        assigned_student_id, 
                        date_of_work 
                    FROM teachers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display teacher assignment data
                    echo "<tr>
                            <td>{$row['teacher_id']}</td>
                            <td>{$row['teacher_name']}</td>
                            <td>{$row['teacher_department']}</td>
                            <td>{$row['project_name']}</td>
                            <td>{$row['assigned_student_id']}</td>
                            <td>{$row['date_of_work']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No assignments found</td></tr>";
            }
            ?>
        </table>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
