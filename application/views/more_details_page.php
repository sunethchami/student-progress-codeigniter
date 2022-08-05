<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Students Progress System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- Custom css -->
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url() ?>assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Students Progress
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
     <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo site_url(); ?>StudentDetailsCon/index">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li <?php if($page == "search"){echo "class='active'";}?>>
            <a href="<?php echo site_url(); ?>StudentDetailsCon/showSearchPage">
              <i class="nc-icon nc-zoom-split"></i>
              <p>Search</p>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url(); ?>StudentDetailsCon/showAddNewRecordsPage">
              <i class="nc-icon nc-simple-add"></i>
              <p>Add New Records</p>
            </a>
          </li>
          <li <?php if($page == "all"){echo "class='active'";}?>>
            <a href="<?php echo site_url(); ?>StudentDetailsCon/showAllRecordsPage">
              <i class="nc-icon nc-badge"></i>
              <p>View All Records</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">More details</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">             
              <li class="nav-item">
                <a class="logout" href="<?php echo site_url(); ?>HomeCon/logOut">Log Out</a> 
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Student Marks for a Term</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead hidden>
                         <tr>
                         <th></th>
                         <th></th>
                         </tr>
                      </thead>
                    <tbody>
                      <?php                       
                        
                            echo'<tr>';
                            echo'<td><b>'. "Reg No" . '<b></td>';
                            echo'<td>' . $result["reg_no"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Name" . '<b></td>';
                            echo'<td>' . $result["name"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Combined Maths" . '<b></td>';
                            echo'<td>' . $result["combined_maths"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Physics" . '<b></td>';
                            echo'<td>' . $result["physics"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Chemistry" . '<b></td>';
                            echo'<td>' . $result["chemistry"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Average Mark" . '<b></td>';
                            echo'<td>' . $result["avg_mark_student"]. '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "First Place Average Mark" . '<b></td>';
                            echo'<td>' . $result["avg_mark_first_place"] . '</td>';
                            echo'</tr>';
                            echo'<tr>';
                            echo'<td><b>'. "Total Number of Students" . '<b></td>';
                            echo'<td>' . $result["total_students"] . '</td>';
                            echo'</tr>';                                                                                                            
                        
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Created by Suneth Senanayake.
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url() ?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() ?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
        
        $('.deleteBtn').click(function(){
            var ID = $(this).data('id');
            //set the data attribute on the modal button
            $('#yesBtn').data('id', ID); 
          });
        
        

        $('#yesBtn').click(function(){
            var studentId = $(this).data('id');
            window.location = "<?php echo site_url(); ?>/StudentDetailsCon/deleteRecord/"+studentId;
      });
    })
  </script>
  
  
  
</body>

</html>