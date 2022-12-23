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

     $var="select * from vulnerability INNER JOIN  documents ON Vul_id='$id' ";
    //  $var="SELECT vl.*,docid.*,doc.* FROM `vulnerability` as vl left join documentid as docid on vl.Vul_id = docid.Vul_id
    //  left join documents as doc on doc.id=docid.Doc_id where vl.Vul_id = '$id";
     $query=mysqli_query( $this->con, $var);

      // $doc="select * from documents where id='$id' ";
      // $query=mysqli_query( $this->con, $doc);
    
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