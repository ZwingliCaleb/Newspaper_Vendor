<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include_once('engine/dbh.inc.php');
    $location = $_POST["location"];
    $location.CASE_LOWER;
    $statement = $pdo->prepare("SELECT County_id FROM county WHERE County_name LIKE :name");
    $statement->bindValue(":name",$location);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $id=$result['County_id'];
    header("Location: town_query.php?id=$id");
}

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


  
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Please Input County to query</h1>
                 <a href="index.php">Back</a>
              </div>
                <form class="user" action="" method="POST" style="background-color:#f1f1f1">

                    <div class="form-group">
                      <label>County</label>
                    <input type="text" name="location" class="form-control form-control-user" placeholder="County">
                    </div>            
                    <button type="submit"  class="btn btn-primary btn-user btn-block"> Submit </button>
                    <hr>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>

<script src="js/main.js"></script>
  
</body>
</html>
