<?php
if (isset($_POST['number'])){
    $number = $_POST['number'];

    // Connect to the database
    $conn = new mysqli('localhost','root','','verify');

    // Check connection
    if($conn->connect_error){
        die("Connection Failed : ". $conn->connect_error);
    }

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM voters WHERE number=?");
    $stmt->bind_param("s", $number);
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare the INSERT statement
   



    // If the number exists in the table, open finger.html
if ($result->num_rows > 0) {
    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM token WHERE number=?");
    $stmt->bind_param("s", $number);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the number is not found, open finger.php
    if ($result->num_rows == 0) {

        header('Location: finger..php?number='. urlencode($number));
        $stmt = $conn->prepare("INSERT INTO token (number) VALUES (?)");
        $stmt->bind_param("s", $number);
        $number = $_POST['number'];
        $stmt->execute();
        
        echo "<script>
        window.location.href='finger..php';
        </script>";
        exit;

      
       
    }
    else{

        echo "<script>
        alert('Already voted');
        window.location.href='home..php';
        </script>";
       
    }
    
} else {
            
        echo "<script>
        alert('Number not found');
        window.location.href='home..php';
        </script>";

    }
    // Close the prepared statement and the database connection

      
 
   
   
    $stmt->close();
    $conn->close();
}
?>