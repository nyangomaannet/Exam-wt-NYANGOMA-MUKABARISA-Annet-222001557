<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Onboarding Resources Form</title>
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
    // Database connection parameters
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
    $resourceName = $_POST['resourceName'];
    $resourceType = $_POST['resourceType'];
    $resourceLink = $_POST['resourceLink'];
    $sessionId = $_POST['sessionId'];

    // Sanitize input
    $resourceName = mysqli_real_escape_string($conn, $resourceName);
    $resourceType = mysqli_real_escape_string($conn, $resourceType);
    $resourceLink = mysqli_real_escape_string($conn, $resourceLink);
    $sessionId = mysqli_real_escape_string($conn, $sessionId);

    // Insert data into database
    $sql = "INSERT INTO onboardingresources (resource_name, resource_type, resource_link, session_id)
            VALUES ('$resourceName', '$resourceType', '$resourceLink', '$sessionId')";

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

<form id="onboardingResourcesForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="resourceName">Resource Name:</label>
  <input type="text" id="resourceName" name="resourceName"><br>
  
  <label for="resourceType">Resource Type:</label>
  <input type="text" id="resourceType" name="resourceType"><br>
  
  <label for="resourceLink">Resource Link:</label>
  <input type="text" id="resourceLink" name="resourceLink"><br>
  
  <label for="sessionId">Session ID:</label>
  <input type="text" id="sessionId" name="sessionId"><br>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
