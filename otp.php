<?php
// Connect to the database
$conn = new mysqli('localhost','root','','verify');

// Check connection
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
}

// Prepare the SELECT statement
$stmt = $conn->prepare("SELECT COUNT(*) FROM votes");
$stmt->execute();
$result = $stmt->get_result();
// Get the total number of rows
$totalRows = $result->fetch_row()[0];
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>OTP</title>
    <link rel="stylesheet" href="otp.css" />
  
    
  </head>
  <body>
    <div class="menu-bar" id="menu">
      <div>
        <h2>ELECTION COMMISION OF INDIA</h2>
      </div>
      <div>
      <h2>
        VOTES:<span id="total-rows"><?php echo  $totalRows;?></span>
        </h2>
      </div>
    </div>



  

    <div id="container">
      <b>
        <form action="otp2.php" method="post" onsubmit="clearInput();">
        <label for="otp">OTP:</label><br /><br />
        <input type="tel" id="otp" name="otp" pattern="[0-9]{4}" required oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4); this.value = this.value.replace(/[^0-9.]/g, '');"
        /><br /><br />
     
        <input type="submit"  value="Verify" />
        </form>
      </b>
    </div>

 

   

  </body>
</html>
