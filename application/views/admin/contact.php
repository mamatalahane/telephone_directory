<?php include ADMIN_INCLUDES_PATH . "header.php"?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Add New Contact</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="<?php echo base_url().'index.php/admin/dashboard'; ?>">Home</a></li>
	              <li class="breadcrumb-item active">Dashboard</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->


	<section class="content" style="background-color: #fff;">



    <?php //echo '<pre>'; print_r($details);  

        $id = $fname = $mname = $lname = $email = $mobile = $landline = $notes = $path = '';

        if(count($details) > 0) {
            $id = $details[0]->id;
            $fname = isset($details[0]->fname) ? $details[0]->fname : '';
            $mname = isset($details[0]->mname) ? $details[0]->mname : '';
            $lname = isset($details[0]->lname) ? $details[0]->lname : '';
            $email = isset($details[0]->email) ? $details[0]->email : '';
            $mobile = isset($details[0]->mobile) ? $details[0]->mobile : '';
            $landline = isset($details[0]->landline) ? $details[0]->landline : '';
            $notes = isset($details[0]->notes) ? $details[0]->notes : '';
            $path = isset($details[0]->photo) ? $details[0]->photo : '';
        }

      //echo $_SERVER['DOCUMENT_ROOT'];

    ?>

      <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10">

          </br>
          <span style="color:red;"><?php echo validation_errors(); ?></span>
              
            <div class="box box-primary">
              <div class="box-header with-border">
                
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="add" method="post" enctype="multipart/form-data" onsubmit="checksize()">

                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">

                <div class="box-body">
                  <div class="form-group">
                    <label for="fname">First Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>">
                  </div>
                  <div class="form-group">
                    <label for="mname">Middle Name</label>
                    <input type="text" class="form-control" name="mname" id="mname" placeholder="Enter Middle Name" value="<?php echo $mname; ?>">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name<span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>">
                  </div>

                  <div class="form-group">
                    <label for="txtemail">Email</label>
                    <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Enter email" value="<?php echo $email; ?>">
                  </div>

                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="<?php echo $mobile; ?>">
                  </div>

                  <div class="form-group">
                    <label for="landline">Landline</label>
                    <input type="text" class="form-control" name="landline" id="landline" placeholder="Enter landline" value="<?php echo $landline; ?>">
                  </div>

                  <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" placeholder="Enter Notes"><?php echo $notes; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="photo">Profile Photo (Maximum 500kb)</label>
                    <input type="file" id="photo" name="photo" accept="image/x-png,image/gif,image/jpeg">
                    <input type="hidden" name="old_photo" value="<?php echo $path; ?>">
                    <span id="photo_error" style="color: red;"></span>
                    <?php 
                      if(!empty($path)) { 
                          $photo = !empty($path) ? base_url().$path : '';
                    ?>
                      <div class="photo" style="background-image: url('<?php echo $photo; ?>'); background-size: cover;"></div>
                    <?php } ?>
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
              </form>
            </div>
             </br>
        </div>

        <div class="col-md-1"></div>
        <!-- /.col -->
        
      </div>
        <!-- /.box-body -->
  </section>
















	</div>
<?php include ADMIN_INCLUDES_PATH . "footer.php"?>


  <style type="text/css">
    .photo {
      height: 150px;
      width: 150px;
      border: 2px solid #ececec;
      border-radius: 70px;
    }

  </style>
