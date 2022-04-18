<?php

include_once('engine/dbh.inc.php');
$id = $_GET["id"];
$statement = $pdo->prepare("SELECT area.*,vendor.vendor_email,vendor.vendor_id,vendor.vendor_name,vendor.vendor_mobile_no FROM area INNER JOIN vendor ON vendor.location = area.Area_id WHERE Area_Town_id=:id");
$statement->bindValue(":id",$id);
$statement->execute();
$areas = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <h6 class="m-0 font-weight-bold text-primary">List of Vendors  
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New 
            </button>-->
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <div class="container">
  <h1 class="page-header text-center">Vendors</h1>
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
        <a href="loc_query.php" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Go back</a>
      </div>
      <div class="height10">
      </div>
      <div class="row">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <th>#</th>
            <th>Vendor Name</th>
           <th>Vendor Mobile</th>
           <th>Vendor Email</th>
           <th>Area</th>
           <th>Area description</th>
           <th>Total papers</th>
            <th>Action</th>
          </thead>
          <tbody>      
              <?php foreach($areas as $i=>$area):{?>
                <?php
                  $stmt = $pdo->prepare("SELECT newspapers.*,stock.Stock_balance FROM newspapers INNER JOIN stock ON newspapers.Newspaper_id=stock.Stock_newspaper_id WHERE Newspapers_vendor_id=:id");
                  $stmt->bindValue(":id",$area["vendor_id"]);
                  $stmt->execute();
                  $papers = $stmt->fetchAll(PDO::FETCH_ASSOC);


                  ?>
                <tr>
                  <td><?php echo $i+1?></td>
                  <td><?php echo $area["vendor_name"]?></td>
                  <td><?php echo $area["vendor_mobile_no"]?></td>
                  <td><?php echo $area["vendor_email"]?></td>
                  <td><?php echo $area["Area_name"]?></td>
                  <td><?php echo $area["Area_desc"]?></td>
                  <td><?php echo sizeof($papers)?></td>
                  <td><a href='paper_query.php?id=<?php echo $area["vendor_id"]?>&fb=<?php echo $id?>&papers=<?php echo urlencode(serialize($papers))?>' class='btn btn-success btn-sm' >View papers</a></td><td>  
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