<?php include ADMIN_INCLUDES_PATH . "header.php"?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Contact List</h1>
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

    <br><br>
      <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10">

          <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed" id="usertbl">  
                
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Profile</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Landline</th>
                  <th>Views</th>
                  <th>Created On</th>
                  <th>Updated On</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                  foreach ($list as $key => $arr) {
                    $photo = !empty($arr->photo) ? base_url().$arr->photo : '';
                ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td>
                    <center><div class="photo" style="background-image: url('<?php echo $photo; ?>'); background-size: cover;"></div></center>
                  </td>
                  <td><?php echo !empty($arr->mname) ? $arr->fname.' '.$arr->mname.' '.$arr->lname : $arr->fname.' '.$arr->lname; ?></td>
                  <td><?php echo $arr->email; ?></td>
                  <td><?php echo $arr->mobile; ?></td>
                  <td><?php echo $arr->landline; ?></td>
                  <td><span class="badge bg-red"><?php echo $arr->view; ?></span></td>
                  <td><?php echo date('d M Y h:i A', strtotime($arr->created_on)); ?></td>
                  <td><?php echo ($arr->updated_on != '0000-00-00 00:00:00') ? date('d M Y h:i A', strtotime($arr->updated_on)) : ''; ?></td>
                  <td>
                    <?php $edit = base_url().'index.php/contact/add/'.$arr->id; ?>
                    <a href="<?php echo $edit; ?>" class="btn btn-success btn-sm">Edit</a>
                    <?php $view = base_url().'index.php/contact/view/'.$arr->id; ?>
                    <a href="<?php echo $view; ?>" class="btn btn-primary btn-sm">View</a>
                  </td>
                </tr>
                <?php

                  }

                ?>
            
              </tbody>


              <tfoot>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Profile Photo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Landline</th>
                  <th>Views</th>
                  <th>Created On</th>
                  <th>Updated On</th>
                  <th>Action</th>
                </tr>
              </tfoot>

            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-1"></div>
        <!-- /.col -->
        
        </div>
        <!-- /.box-body -->

<br><br>
    </section>


	</div>

<?php include ADMIN_INCLUDES_PATH . "footer.php"?>

<style type="text/css">
    .photo {
      height: 50px;
      width: 50px;
      border: 2px solid #ececec;
      border-radius: 70px;
    }

  </style>