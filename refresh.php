<!DOCTYPE html>
<html>
<head>
<title> Refresher </title>
<h1> The User table will be cleared and the UserID and Team Tables will be refreshed </h1> 
</head>
<body>


<form method = "post" action = "">
<div> 
Click the Refresh Button!
<br/>
<input type = "submit" name = "myButton" value = "Refresh"/>
<br/>
</div>
</form>

<?php

function refresh() {
    $host='sql305.epizy.com';
    $user='epiz_23452580';
    $pass='v7S3SfzdeCOoE';
    $db='epiz_23452580_movingtable';

    $con = mysqli_connect($host,$user,$pass,$db);
    if($con) {
    print "Connection successful \n"; 
    }

    $sql .= "UPDATE UserID
             SET Used = 0
             WHERE Used = 1;";

    $sql .= "UPDATE Team
             SET Used = 0
             WHERE Used = 1;";

    $sql .= "DELETE FROM Users;";

    $query = mysqli_multi_query($con, $sql); 

    if (!$query) {
    print "ERROR refreshing!";    
    } else {      
    print "Everything has been refreshed.";
    }
}

if(isset($_POST['myButton'])) {
    refresh();
}

?>



</body>
</html>