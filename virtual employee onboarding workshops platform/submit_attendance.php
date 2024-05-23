<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance Form</title>
<style>
/* CSS styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input[type="text"],
form select,
form input[type="datetime-local"] {
    width: calc(100% - 10px);
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #0056b3;
}

form .success-message {
    color: green;
    font-weight: bold;
}

form .error-message {
    color: red;
    font-weight: bold;
}
</style>
</head>
<body>
<form id="attendanceForm" method="post" action="submit_attendance.php">
  <label for="sessionId">Session ID:</label>
  <input type="text" id="sessionId" name="sessionId"><br>
  
  <label for="employeeId">Employee ID:</label>
  <input type="text" id="employeeId" name="employeeId"><br>
  
  <label for="attendanceStatus">Attendance Status:</label>
  <select id="attendanceStatus" name="attendanceStatus">
    <option value="Present">Present</option>
    <option value="Absent">Absent</option>
  </select><br>
  
  <label for="attendanceDate">Attendance Date:</label>
  <input type="datetime-local" id="attendanceDate" name="attendanceDate"><br>
  
  <button type="submit">Submit</button>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "virtual_employee_onboarding";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $sessionId = $_POST['sessionId'];
  $employeeId = $_POST['employeeId'];
  $attendanceStatus = $_POST['attendanceStatus'];
  $attendanceDate = $_POST['attendanceDate'];

  // Prepare and bind SQL statement
  $stmt = $conn->prepare("INSERT INTO attendance (session_id, employee_id, attendance_status, attendance_date) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iiss", $sessionId, $employeeId, $attendanceStatus, $attendanceDate);

  // Execute the statement
  if ($stmt->execute() === TRUE) {
    echo "<p class='success-message'>New record created successfully</p>";
  } else {
    echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
  }

  // Close statement
  $stmt->close();
}

// Close connection
$conn->close();
?>
</body>
</html>
