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
            <h1>Courier List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Courier</li>
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
                <h3 class="card-title">Courier Details</h3>
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
                    <th>Shipment Id</th>
                    <th>Sender Name</th>
                    <th>Sender Address</th>
                    <th>Reciever Name</th>
                    <th>Reciever Address</th>
                    <th>Addded By</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query="SELECT shipment.*,users.user_name FROM shipment LEFT JOIN users ON shipment.added_by = users.id";
                    $result = mysqli_query($connection,$query);
                    if($result->num_rows){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                   <tr>
                                        <td><?php echo $row['ship_id']?></td>
                                        <td><?php echo $row['send_name']?></td>
                                        <td><?php echo $row['send_address']?></td>
                                        <td><?php echo $row['recv_name']?></td>
                                        <td><?php echo $row['recv_address']?></td>
                                        <td><?php echo $row['user_name']?></td>
                                        <?php 
                                            if($row['ship_status']==0){
                                                $status="Pending";
                                            }else if($row['ship_status']==1){
                                                $status="On The Way";
                                            }else if($row['ship_status']==2){
                                                $status="Delivered";
                                            }

                                                ?>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo date('d-m-Y | h:i:s',strtotime($row['created_at']));?></td>
                                        <td><a href="deleteCourier.php?id=<?php echo $row['ship_id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>  <a href="editCourier.php?id=<?php echo $row['ship_id']?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
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