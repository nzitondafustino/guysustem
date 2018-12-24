
   <?php
   require "partials/header.php";
   ?>
      <main role="main" class="inner cover" style="margin-top: 20%;">
        <div class="card">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="includes/login.inc.php">
                    <div class="form-group">
                      <label class="label">E-mail</label>
                      <input type="text" class="form-control" placeholder="Enter E-mail" name="email">
                    </div>
                    <div class="form-group">
                      <label class="label">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-dark" style="float:right;" value="Login" name="login">
                    </div>
                  </form>
                </div>
            </div>
           </div>
         </div>
      </main>
   <?php
   require "partials/footer.php";
   ?>