<?php
session_start();
include("config/dbcon.php");
include("helpers.php");
              
if(isset($_POST['btn']))
{
    $critical=$_POST['critical'];
    $high=$_POST['high'];
    $medium=$_POST['medium'];
    $files=$_FILES['file']['name'];
    $company_id=$_POST['company']; 
    

    $doc_id = '';
    
    if($files!=false)
    {
      $return = move_uploaded_file($_FILES["file"]["tmp_name"],"./uploads/".$_FILES["file"]["name"]);
        
      if($return==true)
     {
     
      $sql="INSERT INTO documents (Doc) VALUES ('$files')";
      //$sql=mysqli_query($con,$doc);  
      if ($con->query($sql) === TRUE) {
        $doc_id = $con->insert_id;
      } else {
        $doc_id = '';
      }

     }
    } 
    
     $Vul="INSERT INTO vulnerability (Critical,High,Medium) VALUES ('$critical','$high','$medium')";
     $sql1=mysqli_query($con,$Vul);
     if($sql1==1)
     {

      $last_id = $con->insert_id;
      $user_id = $_SESSION['user_id'];
      $docu="INSERT INTO documentid (user_id,Vul_id,Doc_id,company_id) VALUES ('$user_id','$last_id','$doc_id','$company_id')";
      $sql=mysqli_query($con,$docu);
      $company="INSERT INTO company_users (company_id,user_id) VALUES ('$company_id','$user_id')";
      $sql=mysqli_query($con,$company);
      $vul_user="INSERT INTO vul_users (User_id,Vul_id) VALUES ('$user_id','$last_id')";
      $sql=mysqli_query($con,$vul_user);
    
        
        $last_id = encrypt_decrypt($last_id,$action='encrypt'); 
        $_SESSION['status'] = "Vulnerability added successfully!";
        
        header("Location: registered.php?id=".$last_id);
     }
         
      
      // if(mysqli_multi_query($con, $sql)==0)
      // {    
      //   $last_id = $con->insert_id;
      //   $last_id = encrypt_decrypt($last_id,$action='encrypt'); 
      //   $_SESSION['status'] = "Vulnerability added successfully!";
        
      //   header("Location: registered.php?id=".$last_id);
      // }
      else
      {
        // $Vul_id='';
        $_SESSION['status'] = "Vulnerability  not added successfully!";
        header("Location: registered.php ");
      }        
}
?>