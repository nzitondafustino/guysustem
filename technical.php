<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Technical Work Done</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              </div>
            </div>
          </div>
           <div class="row">
            <div class="col-md-4">
              <h2>Search Result</h2>
            </div>
            <div class="col-md-8">
              <form method="POST" action="work.search.php">
                <div class="row">
                  <div class="col-md-10">
                  <input type="text" name="search" placeholder="Enter model Item" class="form-control">
                </div>
                <div class="col-md-2">
                  <input style="margin-left:-25%;" value="Search" type="submit" name="work_search" class="btn btn-dark">
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
                  <th>Item/Property</th>
                  <th>Model</th>
                  <th>Client Name</th>
                  <th>contact</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                 include "includes/technical.inc.php";
                 ?>
              </tbody>
            </table>
          </div>
        </main>
<?php
require "partials/footerback.php";
?>