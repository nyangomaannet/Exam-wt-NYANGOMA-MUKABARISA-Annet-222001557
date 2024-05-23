<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Roles Form</title>
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
}

form .error-message {
    color: red;
    font-weight: bold;
}
</style>
</head>
<body>
<form id="rolesForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="roleName">Role Name:</label>
  <input type="text" id="roleName" name="roleName"><br>
  
  <label for="permissionDescription">Permission Description:</label><br>
  <textarea id="permissionDescription" name="permissionDescription" rows="4" cols="50"></textarea><br>
  
  <button type="submit">Submit</button>
</form>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "virtual_employee_onboarding";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $roleName = $conn->real_escape_string($_POST['roleName']);
    $permissionDescription = $conn->real_escape_string($_POST['permissionDescription']);

    // Insert data into roles table
    $sql = "INSERT INTO roles (role_name, permission_description) VALUES ('$roleName', '$permissionDescription')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-message'>New record created successfully</p>";
    } else {
        echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Close database connection
$conn->close();
?>
</body>
</html>
