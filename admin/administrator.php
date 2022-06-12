<?php include("config.php"); ?>
<?php session(); ?>
<?php if(!isset($_SESSION['admin_id'])){ header('Location: index.php'); } ?>
<?php include("includes/inc.header.php"); ?>


	 <?php include("includes/inc.topbar.php"); ?>
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
    <?php include("includes/inc.left-sidebar.php"); ?>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <?php 
          if(isset($_GET['menu']) and isset($_GET['action'])){
          			$menu=$_GET['menu'];
                    $action=$_GET['action'];
          		include("modules/".$menu."/".$action.".php");
          }else{
                include("modules/dashboard/dashboard.php");
          }
     	?>
<?php include("includes/inc.footer.php"); ?>