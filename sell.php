<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Sell Product</h2>
      <div class="row">
        <div class="col-md-12">
           <?php if(isset($_GET['error']))
             {
              if ($_GET['error']=='emptyfields') {
              echo "<div class='alert alert-danger' role='alert'>
                   Please fill all fields
                  </div>";
              } elseif($_GET['error']=='emptystock') {
                echo "<div class='alert alert-danger' role='alert'>
                   Product does not exit please check spelling
                  </div>";
              }
              }
             ?>
        </div>
      </div>
        <form method="POST" action="includes/sell.inc.php">
            <div class="form-group">
              <label><h4>Model</h4></label>
              <input type="text" class="form-control" required placeholder="Enter Model" name="model">
            </div>
            <div class="form-group">
              <label><h4>Serial Number</h4></label>
              <input type="text" class="form-control" placeholder="Enter serial Number" name="SN">
            </div>
            <div class="form-group">
              <label><h4>Qty</h4></label>
              <input type="number" class="form-control" required placeholder="Enter quantity" name="qty">
            </div>
            <div class="form-group">
              <label><h4>Client Name</h4></label>
              <input type="text" class="form-control" required placeholder="Serial Number" name="client">
            </div>
            <div class="form-group">
              <label><h4>Contact</h4></label>
              <input type="text" class="form-control" required placeholder="Client contact" name="contact">
            </div>
            <div class="form-group">
              <label><h4>Paid</h4>
                <input type="checkbox" checked placeholder="YYYY-MM-DD" name="paid">
              </label>
            </div>
            <div class="form-group">
              <label><h4>Pay Date</h4></label>
              <input type="text" class="form-control" required id="date" placeholder="YYYY-MM-DD" name="date">
            </div>
            <div class="form-group">
              <label><h4>Warranty Until</h4></label>
              <input type="text" class="form-control" required id="warranty" placeholder="YYYY-MM-DD" name="warranty">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="sell" style="float:right; margin-bottom: 20px;" value="Sell">
            </div>
          </form>
          </div>
          </div>  
</main>
<?php
require "partials/footerback.php";
?>