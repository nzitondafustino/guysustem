<?php
require "partials/headerback.php";
require "partials/sideNav.php";
include "includes/product.edit.inc.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>New  Product</h2>
        <form method="POST" action="includes/product.update.inc.php">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
              <label><h4>Item Name</h4></label>
              <input type="text" value="<?php echo $itemname;?>" class="form-control" placeholder="Item Name" name="itemname">
            </div>
            <div class="form-group">
              <label><h4>model</h4></label>
              <input type="text" value="<?php echo $model;?>" class="form-control" placeholder="Enter Model" name="model">
            </div>
            <div class="form-group">
              <label><h4>Serial Number</h4></label>
              <input type="text" value="<?php echo $sn;?>" class="form-control" placeholder="Serial Number" name="SN">
            </div>
            <div class="form-group">
              <label><h4>Price</h4></label>
              <input type="text" value="<?php echo $price;?>" class="form-control" placeholder="Enter Price" name="price">
            </div>
            <div class="form-group">
              <label><h4>Quantity</h4></label>
              <input type="text" value="<?php echo $qty;?>" class="form-control" placeholder="Enter quantity" name="qty">
            </div>
            <div class="form-group">
              <label><h4>Product Description</h4></label>
              <textarea class="form-control"  rows="5" name="description"><?php echo $description;?></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="product_update" style="float:right; margin-bottom: 20px;" value="Upadate">
            </div>
          </form>
          </div>
          </div> 
</main>
<?php
require "partials/footerback.php";
?>