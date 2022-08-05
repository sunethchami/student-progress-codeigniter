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
  <!-- Data tables -->
  <link href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" />
  <!-- Custom css -->
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" />
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
          <li <?php if($page == "search"){echo "class='active'";} ?>>
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
          <li <?php if($page == "all"){echo "class='active'";} ?>>
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
            <a class="navbar-brand" href="javascript:;"><?php if($page == "all"){echo "View All Records";}else{echo "View Search Result";} ?></a>
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
                <h4 class="card-title"> Students Marks for a Term</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display" id="allTable">
                    <thead class=" text-primary">
                      <th>Reg No</th>
                      <th>Name</th>
                      <th class="th-mark">Combined Maths</th>
                      <th class="th-mark">Physics</th>
                      <th class="th-mark">Chemistry</th>
                      <th class="th-action">Actions</th>
                    </thead>
                    <tbody>
                     <?php
                        foreach ($result as $row) {
                            echo'<tr>';
                            echo'<td>' . $row['reg_no'] . '</td>';
                            echo'<td>' . $row['name'] . '</td>';
                            echo'<td class="td-mark">' . $row['combined_maths'] . '</td>';
                            echo'<td class="td-mark">' . $row['physics'] . '</td>';
                            echo'<td class="td-mark">' . $row['chemistry'] . '</td>'; 
                            echo'<td class="td-action"><p class="table-button"><a href="' . site_url() . 'StudentDetailsCon/moreDetails/' . $row['id'] . '/'.$page.'"><img src="'. base_url() .'assets/icons/info-circle.svg" width="32" height="32" title="More Details"></a></p><p class="table-button"><a href="' . site_url() . 'StudentDetailsCon/editRecord/' . $row['id'] . '/'. $page.'"><img src="'. base_url() .'assets/icons/pencil-square.svg" width="32" height="32" title="Edit"></a></p><p class="table-button"><a href="#" data-id="' . $row['id'] . '" data-toggle="modal" class="deleteBtn" data-target="#comfirmModal"><img src="'. base_url() .'assets/icons/trash.svg" width="32" height="32" title ="Delete"></a></p></td>';
                            echo'</tr>';
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="comfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete a Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             Are you sure, do you want to delete this record?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="yesBtn">Yes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>              
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
  <!-- Data tables -->
  <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
        
        $('.deleteBtn').click(function(){
            var ID = $(this).data('id');
            //set the data attribute on the modal button
            $('#yesBtn').data('id', ID); 
          });
        
        var page = "<?php echo $page; ?>";

        $('#yesBtn').click(function(){
            var studentId = $(this).data('id');
            window.location = "<?php echo site_url(); ?>StudentDetailsCon/deleteRecord/"+studentId+"/"+page;
      });
      
      $('#allTable').DataTable();
      
    });
    
     window.onload = function() {
        
    <?php if (isset($message)) { ?>
        <?php if ($message == 1) { ?>
                
            var color = 'success'; 
            var icon = 'nc-icon nc-check-2';
            var msg = 'The record has been updated successfully.'  
            
        <?php  }  ?>
            
        <?php if ($message == 2) { ?>
                
            var color = 'success'; 
            var icon = 'nc-icon nc-check-2';
            var msg = 'The record has been deleted successfully.'  
            
        <?php  }  ?>

        $.notify({
            icon: icon,
            message: msg

        }, {
            type: color,
            timer: 1000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
     
     <?php  }  ?>
    }
  </script>
  
  
  
</body>

</html>