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
    <title>biometrics</title>
    <link rel="stylesheet" href="finger.css" />
  
    <script>
    
      function Capture()
      {
      
        var url = "https://localhost:11100/capture";
      
         var PIDOPTS='<PidOptions ver=\"1.0\">'+'<Opts fCount=\"1\" fType=\"0\" iCount=\"\" iType=\"\" pCount=\"\" pType=\"\" format=\"0\" pidVer=\"2.0\" timeout=\"10000\" otp=\"\" wadh=\"\" posh=\"\"/>'+'</PidOptions>';
       
         
       var xhr;
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
      
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer, return version number
            {
              //IE browser
              xhr = new ActiveXObject("Microsoft.XMLHTTP");
            } else {
              //other browser
              xhr = new XMLHttpRequest();
            }
              
              xhr.open('CAPTURE', url, true);
          xhr.setRequestHeader("Content-Type","text/xml");
          xhr.setRequestHeader("Accept","text/xml");
      
              xhr.onreadystatechange = function () {
          //if(xhr.readyState == 1 && count == 0){
          //	fakeCall();
          //}
      if (xhr.readyState == 4){
                  var status = xhr.status;
                  //parser = new DOMParser();
                  if (status == 200) {
                  var test1=xhr.responseText;
                  var test2=test1.search("errCode");
            var test6=getPosition(test1, '"', 2);
            var test4=test2+9;
            var test5=test1.slice(test4, test6);
            if (test5>0)
            {
                  alert(xhr.responseText);
            //document.getElementById('text').value = xhr.responseText;
            }
            else
            {
            alert("No match found" );
            
      

            //document.getElementById('text').value = "Captured Successfully";
            }
      
      
                  } else 
                  {
                      
                    console.log(xhr.response);
      
                  }
            }
      
              };
      
              xhr.send(PIDOPTS);
        
      }
      
      
      function getPosition(string, subString, index) {
        return string.split(subString, index).join(subString).length;
      }
      
      
      
      
      
        </script>



    
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
        <form action="fin.php" method="post" onsubmit="clearInput();">
        <label for="phone">Place your finger:</label>
        <br /><br />
        <input type="button" onclick="Capture()"  value="Scan" />
        <a href="otp.php" id="otp-link">OTP</a>
        </form>
      </b>
    </div>

 

   

  </body>
</html>
