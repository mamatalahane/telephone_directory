<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />

    <style type="text/css">
      .message{
        position: absolute;
        font-weight: bold;
        font-size: 20px;
        color: #19e616;
        left: 58px;
        width: 500px;
        text-align: left;
        margin-top: 7px;
      }
    </style>

    
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <?php
                if (isset($message_display)) {
                  echo "<div class='message'>";
                  echo $message_display;
                  echo "</div>";
                }
              ?> 
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form action="<?php echo base_url() ?>index.php/admin/register" method="POST" id="add_register">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control p_input" name="first_name" id="first_name" placeholder="Enter First Name Here" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control p_input" name="last_name" id="last_name" placeholder="Enter Last Name Here" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email" id="email" placeholder="Enter Email Here" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password" id="password" placeholder="Enter Password Here" required autocomplete="off">                    
                  </div>
                  <!-- <span class="glyphicon form-control-feedback" id="password_reg1"></span> -->

                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control p_input" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password Here" required autocomplete="off">
                  </div>

                  <!-- <span class="glyphicon form-control-feedback" id="confirmPassword1"></span> -->

                  <!-- <span class="registrationFormAlert" id="CheckPasswordMatch" style="color:green;"></span> -->

                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <!-- <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> -->
                  <p class="sign-up text-center">Already have an Account?<a href="<?php echo base_url() ?>index.php/admin/login"> Sign In</a></p>
                  <!-- <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p> -->
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/vendors/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/misc.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/settings.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/todolist.js"></script>
    <!-- endinject -->

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript">
      // $(document).ready(function() {
      //    $("#confirm_password").keyup(checkPasswordMatch);      
      // });

      
      var value = $("#password").val();

      $.validator.addMethod("checklower", function(value) {
        return /[a-z]/.test(value);
      });
      $.validator.addMethod("checkupper", function(value) {
        return /[A-Z]/.test(value);
      });
      $.validator.addMethod("checkdigit", function(value) {
        return /[0-9]/.test(value);
      });
      $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
      });

      $("#add_register").validate({
        rules:{
          first_name:{
            required:true,
            maxlength: 50
          },
          last_name:{
            required:true,
            maxlength: 50
          },
          email:{
            required:true,
            maxlength: 50,
            email: true
          },
          password:{
            minlength: 8,
            maxlength: 30,
            required: true,
            //pwcheck: true,
            checklower: true,
            checkupper: true,
            checkdigit: true
          },
          confirm_password:{
            equalTo: "#password",
          }
        },
        messages:{
          first_name:{
            required: "<span style='color:red;'>Please enter first name</span>",
            maxlength: "<span style='color:red;'>Your first name maxlength should be 50 characters long.</span>"  
          },
          last_name:{
            required: "<span style='color:red;'>Please enter last name</span>",
            maxlength: "<span style='color:red;'>Your last name maxlength should be 50 characters long.</span>"
          },
          email:{
            required: "<span style='color:red;'>Please enter valid email</span>",
            email: "<span style='color:red;'>Please enter valid email</span>",
            maxlength: "<span style='color:red;'>The email name should less than or equal to 50 characters</span>",
          },
          password:{
            required: "<span style='color:red;'>Please enter password here</span>",
            pwcheck: "<span style='color:red;'>Password is not strong enough</span>",
            checklower: "<span style='color:red;'>Need atleast 1 lowercase alphabet</span>",
            checkupper: "<span style='color:red;'>Need atleast 1 uppercase alphabet</span>",
            checkdigit: "<span style='color:red;'>Need atleast 1 digit</span>"
          }
        }  
      });

      

      function checkPasswordMatch() {
          var password = $("#password").val();
          var confirmPassword = $("#confirm_password").val();
          if (password != confirmPassword)
              $("#CheckPasswordMatch").html("Passwords does not match!");
          else
              $("#CheckPasswordMatch").html("Passwords match.");
      }
    </script>
  </body>
</html>