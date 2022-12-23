<?php
include("config/dbcon.php");

class DbModal {
    // Properties

    public function __construct()
    {
      if(!isset($_SESSION['user_id']))
      {

        
        header("Location: login.php");
      } 
    }
    public $var;
  
    // Methods
    function getData($id) {

     $var="select * from vulnerability INNER JOIN  documents ON Vul_id='$id' AND id='$id' ";
    
     $query=mysqli_query( $this->con, $var);

     
    
    if(mysqli_num_rows($query)==0) 
       {
        echo "<script>alert('record not exist')</script>";
        // header("Location: registered.php ");
       }
       else{
        $row=mysqli_fetch_assoc($query);
        // print_r($row);
        // die();
        return $row;
      
       }
       return array();
      
    }
  }
  $db = new DbModal();
  $db->con = $con;

?>