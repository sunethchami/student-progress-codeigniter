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

<body class="" >
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
          <li>
            <a href="<?php echo site_url(); ?>StudentDetailsCon/showSearchPage">
              <i class="nc-icon nc-zoom-split"></i>
              <p>Search</p>
            </a>
          </li>
          <li class="active">
            <a href="<?php echo site_url(); ?>StudentDetailsCon/showAddNewRecordsPage">
              <i class="nc-icon nc-simple-add"></i>
              <p>Add New Records</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="javascript:;">Add New Records</a>
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
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Student Marks for a Term</h5>
              </div>
              <div class="card-body">
                <form id="add_new_records_form" method="post" action="<?php echo site_url(); ?>StudentDetailsCon/setNewRecords">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Reg No</label>
                        <input type="number" name="reg_no" class="form-control" value="<?php echo set_value('reg_no'); ?>">
                        <span><?php echo form_error('reg_no'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                          <label>Name<span> *</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                        <span><?php echo form_error('name'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                        <label>Combined Maths<span> *</span></label>
                        <input type="number" name="combined_maths" class="form-control" value="<?php echo set_value('combined_maths'); ?>">
                        <span><?php echo form_error('combined_maths'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                        <label>Physics<span> *</span></label>
                        <input type="number" name="physics" class="form-control" value="<?php echo set_value('physics'); ?>">
                        <span><?php echo form_error('physics'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class=" col-md-6 pr-1">
                      <div class="form-group">
                        <label>Chemistry<span> *</span></label>
                        <input type="number" name="chemistry" class="form-control" value="<?php echo set_value('chemistry'); ?>">
                        <span><?php echo form_error('chemistry'); ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update">
                      <button type="submit" class="btn btn-primary btn-round btn-submit">Save Record</button>
                    </div>
                  </div>
                </form>
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
    <!--  Notifications Plugin    -->
  <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() ?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script>
    window.onload = function() {
        
    <?php if (isset($message)) { ?>
        <?php if ($message == 1) { ?>
                
            var color = 'success'; 
            var icon = 'nc-icon nc-check-2';
            var msg = 'New record has been added successfully.'  
            
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