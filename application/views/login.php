<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
        color: #e63316;
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

              <?php $message = $this->message_stack->message('message'); ?>
              <?php if($message != "") : ?>
                <div class="SuccessMsg" style="font-size:12px; text-align:center; position:absolute; left: 26%; float:none;margin-top: 16px;"><?= $message ?></div>
              <?php endif; ?> 

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="<?php echo base_url() ?>index.php/admin/login" method="POST" id="add_login">
                  <div class="form-group">
                    <label>Username or Email *</label>
                    <input type="text" class="form-control p_input" name="email" id="email" placeholder="Enter Username or Email Here" required autocomplete="off" value="mamata.lahane@gmail.com">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password" id="password" placeholder="Enter password Here" required autocomplete="off" value="Test@1234">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="<?php echo base_url(); ?>index.php/admin/register"> Sign Up</a></p>
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
      $("#add_register").validate({
        rules:{
          email:{
            required:true,
            maxlength: 50,
            email: true
          },
          password:{
            minlength: 8,
            maxlength: 30,
            required: true
          }
        },
        messages:{          
          email:{
            required: "<span style='color:red;'>Please enter valid email</span>",
            email: "<span style='color:red;'>Please enter valid email</span>",
            maxlength: "<span style='color:red;'>The email name should less than or equal to 50 characters</span>",
          },
          password:{
            required: "<span style='color:red;'>Please enter valid password here</span>"
          }
        }     
      });
    </script>
  </body>
</html>