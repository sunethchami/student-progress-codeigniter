<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Students Progress System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <input id="site_path" type="hidden" value="<?php echo site_url(); ?>" >
                <?php echo form_open('LoginCon/saveSignUpData',array('class'=> "login100-form validate-form flex-sb flex-w")); ?>
                
                    <span class="login100-form-title p-b-32">
                        Sign Up
                    </span>
                
                    <span class="txt1 p-b-11">
                        Username
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Username is required">
                        <input id="username" onchange="check_user_exist()" class="input100" type="text" value="<?php echo set_value('username'); ?>" name="username" >
                        <span class="focus-input100"></span>
                    </div>
                   <span id="uname" ></span>
                   <span><?php echo form_error('username'); ?></span>

                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">                        
                        <input class="input100" id="password" type="password" name="password" >
                        <span class="focus-input100"></span>                        
                    </div>
                    <span id="pw"></span>
                    
                    
                    <span class="txt1 p-b-11">
                        Re-enter Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                        <input class="input100" id="repassword"onchange="validate_password()" type="password" name="re-password" >
                        <span class="focus-input100"></span>
                    </div>
               
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
	

    <div id="dropDownSelect1"></div>
        
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/login/js/main.js"></script>
        <script>
        function validate_password() {
            var pw = document.getElementsByName("password")[0].value;
            var repw = document.getElementsByName("re-password")[0].value;
            
            if (pw != repw) {
                document.getElementById("pw").innerHTML = "Passwords did not match!";
                document.getElementById("password").focus();
                document.getElementById('password').value='';
                document.getElementById('repassword').value='';
            }else{
                document.getElementById("pw").innerHTML = "";
            }
        }
        
        function check_user_exist() {
            var site_path = $('#site_path').val();
            var username = $("#username").val();
            
            $.ajax({
                type: "POST",
                url: site_path + "LoginCon/checkUsername",
                data: {target: username},
                success: function(json_data){
                    var output = $.parseJSON(json_data);
                    
                    if (output == false) {
                        document.getElementById("uname").innerHTML = "Username already exist. Enter different username.";
                        document.getElementById("username").focus();
                    }else {
                            document.getElementById("uname").innerHTML = "This username is available.";
                    }
                },
                error: function() {
                    alert("There was an error. Try again please!");
                }

            });
        }
        </script>

</body>
</html>