<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Technical Work Done</h2>
      <hr>
      <div class="row">
        <div class="col-md-12">
           <?php if(isset($_GET['error']))
             {
              if ($_GET['error']=='emptyfields') {
              echo "<div class='alert alert-danger' role='alert'>
                   Please fill all fields
                  </div>";
              } 
              }
             ?>
        </div>
      </div>
        <form method="POST" action="includes/technical.new.inc.php">
            <div class="form-group">
              <label><h4>Item Name</h4></label>
              <input type="text" class="form-control" required placeholder="Item Name" name="itemname">
            </div>
            <div class="form-group">
              <label><h4>model</h4></label>
              <input type="text" class="form-control" required placeholder="Enter Model" name="model">
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
              <label><h4>Price</h4></label>
              <input type="number" class="form-control" required placeholder="Enter Price" name="price">
            </div>
            <div class="form-group">
              <label><h4>End Date</h4></label>
              <input type="text" class="form-control" required id="date" placeholder="YYYY-MM-DD" name="date">
            </div>
            <div class="form-group">
              <label><h4>Work Description</h4></label>
              <textarea class="form-control"  rows="5" required name="description"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="technical_create" style="float:right; margin-bottom: 20px;" value="Create">
            </div>
          </form>
          </div>
          </div>  
</main>
<?php
require "partials/footerback.php";
?>