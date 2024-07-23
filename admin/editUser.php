<?php   
    require('db_connection.php');
    if($connection){
       $query = "SELECT * FROM users WHERE id=".$_GET['id'];
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
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
              <form action="updateUserProcess.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">

                <div class="card-body">
                  <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" required value="<?php echo $row['user_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="user_email">Email Address</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email Address" required value="<?php echo $row['user_email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="title">Password</label>
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required value="<?php echo $row['user_password'];?>">
                  </div>
                    <div class="form-group">
                        <label for="title">User Role</label>
                        <select name="user_role" id="user_role" class="form-control">
                            <option value="">Select user Role</option>
                            <option value="1" <?php if($row['user_role'] == 1){ echo "selected";}?>>Admin</option>
                            <option value="2" <?php if($row['user_role'] == 2){ echo "selected";}?>>Agent</option>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="title">Branch</label>
                        <select name="branch" id="branch" class="form-control">
                            <option value="">Select Branch</option>
                            <?php  
                                $query="SELECT * FROM branches";
                                $result=mysqli_query($connection,$query);
                                if($result->num_rows > 0){
                                    while($row2=mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $row2['id'];?>" <?php if($row2['id'] == $row['branch']){ echo "selected";}?>><?php echo $row2['branch'];?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>    
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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