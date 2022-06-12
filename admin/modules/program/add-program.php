  <?php 
if(isset($_POST['save'])){
    $error = saveProgram($conn);
}
$Departments = getAllDepartments($conn);
 ?>
 <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Program</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add Program
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
        <h4>Add Program</h4>
      </div>
    </div>
    <div class="col-6">
        <div class="shadow-box">
          <form method="post" action="">
              <div class="form-group">
                  <label for="exampleInputEmail1">Program Name</label>
                  <input type="text" class="form-control" name="program_name" value="<?php echo $_POST['program_name']; ?>" placeholder="Program Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Department Name</label>
                  <select class="form-select" name="department" required>
                    <?php 
                        if (mysqli_num_rows($Departments) > 0) {
                              while($row = mysqli_fetch_assoc($Departments)) { 
                                if($_POST['department']==$row['d_id']){ ?>
                                  <option value="<?php echo $row['d_id']; ?>" selected><?php echo $row['d_name']; ?></option>
                               <?php }else{ ?>
                                   <option value="<?php echo $row['d_id']; ?>"><?php echo $row['d_name']; ?></option>
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
                  <label for="exampleInputEmail1">Total Credit</label>
                  <input type="text" class="form-control" name="credit" value="<?php echo $_POST['credit']; ?>" placeholder="Total Credit" required>
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Program Status</label>
                  <select class="form-control" name="program_status" required>
                    <option value="1" <?php if($_POST['program_status']==1){ echo "selected"; }?>>Active</option>
                    <option value="0" <?php if($_POST['program_status']==0){ echo "selected"; }?>>Inactive</option>
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
          <a class="btn btn-primary waves-effect waves-light mr-1" href="administrator.php?menu=program&action=all-program">Back</a>
        </div>
    </div>
  </div>
</div>




</div>