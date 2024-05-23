<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Form</title>
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

  input[type="text"] {
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
</style>
</head>
<body>
<?php
// PHP code here
?>
<form id="adminForm" method="post" action="">
  <label for="userId">User ID:</label>
  <input type="text" id="userId" name="userId" value="<?php echo htmlspecialchars($userId); ?>"><br><br>
  
  <label for="adminRole">Admin Role:</label>
  <input type="text" id="adminRole" name="adminRole" value="<?php echo htmlspecialchars($adminRole); ?>"><br><br>
  
  <button type="submit">Submit</button>
</form>

</body>
</html>
