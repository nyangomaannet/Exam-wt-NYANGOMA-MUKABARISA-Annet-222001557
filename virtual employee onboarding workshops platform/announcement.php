<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Announcements Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  form {
    max-width: 600px;
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
  input[type="datetime-local"],
  textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  textarea {
    resize: vertical;
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

  .success-message {
    color: green;
    margin-top: 10px;
  }
</style>
</head>
<body>
<?php
// PHP code here
?>
<form id="announcementForm" method="post">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required><br><br>
  
  <label for="content">Content:</label><br>
  <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>
  
  <label for="datePosted">Date Posted:</label>
  <input type="datetime-local" id="datePosted" name="datePosted" required><br><br>
  
  <label for="postedBy">Posted By:</label>
  <input type="text" id="postedBy" name="postedBy" required><br><br>
  
  <button type="submit">Submit</button>
</form>
</body>
</html>
