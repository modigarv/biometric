<?php
// Connect to the database
$conn = new mysqli('localhost','root','','verify');

// Check connection
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Recorded</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            font-family: Arial, sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
    <script>
        // Redirect to the home.html page after 2 seconds
        setTimeout(function () {
          window.location.href = "home.php";
        }, 2000);
      </script>


</head>
<body>
    <div>
        VOTE RECORDED
    </div>
</body>
</html>