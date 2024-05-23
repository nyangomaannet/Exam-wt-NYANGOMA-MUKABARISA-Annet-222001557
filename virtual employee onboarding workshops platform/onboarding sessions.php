<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Onboarding Sessions Form</title>
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
form input[type="datetime-local"],
form textarea {
    width: calc(100% - 20px);
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
    text-align: center;
    margin-bottom: 15px;
}

form .error-message {
    color: red;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;
}
</style>
</head>
<body>
<?php
$message = ""; // Initialize message variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $database = "virtual_employee_onboarding";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $sessionName = $_POST['sessionName'];
    $sessionDescription = $_POST['sessionDescription'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $organizerId = $_POST['organizerId'];

    // Sanitize input
    $sessionName = mysqli_real_escape_string($conn, $sessionName);
    $sessionDescription = mysqli_real_escape_string($conn, $sessionDescription);

    // Insert data into database
    $sql = "INSERT INTO onboardingsessions (session_name, session_description, start_date, end_date, organizer_id) 
            VALUES ('$sessionName', '$sessionDescription', '$startDate', '$endDate', '$organizerId')";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
<?php if (!empty($message)): ?>
    <div class="<?php echo strpos($message, 'successfully') !== false ? 'success-message' : 'error-message'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<form id="onboardingSessionsForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="sessionName">Session Name:</label>
  <input type="text" id="sessionName" name="sessionName"><br>
  
  <label for="sessionDescription">Session Description:</label><br>
  <textarea id="sessionDescription" name="sessionDescription" rows="4" cols="50"></textarea><br>
  
  <label for="startDate">Start Date:</label>
  <input type="datetime-local" id="startDate" name="startDate"><br>
  
  <label for="endDate">End Date:</label>
  <input type="datetime-local" id="endDate" name="endDate"><br>
  
  <label for="organizerId">Organizer ID:</label>
  <input type="text" id="organizerId" name="organizerId"><br>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
