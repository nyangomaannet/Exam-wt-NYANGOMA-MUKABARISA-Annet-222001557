<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Documents Form</title>
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
}

form .error-message {
    color: red;
    font-weight: bold;
}
</style>
</head>
<body>
<form id="documentsForm" action="process_form.php" method="post">
  <label for="documentTitle">Title:</label>
  <input type="text" id="documentTitle" name="documentTitle"><br>
  
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
  
  <label for="filePath">File Path:</label>
  <input type="text" id="filePath" name="filePath"><br>
  
  <label for="uploadDate">Upload Date:</label>
  <input type="datetime-local" id="uploadDate" name="uploadDate"><br>
  
  <label for="uploadedBy">Uploaded By:</label>
  <input type="text" id="uploadedBy" name="uploadedBy"><br>
  
  <button type="submit">Submit</button>
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["documentTitle"];
    $description = $_POST["description"];
    $filePath = $_POST["filePath"];
    $uploadDate = $_POST["uploadDate"];
    $uploadedBy = $_POST["uploadedBy"];
    
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "virtual_employee_onboarding";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO documents (title, description, file_path, upload_date, uploaded_by) 
            VALUES ('$title', '$description', '$filePath', '$uploadDate', '$uploadedBy')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-message'>New record created successfully</p>";
    } else {
        echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    // Close connection
    $conn->close();
}
?>
</body>
</html>
