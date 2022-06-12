<?php 
$Programs = getAllPrograms($conn)
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
                      All Programs
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
        <h4>All Programs</h4>
      </div>
    </div>
    <div class="col-12 mb-4">
      <div class="shadow-box">
        <h4>Search</h4>
      </div>
    </div>

    <div class="col-12 mb-4">
      <div class="shadow-box">
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Program Name</th>
      <th scope="col">Faculty Name</th>
      <th scope="col">Department Name</th>
      <th scope="col">Program Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
       <?php 
        if ($Programs->num_rows > 0) {
              while($row = $Programs->fetch_assoc()) { 
                if($row['program_status']==1){
                  $status = "Active";
                }else{
                  $status = "Inactive";
                }?>
                <tr>
                  <td><?php echo $row['program_name']; ?></td>
                  <td><?php echo $row['f_name']; ?></td>
                  <td><?php echo $row['d_name']; ?></td>
                  <td><?php echo $status; ?></td>
                  <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
          <?php  }
        }
      ?>
  </tbody>
</table>
      </div>
    </div>


</div>
</div>