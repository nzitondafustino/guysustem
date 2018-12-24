<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Register Expense</h2>
      <hr>
      <div class="row">
        <div class="col-md-12">
           <?php if(isset($_GET['error']))
             {
              echo "<div class='alert alert-danger' role='alert'>
                   Please fill all field
                  </div>";
              } else if (isset($_GET['expenses'])) {
                echo "<div class='alert alert-success' role='alert'>
                   Expense Created Successfully
                  </div>";
              }
             ?>
        </div>
      </div>
        <form method="POST" action="includes/expenses.inc.php">
            <div class="form-group">
              <label><h4>Amount</h4></label>
              <input type="number" class="form-control" required placeholder="Enter Expense amount" name="amount">
            </div>
            <div class="form-group">
              <label><h4>Paid By</h4></label>
              <input type="text" class="form-control" required placeholder="Enter Name" name="paid_by">
            </div>
            <div class="form-group">
              <label><h4>Reason</h4></label>
              <textarea class="form-control"  rows="5" name="reason" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="exp_create" style="float:right; margin-bottom: 20px;" value="Create">
            </div>
          </form>
          </div>
          </div>  
</main>
<?php
require "partials/footerback.php";
?>