<?php include_once 'db_initiate.php'; ?>
<?php include_once 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><h4><?php echo $SurveyName ;?></h4></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview active">
          <a href="#"><i class="fa fa-link"></i> <span>First Stage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="starter.php">Pilih Kuesioner</a></li>
            <li><a href="setting.php">Pilih Metode Sampling</a></li>
            <li><a href="setting.php">Pengaturan Sampling</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        First Stage
        <small></small>
      </h1>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <form action="uploadframe.php" method="post" enctype="multipart/form-data">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Pemilihan Kuesioner</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                  <label for="sel-kuesioner-listing">Pilih Kuesioner Listing</label>
                  <select name="sel-kuesioner-listing" class="form-control select" required style="width: 100%;">
                    <option disabled selected value> -- select an option -- </option>
                    <?php include 'list_kues.php' ?>
                  </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                  <label for="sel-kuesioner-cacah">Pilih Kuesioner Pencacahan</label>
                  <select name="sel-kuesioner-cacah" class="form-control select" required style="width: 100%;">
                    <option disabled selected value> -- select an option -- </option>
                    <?php include 'list_kues.php' ?>
                  </select>
              </div>
            </div>
            <hr>
            <div class="row" id="rowsubmit">
              <div class="col-md-4">
                  <input type="submit" value="Submit" name="submit">
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    $(document).ready(function() {       
    });
  </script>
  <!-- /.content-wrapper -->
<?php include_once 'footer.php'; ?>

