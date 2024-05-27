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

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT number FROM token ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    // Get the token value
    $token = $result->fetch_row()[0];

    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM voters WHERE number =?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    // Get the name, age, and sex fields
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $age = $row['age'];
    $sex = $row['sex'];
    $vid = $row['vid'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="voting.css">
    <title>Profile Card</title>
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


    <div class="modal">
        <img src="profile.jpg" alt="">
        <div class="close"></div>
    </div>
    
    <div class="hero">
    
        <div class="container">
            <div class="card">
                <div class="header">
                   
                    
                    <div class="main">
                        <div class="image">
                            
                        </div>
                        <h3 class="name"> <?php echo $fname;?> &nbsp; <?php echo $lname;?> </h3>
                    </div>
                </div>
    
                <div class="content">
                    <div class="left">
                        <div class="about-container">
                            <h3 class="title">Details</h3>
                            <p>Fullname : <?php echo $fname;?> &nbsp; <?php echo $mname;?> &nbsp; <?php echo $lname;?> </p>
                            <p class="text">Age : <?php echo $age;?> </p>
                            <p class="text">Sex : <?php echo $sex;?> </p>
                            <p>Voter ID : <?php echo $vid;?></p>
                        </div>
    
                       
                    </div>
    
                </div>
            </div>
        </div>
        <div class="container_1">
            <div class="card_1">
                <table>
                    <tr>
                        <th>SR NO.</th>
                        <th>LOGO</th>
                        <th>PARTY NAME</th>
                        <th>NAME</th>
                        <th>VOTE</th>
                    </tr>
                    <tr>
                        
                        <td>1</td>
                        <td><img src="bjp.png" alt="BJP logo"></td>
                        <td>BJP</td>
                        <td>NARENDRA MODI</td>
                        <td>
                            <form action="bjp.php" method="get" >
                            <button type="submit" name="bjp" value="Vote">Vote</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
        
                        <td>2</td>
                        <td><img src="congress.png" alt="Congress logo"></td>
                        <td>CONGRESS</td>
                        <td>RAHUL GANDHI</td>
                        <td>
                            <form action="congress.php" method="get" >
                            <button type="submit" name="congress" value="Vote">Vote</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="aap.jpeg" alt="AAP logo"></td>
                        <td>AAM AADMI PARTY</td>
                        <td>ARVIND KEJRIWAL</td>
                        <td>
                            <form action="aap.php" method="get" >
                            <button type="submit" name="aap" value="Vote">Vote</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><img src="nota.png" alt="NOTA logo"></td>
                        <td>NOTA</td>
                        <td>NA</td>
                        <td>
                            <form action="nota.php" method="get" >
                            <button type="submit" name="nota" value="Vote">Vote</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    
    </div>
    <script src="app.js"></script>
</body>
</html>