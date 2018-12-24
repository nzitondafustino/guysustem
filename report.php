<?php
require "partials/headerback.php";
require "partials/sideNav.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
      <h2>Moonly income summary</h2>
      <hr>
        <?php
         include "includes/report.inc.php";
        ?>
        <h4 style="margin-top: 10px;">RGO report</h4>
        <form method="POST" action="rgo.pdf.php" class="form-group">
         <div class="row">
         	<div class="col-md-5">
         		<label>Start Date</label>
         		<input type="text" name="start" id="start" class="form-control">
         	</div>
         	<div class="col-md-5">
         		<label>End Date</label>
         		<input type="text" name="end" id="end" class="form-control"><br>
         		<input type="submit" name="rgo_report" class="btn btn-success" value="Generate">
         	</div>
         </div>	
        </form>
        <h4 style="margin-top: 10px;">ITHUB report</h4>
        <form method="POST" action="it.pdf.php" class="form-group">
         <div class="row">
         	<div class="col-md-5">
         		<label>Start Date</label>
         		<input type="text" name="start" id="start1" class="form-control">
         	</div>
         	<div class="col-md-5">
         		<label>End Date</label>
         		<input type="text" name="end" id="end1" class="form-control"><br>
         		<input type="submit" name="it_report" class="btn btn-success" value="Generate">
         	</div>
         </div>	
        </form>
        <h4 style="margin-top: 10px;">Expenses report</h4>
        <form method="POST" action="exp.pdf.php" class="form-group">
         <div class="row">
            <div class="col-md-5">
                <label>Start Date</label>
                <input type="text" name="start" id="start2" class="form-control">
            </div>
            <div class="col-md-5">
                <label>End Date</label>
                <input type="text" name="end" id="end2" class="form-control"><br>
                <input type="submit" name="exp_report" class="btn btn-success" value="Generate">
            </div>
         </div> 
        </form>
        </div>
      </div>  
</main>
<?php
require "partials/footerback.php";
?>