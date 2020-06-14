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
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <?php
                $sql = "SELECT count(id) AS 'Pending' FROM events WHERE event_status = 'Pending'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                ?>
                <span class="badge badge-danger badge-counter"><?php echo $row['Pending']; ?></span>
                <?php
                }
                ?>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pending Bookings
                </h6>
                <?php
                $sql = "SELECT * FROM events WHERE event_status = 'Pending' ORDER BY ID DESC LIMIT 5";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result))
                {
                ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fa fa-flag text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">You have a new pending event !</div>
                    <span class="font-weight-bold">Event: <u><?php echo strtoupper($row['event_type']);?></u> <br> Start Date: <?php echo $row['event_date']; ?></span>
                  </div>
                </a>
                <?php
                }
                ?>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">2</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                      having.</div>
                    <div class="small text-gray-500">Udin Cilok · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-default"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
                      say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Jaenab · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username']; ?></span>
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Finished Events</div>
                      <?php
                      $sql = "SELECT count(id) AS 'Finished' FROM events WHERE event_status = 'Finished'";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result))
                      {
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['Finished']; ?></div>
                      <?php
                      }
                      ?>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Events</div>
                      <?php
                      $sql = "SELECT count(*) AS 'total' FROM events";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result))
                      {
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      <?php
                      }
                      ?>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Since last years</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-handshake fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Registered Users</div>
                      <?php
                      $sql = "SELECT count(id) AS 'Registered' FROM accounts WHERE type = 'user'";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result))
                      {
                      ?>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row['Registered']; ?></div>
                      <?php
                      }
                      ?>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Bookings</div>
                      <?php
                      $sql = "SELECT count(id) AS 'Pending' FROM events WHERE event_status = 'Pending'";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result))
                      {
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['Pending']; ?></div>
                      <?php
                      }
                      ?>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>EVENT</th>
                        <th>DATE</th>
                        <th>CLIENT</th>
                        <th>CONTACT</th>
                        <th>CARD NUMBER</th>
                        <th>CVV</th>
                        <th>EXPIRY</th>
                        <th>STATUS</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM events ORDER BY id DESC";
                      $result = mysqli_query($db, $sql);
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
                        <td><?php echo $row['card_number']; ?></td>
                        <td><?php echo $row['card_cvv']; ?></td>
                        <td><?php echo $row['card_expiry']; ?></td>
                        <td class="alert alert-warning" role="alert"><b><?php echo strtoupper($row['event_status']); ?></b></td>
                        <td>
                          <button type="submit" class="btn btn-primary del_modal_view" id="<?php echo $row["id"]; ?>"><i class="fa fa-cog"></i></button>
                        </td>
                      </tr>
                      <?php
                        }
                        else if($row['event_status'] == 'Approved')
                        {
                      ?>
                      <tr>
                        <td><?php echo $row['event_type']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_client']; ?></td>
                        <td><?php echo $row['event_contact']; ?></td>
                        <td><?php echo $row['card_number']; ?></td>
                        <td><?php echo $row['card_cvv']; ?></td>
                        <td><?php echo $row['card_expiry']; ?></td>
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
                   <h5 class="modal-title" id="exampleModalLabel">Approve your Booking?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                   </button>
                 </div>
                 <form method="POST">
                 <div class="modal-body" id="del_details">
                 </div>
                 <div class="modal-body">Do you wish to approved this booking?</div>
                 <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <input type="submit" value="YES" class="btn btn-success" name="approve_booking"></a>
                 </form>
                 </div>
            </div>
       </div>
  </div>
  <script>
  $(document).ready(function(){
       $('.del_modal_view').click(function(){
            var approve_id = $(this).attr("id");
            $.ajax({
                 url:"../codes.php",
                 method:"post",
                 data:{approve_id:approve_id},
                 success:function(data){
                      $('#del_details').html(data);
                      $('#del_modal').modal("show");
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
