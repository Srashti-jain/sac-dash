<?php
session_start();

include("config/dbcon.php");
include('function.php') ;
include("helpers.php");

$last_id = '';

$row = array(

  'Critical'=>"",
  'High'=>"",
  'Medium'=>"",
  // 'Doc'=>"",
);


if(isset($_GET['id']))
{
  $last_id = $_GET['id'];
  $last_id = encrypt_decrypt($last_id,$action='decrypt');
  $result = $db->getData($last_id);

  if($result!=false)
  {
    $row = $result;
    // print_r($row);
  }

}

include('includes/header.php') ;
include('includes/navbar.php') ;
include('includes/sidebar.php') ;


?>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 ">
          <div class="col-sm-6">
            <h1>vulnerability</h1>
          </div>
          <?php
              if(isset($_SESSION['status']))
              {
                echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
                  
              }
              ?>
              </br>
              
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="login.php">Log out</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
    
<section class="content">
      <div class="container-fluid">
        <div class="row" >
          <!-- left column -->
          <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">vulnerability</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="code.php" method="POST" enctype="multipart/form-data"> 
                <div class="card-body">
            
                <div class="form-group needs-validation" novalidate>
                <label for="validationCustomUsername" >Select a company</label>
                  <select name="company" class="custom-select" id="validationCustomUsername" required>
                          <option value="">-- Select --</option>  
                          <?php
                            include("config/dbcon.php");
                            $company="SELECT * FROM `company`";
                            $all_com = mysqli_query($con,$company);
                          ?>
                          <?php
                             while ($comp = mysqli_fetch_array(
                             $all_com,MYSQLI_ASSOC)):;

                          ?>
                            <option value="<?php echo $comp["company_id"];?>"
                             <?php if(isset($company['company_id']) && $company['company_id']==$comp["company_id"])
                             {echo 'selected="selected"';} ?>>
                                <?php echo $comp["company_name"]; ?>
                            </option>
                            <?php
                             endwhile;
                              ?>
                  </select>
                </div>


                   <div class="form-group">
                    <label for="validationDefault01">Critical</label>
                    <input type="number" name="critical" id="validationDefault01" value="<?php echo $row['Critical']?>" class="form-control"  required >
                  </div>
                  <div class="form-group">
                    <label for="validationDefault02">High</label>
                    <input type="number" name="high" id="validationDefault02" value="<?php echo $row['High']?>" class="form-control" required  >
                  </div>
                  <div class="form-group">
                    <label for="validationDefault03">Medium</label>
                    <input type="number" name="medium" id="validationDefault03" value="<?php echo $row['Medium']?>" class="form-control"  required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file"  value="" class="custom-file-input" id="exampleInputFile" required>
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    </div>
                  </div>
                    <?php
                     if(isset($row['Doc']) && file_exists($_SERVER['DOCUMENT_ROOT'].'/phpdash/SAC-dash/admin/uploads/'.$row['Doc']))
                    {
                    ?>
                      <a  href='uploads/<?php echo $row['Doc'];?>'>download</a>
                    <?php
                    }
                    ?>
                   
  
                  <div class="form-group">
                    <!-- <label for="validationDefault03">ID</label> -->
                    <input type="hidden"  name="Id" value=<?php echo $last_id;?>>
                  </div> 
                    
                  
                
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required >
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->
                

                <div class="card-footer">
                  <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
     </div>
  </div>
 </div>
</section>
</section>
</div>
              


          <?php
          include('includes/footer.php');
          ?>

          <!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>