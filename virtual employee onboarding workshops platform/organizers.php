<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Organizers Form</title>
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
form input[type="email"] {
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

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO organizers (first_name, last_name, email, phone, organization) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $organization);

    // Set parameters and execute
    $first_name = $_POST['organizerFirstName'];
    $last_name = $_POST['organizerLastName'];
    $email = $_POST['organizerEmail'];
    $phone = $_POST['organizerPhone'];
    $organization = $_POST['organization'];
    if ($stmt->execute()) {
        $message = "Form submitted successfully!";
    } else {
        $message = "Error submitting form: " . $conn->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
?>
<?php if (!empty($message)): ?>
    <div class="<?php echo strpos($message, 'successfully') !== false ? 'success-message' : 'error-message'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<form id="organizersForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="organizerFirstName">First Name:</label>
  <input type="text" id="organizerFirstName" name="organizerFirstName"><br>
  
  <label for="organizerLastName">Last Name:</label>
  <input type="text" id="organizerLastName" name="organizerLastName"><br>
  
  <label for="organizerEmail">Email:</label>
  <input type="email" id="organizerEmail" name="organizerEmail"><br>
  
  <label for="organizerPhone">Phone:</label>
  <input type="text" id="organizerPhone" name="organizerPhone"><br>
  
  <label for="organization">Organization:</label>
  <input type="text" id="organization" name="organization"><br>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
