  <?php 
if(isset($_POST['save'])){
    $error = saveDepartment($conn);
}
$faculties = getAllFaculties($conn);
 ?>
 <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Department</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add Department
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
        <h4>Add Department</h4>
      </div>
    </div>
    <div class="col-6">
        <div class="shadow-box">
          <form method="post" action="">
              <div class="form-group">
                  <label for="exampleInputEmail1">Department Name</label>
                  <input type="text" class="form-control" name="department_name" value="<?php echo $_POST['department_name']; ?>" placeholder="Department Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Faculty Name</label>
                  <select class="form-select" name="faculty" required>
                    <?php 
                        if (mysqli_num_rows($faculties) > 0) {
                              while($row = mysqli_fetch_assoc($faculties)) { 
                                if($_POST['faculty']==$row['f_id']){ ?>
                                  <option value="<?php echo $row['f_id']; ?>" selected><?php echo $row['f_name']; ?></option>
                               <?php }else{ ?>
                                   <option value="<?php echo $row['f_id']; ?>"><?php echo $row['f_name']; ?></option>
                              <?php  } ?>
                               

                      <?php   }
                            }
                    ?>
                    
                    
                  </select>
              </div>
        </div>
    </div>
    <div class="col-6">
        <div class="shadow-box">
              <div class="form-group">
                  <label for="exampleInputEmail1">Department Status</label>
                  <select class="form-control" name="department_status" required>
                    <option value="1" <?php if($_POST['department_status']==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($_POST['department_status']==0){ echo "selected"; }?>>Inactive</option>
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
          </form>
          <a class="btn btn-primary waves-effect waves-light mr-1" href="administrator.php?menu=department&action=all-department">Back</a>
        </div>
    </div>
  </div>
</div>




</div>