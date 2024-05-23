<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employees Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  form {
    max-width: 400px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="email"],
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  button[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #45a049;
  }

  .error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }
</style>
</head>
<body>
<form id="employeesForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" name="firstName" required><br><br>
  
  <label for="lastName">Last Name:</label>
  <input type="text" id="lastName" name="lastName" required><br><br>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>
  
  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone" required><br><br>
  
  <label for="hireDate">Hire Date:</label>
  <input type="date" id="hireDate" name="hireDate" required><br><br>
  
  <label for="department">Department:</label>
  <input type="text" id="department" name="department" required><br><br>
  
  <button type="submit">Submit</button>
</form>

<?php
// PHP code here
?>
</body>
</html>
