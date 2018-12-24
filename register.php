<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Register New User</h2>
      <div class="row">
        <div class="col-md-12">
           <?php if(isset($_GET['error']))
             {
              if ($_GET['error']=='emptyfields') {
              echo "<div class='alert alert-danger' role='alert'>
                   Please fill all fields
                  </div>";
              } elseif($_GET['error']=='namerror') {
                echo "<div class='alert alert-danger' role='alert'>
                   Name must be at least 3 characters
                  </div>";
              }
              elseif($_GET['error']=='passwordmatcherror') {
                echo "<div class='alert alert-danger' role='alert'>
                   Password and Confirm Password fields do not match
                  </div>";
              }
              elseif($_GET['error']=='passwordlenghterror') {
                echo "<div class='alert alert-danger' role='alert'>
                   Password must be at least 5 characters
                  </div>";
              }
              }
             ?>
        </div>
      </div>
      <hr>
        <form method="POST" action="includes/register.inc.php">
            <div class="form-group">
              <label><h4>E-mail</h4></label>
              <input type="text" class="form-control" required  placeholder="Enter E-mail" name="email">
            </div>
            <div class="form-group">
              <label><h4>Name</h4></label>
              <input type="text" class="form-control" required placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
              <label><h4>Password</h4></label>
              <input type="password" class="form-control" required placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <label><h4>Confirm Password</h4></label>
              <input type="password" class="form-control" required  placeholder="Password" name="confirm_password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="register" style="float:right;" value="Register">
            </div>
          </form>
        </div>
      </div>  
</main>
<?php
require "partials/footerback.php";
?>