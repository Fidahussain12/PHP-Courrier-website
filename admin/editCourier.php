<?php   
    require('db_connection.php');
    if($connection){
       $query = "SELECT * FROM shipment WHERE ship_id=".$_GET['id'];
       $result = mysqli_query($connection, $query);
       if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
       }
    }


?>


<?php include('common/header.php'); ?>
  <!-- Navbar -->
  <?php include('common/navbar.php'); ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Courier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Courier</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Information</h3>
                <br>
                <?php 
                    if(isset($_GET['msg'])){
                        echo "<p>".$_GET['msg']."</p>";
                    }
                ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="updateCourierProcess.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Sender Name</label>
                    <input type="hidden" name="ship_id" value="<?php echo $row['ship_id'];?>">
                    <input type="text" class="form-control" id="send_name" name="send_name" placeholder="Sender Name" required value="<?php echo $row['send_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="title">Sender Address</label>
                    <input type="text" class="form-control" id="send_address" name="send_address" placeholder="Sender Address" required value="<?php echo $row['send_address'];?>">
                  </div>
                  <div class="form-group">
                    <label for="title">Reciever Name</label>
                    <input type="text" class="form-control" id="recv_name" name="recv_name" placeholder="Reciever Name" required value="<?php echo $row['recv_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="title">Reciever Address</label>
                    <input type="text" class="form-control" id="recv_address" name="recv_address" placeholder="Reciever Address" required value="<?php echo $row['recv_address'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('common/footer.php'); ?>