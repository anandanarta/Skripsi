<?php include_once 'table_initiate_pps.php'; ?>
<?php include_once 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><h4>SUSENAS 2017</h4></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview active">
          <a href="#"><i class="fa fa-link"></i> <span>First Stage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="starter.php">Input Frame</a></li>
            <li class="active"><a href="setting.php">Pengaturan Sampling</a></li>
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
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Pengaturan Sampling</h3>
        </div>
        <div class="box-body">
          <button class="showdata">Tampilkan Data</button><br><br>
          <form method="POST" action="uploadpreferences.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sel-type">Pilih Tipe PPS</label>
                  <select id="sel-type" name="sel-type" required class="form-control select" style="width: 100%;" required>
                    <option disabled selected value> -- select an option -- </option>
                    <option value="0" id="PPS-WOR">PPS-WOR</option>
                    <option value="1" id="PPS-WR">PPS-WR</option>
                  </select>
                  <label for="sel-alocation">Pilih Tipe Alokasi</label>
                  <select id="sel-alocation" name="sel-alocation" required class="form-control select" style="width: 100%;" required>
                    <option disabled selected value> -- select an option -- </option>
                    <option value="0" id="equal-size">Equal Size</option>
                    <option value="1" id="unequal-size">Unequal Size</option>
                  </select>
                  <div id="0">
                    <label for="total-sampel">Masukan Jumlah Sampel</label><br>
                    <input id="total-sampel" name="total-sampel" type="number" min="1" step="1" style="width: 100%;">
                  </div>
                  <div id="1">
                    <label for="upload-alokasi">Masukan Alokasi Sampling</label>
                    <input id="upload-alokasi" type="file" name="framealokasi">
                  </div>            
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <label for="sel-id">Pilih Variabel ID</label>
                <select id="sel-id" name="sel-id" required class="form-control select" style="width: 100%;" required>
                  <option disabled selected value> -- select an option -- </option>
                  <?php include 'list_kolom_select.php' ?>
                </select>
                <label for="sel-size">Pilih Variabel Ukuran</label>
                <select id="sel-size" name="sel-size" class="form-control select" style="width: 100%;" required>
                  <option disabled selected value> -- select an option -- </option>
                  <?php include 'list_kolom2_select.php' ?>
                </select>
              </div>
            </div>
            <hr>
            <div ckass="row">
              <div>
                <input type="submit" value="Submit" name="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" style="margin-top: 150px">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih petugas untuk bloksensus ini</h4>
        </div>
        <form action="input.php" method="POST">
        <div class="modal-body">
          <p>
            <div class="form-group">
            
          <label for="sel1">Blok Sensus:</label>
          <input type="text" name="nonks" id="text1">
          <select name="fname" class="form-control" id="sel1">
            <?php include 'connlist.php' ?>
          </select>
        </div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-success" value="Simpan" >
        </div>
        </form>
      </div>

    </div>
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
      $(document).ready(function() {
        $('#0').hide();
        $('#1').hide();
        $('.showdata').click(function(event) {
          $('#myModal').modal();
          event.preventDefault();
        });
        $('#sel-alocation').change(function(){
          $('#0').hide();
          $('#1').hide();
          var s = $('#sel-alocation').val();
          console.log(s);
          $('#' + $(this).val()).show();
        });
        var s;  
        $('#sel-id').change(function(){
          $('#' + s +"2").show();
          console.log(s);
          $('#' + $(this).val()+"2").hide();
          s = $('#sel-id').val();
        });
      });
  </script>
<?php include_once 'footer.php'; ?>

