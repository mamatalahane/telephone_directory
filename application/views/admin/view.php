<?php include ADMIN_INCLUDES_PATH . "header.php"?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Contact Details</h1>
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


    <?php //echo '<pre>'; print_r($details); 

        $photo = isset($details[0]->photo) ? $details[0]->photo : '';
        $photo = !empty($photo) ? base_url().$photo : '';
        $name = isset($details[0]->name) ? $details[0]->name : '';
        $email = isset($details[0]->email) ? $details[0]->email : ' - ';
        $mobile = isset($details[0]->mobile) ? $details[0]->mobile : ' - ';
        $landline = isset($details[0]->landline) ? $details[0]->landline : ' - ';
        $notes = isset($details[0]->notes) ? $details[0]->notes : ' - ';
        $created_on = isset($details[0]->created_on) ? date('d M Y h:i A', strtotime($details[0]->created_on)) : '';
        $createdby = UtilityHelper::get_dropdown_value('users', 'user_id', 'CONCAT(first_name," ",last_name)', $details[0]->created_by);
        $updated_on = ($details[0]->updated_on != '0000-00-00 00:00:00') ? date('d M Y h:i A', strtotime($details[0]->updated_on)) : '';
        $updated_by = '';
        if($details[0]->updated_by != 0) {
          $updatedby = UtilityHelper::get_dropdown_value('users', 'user_id', 'CONCAT(first_name," ",last_name)', $details[0]->updated_by);
          $updated_by = $updatedby[$details[0]->updated_by];
        }

        $view = isset($details[0]->view) ? $details[0]->view : '';


    ?>



	<section class="content" style="background-color: #fff;">

      </br>
      </br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <center>
            <div class="photo" style="background-image: url('<?php echo $photo; ?>'); background-size: cover;"></div><br>
            <span class="heroname"><?php echo $name; ?></span>
          </center>
        </div>
        <div class="col-md-1"></div>
        <!-- /.col -->
      </div><br>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <table class="table table-striped">
            <tr>
                <th scope="col" width="30%">Name</th>
                <td scope="col"><?php echo $name; ?>
                  
                <input type="button" class="btn btn-danger btn-sm" value="<?php echo $view; ?> Views" style="float: right;">
                </td>
            </tr>
            <tr>
                <th scope="col" width="30%">Email</th>
                <td scope="col"><?php echo $email; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Mobile Number</th>
                <td scope="col"><?php echo $mobile; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Landline</th>
                <td scope="col"><?php echo $landline; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Notes</th>
                <td scope="col"><?php echo $notes; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Created Date</th>
                <td scope="col"><?php echo $created_on; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Created By</th>
                <td scope="col"><?php echo $createdby[$details[0]->created_by]; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Updated Date</th>
                <td scope="col"><?php echo $updated_on; ?></td>
            </tr>
            <tr>
                <th scope="col" width="30%">Updated By</th>
                <td scope="col"><?php echo $updated_by; ?></td>
            </tr>

          </table>
        </div>
        <div class="col-md-2"></div>
        <!-- /.col -->
      </div>


      </br>
      </br>
  </section>

  <style type="text/css">
    .photo {
      height: 150px;
      width: 150px;
      border: 2px solid #ececec;
      border-radius: 70px;
    }

    .heroname {
      color: #dc3545;
      font-size: 25px;
    }
  </style>















	</div>
<?php include ADMIN_INCLUDES_PATH . "footer.php"?>