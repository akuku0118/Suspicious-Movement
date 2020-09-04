

<?php

$A = rand(5, 15);

setcookie('username', $A,time() + 40);


    $host='sql305.epizy.com';
    $user='epiz_23452580';
    $pass='v7S3SfzdeCOoE';
    $db='epiz_23452580_movingtable';

    $con = mysqli_connect($host,$user,$pass,$db);
    if($con) {
    print "Connetion successful \n"; 
    }


    $sql = "SELECT * FROM Users WHERE 1";
    echo "<br>";
    

    

    $results = mysql_query($sql, $con);
      if (!$results) {
    print "Error: You cannot enter the game at this time.";    
    }else {      
    print "Connected" ;
    }
    

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["UserID"]. " - Name: " . $row["ScreenName"]. " " . $row["Team"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();



/*
    $row = msql_fetch_array();
    $UserID = $row[0];
    $ScreenNae = $row[1];
    $Team = $row[2];


    echo $UserID. "<BR>". $ScreenID . "<BR>" . $Team . "<BR>" .;

    

*/

    /* 
    SELECT UserID, '$screenID', TeamName 
    FROM UserID, Team
    WHERE Used = 0
    */

   

?>

