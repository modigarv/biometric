<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verify";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_GET['nota'] == 'Vote') {
  $sql = "INSERT INTO votes (bjp, congress, aap, nota) VALUES (0, 0, 0, 1)";

  if ($conn->query($sql) === TRUE) {
    header('Location: test.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>