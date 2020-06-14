<?php
include("../codes.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Beverly Event Management</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="js/2.js"></script>
  <script src="js/3.js"></script>
  <script src="js/1.js"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Beverlys Event</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Welcome ! <br><?php echo strtoupper($_SESSION['full_name']); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST">
                <button class="dropdown-item" name="logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </button>
                </form>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Your Bookings</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Your Bookings</li>
            </ol>
          </div>

          <div class="row mb-3">

            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive p-3">
                  <div align="right">
                    <a class="btn btn-primary" href="../index.php">ADD BOOKING</a>
                  </div>
                  <br>
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>EVENT</th>
                        <th>DATE</th>
                        <th>CLIENT</th>
                        <th>CONTACT</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM events WHERE uid = '".$_SESSION['user_id']."' ORDER BY id DESC";
                      $result = mysqli_query($db, $sql);
                      //var_dump($sql);
                      //var_dump($result);
                      while($row = mysqli_fetch_array($result))
                      {
                        if($row['event_status'] == 'Pending')
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['event_type']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_client']; ?></td>
                        <td><?php echo $row['event_contact']; ?></td>
                        <td class="alert alert-warning" role="alert"><b><?php echo strtoupper($row['event_status']); ?></b></td>
                        <td>
                          <button class="btn btn-primary res_view" name="reserve_id" id="<?php echo $row['id']; ?>"><i class="fa fa-credit-card"></i></button>
                          <button type="submit" class="btn btn-danger del_modal_view" id="<?php echo $row["id"]; ?>"><i class="fa fa-times"></i></button>
                        </td>
                      </tr>
                      <?php
                        }
                        else if($row['event_status'] == 'Confirmed')
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['event_type']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_client']; ?></td>
                        <td><?php echo $row['event_contact']; ?></td>
                        <td class="alert alert-info" role="alert"><b><?php echo strtoupper($row['event_status']); ?></b></td>
                        <td>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div id="del_modal" class="modal fade">
       <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Cancel your event?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                   </button>
                 </div>
                 <form method="POST">
                 <div class="modal-body" id="del_details">
                 </div>
                 <div class="modal-body"><b><u><font color="red">REMINDER:</font></b></u><br>Canceling your booking is permanent action.<br><br><b><u><i><br></b></u></i></div>
                 <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <input type="submit" value="CANCEL" class="btn btn-danger" name="cancel_book"></a>
                 </form>
                 </div>
            </div>
       </div>
  </div>
  <script>
  $(document).ready(function(){
       $('.del_modal_view').click(function(){
            var del_id = $(this).attr("id");
            $.ajax({
                 url:"../codes.php",
                 method:"post",
                 data:{del_id:del_id},
                 success:function(data){
                      $('#del_details').html(data);
                      $('#del_modal').modal("show");
                 }
            });
       });
  });
  </script>

  <div id="res_modal" class="modal fade">
       <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                   </button>
                 </div>
                 <form method="POST">
                 <div class="modal-body" id="res_details">
                 </div>
                 <div class="modal-body">
                 <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <input type="submit" value="Reserve" class="btn btn-primary" name="reserve"></a>
                 </form>
                 </div>
            </div>
       </div>
  </div>
  <script>
  $(document).ready(function(){
       $('.res_view').click(function(){
            var res_id = $(this).attr("id");
            $.ajax({
                 url:"../codes.php",
                 method:"post",
                 data:{res_id:res_id},
                 success:function(data){
                      $('#res_details').html(data);
                      $('#res_modal').modal("show");
                 }
            });
       });
  });
  </script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->

  <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pending", "Confirmed", "Finished"],
        datasets: [{
          <?php
          $sql = "SELECT count(*) AS total, sum(case when event_status = 'Pending' then 1 else 0 end) AS Pending, sum(case when event_status = 'Confirmed' then 1 else 0 end) AS Confirmed FROM events";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result))
          {
          ?>
          data: [<?php echo $row['Pending']; ?>, <?php echo $row['Confirmed']; ?>, 0],
          <?php
          }
          ?>
          backgroundColor: ['#fcc169', '#46b3e6', '#36b9cc'],
          hoverBackgroundColor: ['#fcc169', '#46b3e6', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    $('#dataTable').dataTable( {
      "pageLength": 3
    });
  </script>


</body>

</html>
