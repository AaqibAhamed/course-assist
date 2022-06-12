 <?php 
if(isset($_POST['save'])){
    $error = saveFaculty($conn);
}

 ?>
 <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Faculty</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add Faculty
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mb-4">
      <div class="shadow-box">
        <h4>Add Faculty</h4>
      </div>
    </div>
    <div class="col-6">
        <div class="shadow-box">
              <div class="form-group">
                <form action="" method="post">
                  <label for="exampleInputEmail1">Faculty Name</label>
                  <input type="text" class="form-control" name="faculty_name" placeholder="Faculty Name" value="<?php echo $_POST['faculty_name']; ?>" required>
                </div>
        </div>
    </div>
    <div class="col-6">
        <div class="shadow-box">
              <div class="form-group">
                  <label for="exampleInputEmail1">Faculty Status</label>
                  <select class="form-control" name="faculty_status" required>
                    <option value="1" <?php if($_POST['faculty_status']==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($_POST['faculty_status']==0){ echo "selected"; }?>>Inactive</option>
                  </select>
                </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="shadow-box">
           <div class="">
                <?php echo displayMessages($error[0], $error[1]); ?>
            </div>
          <button type="submit" name="save" class="btn btn-primary">Save</button>
          <a class="btn btn-primary waves-effect waves-light mr-1" href="administrator.php?menu=faculty&action=all-faculty">Back</a>
          </form>
        </div>
    </div>
  </div>
</div>




</div>