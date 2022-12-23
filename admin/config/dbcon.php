<?php
$host="localhost";
$username="root";
$password="";
$database="sac_dash";

//connection
$con=mysqli_connect("$host","$username","$password","$database");
 
//check connection
if(!$con)
{
    header("Location:../errors/dberror.php");
    die();

}
// else{
//     echo "Database Connected.!";
// }
?>