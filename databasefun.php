<!DOCTYPE html>
<html lang="en">
<title>Lobby Database Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--<link rel="stylesheet" href="changeStylesheet.css">-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Allerta Stencil"}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- Header --> 
<header
      <img id="banner" src="Pics/spy.jpeg" alt="Banner Image"
      class="w3-container w3-black w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Welcome. </br> Enter a screen name: </h1>

<form method = "post" action = "">
    <input name = "screenID" />
    <br/>
    <input type = "submit" name = "button" value = "Join" a.button class="w3-button w3-white w3-padding-large w3-large w3-margin-top"/>
<br/> 

</form> 

</header>

<?php

function addUsers($screenID) {
    $host='sql305.epizy.com';
    $user='epiz_23452580';
    $pass='v7S3SfzdeCOoE';
    $db='epiz_23452580_movingtable';

    $con = mysqli_connect($host,$user,$pass,$db);
    if($con) {
    print "Connection successful \n"; 
    }

    /*$sql = "INSERT INTO Users(UserID, ScreenName, Team) 
            SELECT UserID, '$screenID', TeamName 
            FROM UserID, Team
            WHERE Used = 0
            ORDER BY RAND() LIMIT 1;";*/
    
    $sql = "INSERT INTO Users(UserID, ScreenName, Team) 
            SELECT UserID, '$screenID', TeamName 
            FROM Team t1, UserID t2
            WHERE t1.Used = 0 AND t2.Used = 0
            ORDER BY RAND() LIMIT 1;";

    $sql .= "UPDATE UserID t1
             JOIN Users t2
             ON t1.UserID = t2.UserID
             SET Used = 1
             WHERE Used = 0;";

    $sql .= "UPDATE Team t1
             JOIN Users t2
             ON t1.TeamName = t2.Team
             SET Used = 1
             WHERE Used = 0;";
    
    /*$sql .= "INSERT INTO Users(UserID)
             SELECT UserID
             FROM UserID
             Where Taken = 0
             ORDER BY RAND() LIMIT 1;"; */

    //$query = mysqli_query($con,$sql);
    $query = mysqli_multi_query($con, $sql); 

    if (!$query) {
    print "Error: You cannot enter the game at this time.";    
    } else {      
    header("Location: lobbypage.php");
    }
}

if(isset($_POST['button'])) {
    addUsers($_POST['screenID']);
}

?>

<!-- First Grid -->


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge"></h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  

</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu butto
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>


</body>
</html>