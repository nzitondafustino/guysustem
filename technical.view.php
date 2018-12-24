<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Technical work Done</h2>
      <hr>
        <?php
         include "includes/technical.view.inc.php";
        ?>
      </div>
      </div>  
</main>
<?php
require "partials/footerback.php";
?>