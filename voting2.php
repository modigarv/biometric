<?php
// Connect to the database
$conn = new mysqli('localhost','root','','verify');

// Check connection
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}

// Prepare the SELECT statement
$stmt = $conn->prepare("SELECT * FROM voters_table WHERE token =?");
$stmt->bind_param("s", $token);
$token = $_POST['token'];
$stmt->execute();
$result = $stmt->get_result();
// Get the name, age, and sex fields
$row = $result->fetch_assoc();
$name = $row['name'];
$age = $row['age'];
$sex = $row['sex'];
?>

<input type="text" id="name" name="name" value="<?php echo $name;?>" readonly>
<input type="text" id="age" name="age" value="<?php echo $age;?>" readonly>
<input type="text" id="sex" name="sex" value="<?php echo $sex;?>" readonly>