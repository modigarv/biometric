<?php
if (isset($_POST['otp'])){
    $otp = $_POST['otp'];

    // Connect to the database
    $conn = new mysqli('localhost','root','','verify');

    // Check connection
    if($conn->connect_error){
        die("Connection Failed : ". $conn->connect_error);
    }

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM voters WHERE otp=?");
    $stmt->bind_param("s", $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the number exists in the table, open finger.html
    if ($result->num_rows > 0) {
        header('Location: voting.php?otp='. urlencode($otp));
        exit;
    } else {
            
        echo "<script>
        alert('Wrong OTP');
        window.location.href='otp.php';
        </script>";

    }
    // Close the prepared statement and the database connection

      
 
   
   
    $stmt->close();
    $conn->close();
}
?>