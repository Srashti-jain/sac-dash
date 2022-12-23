<?php
session_start();
?>
<?php
include("config/dbcon.php");
if (isset($_POST["submit"]))

{   $email=$_POST["email"];
    $password=$_POST["password"];

    $s="Select * from login where email='$email' and password='$password'";
    $rs=mysqli_query($con,$s);
 
    $row=mysqli_fetch_array($rs);
       $user_id=$row["user_id"];
        $name=$row["name"];
       if(isset($row))
            {
            $_SESSION['name'] = $name;
            $_SESSION['user_id'] =$user_id;           
              // echo"user login: $email";
              
                header("Location: registered.php");
            }
            else{
              echo"<h2 style='text-align:center;'>invalid user or password!!</h2>";
            }
}

include('includes/header.php') ;
// include('includes/navbar.php') ;
// include('includes/sidebar.php') ;
?>


<section class="content-header">
          <!-- <div class="container-fluid">
            <div class="row mb-2 ">
              <div class="col-sm-6">
                <h1>LOGIN</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">General Form</li>
                </ol>
              </div>
            </div>
          </div> -->
    <section class="content">
          <div class="container-fluid">
            <div class="row" >
              <!-- left column -->
              <div class="col-md-6">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Login Form</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                      <form   method="POST" > 
                        <div class="card-body">
                         <div class="form-group needs-validation" novalidate>
                            <label for="validationDefault01">Email Address</label>
                            <input type="email" name="email" id="validationDefault01" class="form-control"  required >
                          </div>
                          <div class="form-group">
                            <label for="validationDefault02">Password</label>
                            <input type="password" name="password" id="validationDefault02" class="form-control" required  >
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required >
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
              </div>
              </div>
            </div>
         </div>
      </section>
</section>
   

    
  
<script src="../assets/plugins/jquery/jquery.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>

<script src="../assets/dist/js/demo.js"></script>
