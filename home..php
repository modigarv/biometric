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
    <meta name="viewport" content="" width="", initial-scale="1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="home.css" />
  
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
        <form action="homen.php" method="post" >
        <label for="number">Enter your phone number:</label><br /><br />
        <input type="tel" id="number" name="number" pattern="[0-9]{10}" required oninput="if (this.value.length > 10) this.value = this.value.slice(0, 10); this.value = this.value.replace(/[^0-9.]/g, '');" autocomplete="off" />
        <br /><br />
     
        <input type="submit"  value="Submit" />
        </form>
      </b>
    </div>


   

  </body>
</html>
