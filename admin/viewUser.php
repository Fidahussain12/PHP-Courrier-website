<?php require('db_connection.php'); ?>


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
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View User</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
                <br>
                <?php 
                    if(isset($_GET['msg'])){
                        echo "<p>".$_GET['msg']."</p>";
                    }
                ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <t>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Branch</th>
                    <th>User Role</th>
                    <th>Addded By</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query="SELECT users.*,branches.branch as BranchName, b.user_name AS added_by_user FROM users LEFT JOIN branches ON users.branch = branches.id LEFT JOIN users b ON users.added_by = b.id";
                    $result = mysqli_query($connection,$query);
                    if($result->num_rows){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                   <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['user_name']?></td>
                                        <td><?php echo $row['user_email']?></td>
                                        <td><?php echo $row['BranchName']?></td>
                                        <?php 
                                            if($row['user_role']==1){
                                                $status="Admin";
                                            }else if($row['user_role']==2){
                                                $status="Agent";
                                            }

                                                ?>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo $row['added_by_user']?></td>
                                        
                                        <td><?php echo date('d-m-Y | h:i:s',strtotime($row['created_at']));?></td>
                                        <td><a href="deleteUser.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>  <a href="editUser.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
                                   </tr>
                
                            <?php
                            //print_r($row);
                        }
                    }
                    
                  ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
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

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>