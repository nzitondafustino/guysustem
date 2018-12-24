<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Sold products</h1>
             <div class="row">
                  <div class="col-md-12">
                     <?php if(isset($_GET['error']))
                       {
                        if ($_GET['error']=='productnotfound') {
                        echo "<div class='alert alert-danger' role='alert'>
                             Product does not exit please check spelling
                            </div>";
                        }
                      }
                       ?>
                  </div>
                </div>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <h2>Result</h2>
            </div>
            <div class="col-md-8">
              <form method="POST" action="sold.search.php">
                <div class="row">
                  <div class="col-md-10">
                  <input type="text" name="search" placeholder="Enter model or Serial Number of product" class="form-control">
                </div>
                <div class="col-md-2">
                  <input style="margin-left:-25%;" value="Search" type="submit" name="sold_search" class="btn btn-dark">
                </div>
                </div>
                </form>
              </div>
            </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item Name</th>
                  <th>Model</th>
                  <th>Price</th>
                  <th>S/N</th>
                  <th>client name</th>
                  <th>contact</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                 include "includes/sold.inc.php";
                ?>       
              </tbody>
            </table>
          </div>
        </main>
<?php
require "partials/footerback.php";
?>