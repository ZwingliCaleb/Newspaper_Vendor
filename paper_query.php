<?php

include_once('engine/dbh.inc.php');
$serialized = $_GET["papers"];
$papers = unserialize($serialized);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Zwart NewsHub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<style>

    .my_img{
        width: 100px;
        height: 120px;
    }
</style>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Areas  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List of Newspapers
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New 
            </button>-->
    </h6>
  
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <div class="container">
  <h1 class="page-header text-center">Total newpaper(s) <?php echo sizeof($papers)?></h1>
  <div class="row">
    <div class="col-sm-12 col-md-offset">
      <div class="row">
      <?php
        if(isset($_SESSION['error'])){
          echo
          "
          <div class='alert alert-danger text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['error']."
          </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo
          "
          <div class='alert alert-success text-center'>
            <button class='close'>&times;</button>
            ".$_SESSION['success']."
          </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      </div>
    <div class="row">
        <a href="area_query.php?id=<?php echo $_GET["fb"]?>" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Go back</a>
      </div>
      <div class="height10">
      </div>
      <div class="row">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Headline</th>
            <th>Stock balace</th>
            
          </thead>
          <tbody>      
              <?php foreach($papers as $i=>$paper):{?>
                <tr>
                  <td><?php echo $i+1?></td>
                  <td><img class="my_img" src="<?php echo 'vendor/'.$paper["newspapers_Image"]?>"></td>
                  <td><?php echo $paper["newspapers_Name"]?></td>
                  <td><?php echo $paper["newspapers_Headline"]?></td>
                  <td><?php echo $paper["Stock_balance"]?></td>
               
                </tr>
                <?php }endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
//include('includes/scripts.php');
//include('includes/footer.php');
?>

</div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTable.bootstrap.min.js"></script>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="dist/js/validation-data.js"></script>
    <script>
$(document).ready(function(){
    //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
        $('.alert').hide();
    })
});
</script>
</script>