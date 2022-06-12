<?php include 'includes/inc.header.php'; ?>
<?php 
if(isset($_POST['login'])){
    $error = adminLogin($conn);
}

?>
<section class="login-wrap">
    <div class="container">
        <div class="card">
          <div class="card-header">
            <div class="logo">
              <img src="images/logo.png" alt="logo" width="100px" height="auto">
            </div>
            <div class="right">
              <h5 class="">Course Assist</h5>
              <p>Admin Login</p>
            </div>
          </div>
          
          <div class="card-body">
            <form action="" method="post">
                <div class="form-group mb-3">
                  <label class="mb-2" for="exampleInputEmail1">Username</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                </div>
                <div class="form-group mb-3">
                  <label class="mb-2" for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                </div>
               <div class="form-group mb-3">

               </div>
                <button type="submit" name="login" class="btn btn-primary bg-black">Log In</button>
              </form>
          </div>
        </div>
    </div>
</section>

<?php include 'includes/inc.footer.php'; ?>