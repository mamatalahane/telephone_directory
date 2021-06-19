


<?php include ADMIN_INCLUDES_PATH . "header.php"?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Graphical Representation of Contact Views</h1>
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



      <?php

          $data=array();

          if(count($details) > 0) {
              $i=1;
              foreach ($details as $key => $value) {
                    //echo '<pre>'; print_r($value); 
                    $view = (int)$value->view;
                    $name = $value->name;
                    $data[] = array('x'=>$i,'y'=>$view,'label'=>$name);

                    $i++;
              }
          }

          //print_r($data);

          $graphData = json_encode($data);

          $graphData = str_replace('"x"', 'x', $graphData);

          $graphData = str_replace('"y"', 'y', $graphData);

          $graphData = str_replace('"label"', 'label', $graphData);

          //echo $graphData;

      ?>

    <section class="content" style="background-color: #fff;"> <br> <br>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
          <div class="col-md-1"></div>
        </div>
          
          <br> <br>
    </section>

  </div>
<?php include ADMIN_INCLUDES_PATH . "footer.php"?>


    <script type="text/javascript">
        window.onload = function () {
          var chart = new CanvasJS.Chart("chartContainer",
          {
            title:{
              text: "View Contact"
            },
            data: [
              {
                dataPoints: <?php echo $graphData; ?>
              }
            ]
          });

          chart.render();
        }
    </script>




