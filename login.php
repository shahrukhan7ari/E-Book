<?php

include 'connection.php';
if(isset($_POST['submit']))
{
    $email=$_POST['cusEmail'];
    $password=$_POST['cusPass'];

    $query="select * from customer2 where cus_email = '$email' && cus_password = '$password'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
      if(mysqli_num_rows($result)>0)
      {
          $row=mysqli_fetch_row($result);
          $_SESSION['customer']=$row[2];
        //   header('location:index.php');
        echo "<script>alert('successfully login')</script>";
      }
      else
      {
          echo "<script>alert('Invalid Credentials');</script>";
      }
    }
}
include 'header.php';

?>    
        
        <!-- Login Start -->

        <div class="login">
            <div class="container-fluid">
                <form action="" method="post">
                    <div class="login-form">
                        <center><h2>Log in</h2></center>
                        <div class="row">
                            <div class="col-md-12">
                                <label>E-mail / Username</label>
                                <input class="form-control" type="email" name="cusEmail" placeholder="E-mail / Username">
                            </div>
                            <div class="col-md-12">
                                <label>Password</label>
                                <input class="form-control" type="password" name="cusPass" placeholder="Password">
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn" name="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Login End -->
        
<?php
    include "footer.php";
?>