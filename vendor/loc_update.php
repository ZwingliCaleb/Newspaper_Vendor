<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$cid = $_GET["id"] ?? "";

$statement = $pdo->prepare("SELECT vendor.location FROM vendor WHERE vendor_id=:id");
$statement->bindValue("id",$_SESSION["vid"]);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
unset($statement);

$statement = $pdo->prepare("SELECT country.Country_name,county.County_name,town.Town_name,area.Area_name FROM country INNER JOIN county ON country.Country_id =county.County_Country_id INNER JOIN town ON town.Town_county_id=county.County_id INNER JOIN area ON town.Town_id=area.Area_town_id WHERE area.Area_id=:lid");
$statement->bindValue(":lid",$result["location"]);
$statement->execute();
$area = $statement->fetch(PDO::FETCH_ASSOC);

unset($statement);
$statement = $pdo->prepare("SELECT * FROM area");
$statement->execute();
$locations = $statement->fetchAll(PDO::FETCH_ASSOC);
unset($statement);


if($_SERVER["REQUEST_METHOD"]=="POST"){
   $area = $_POST["area"];
   $statement = $pdo->prepare("UPDATE vendor SET location=:location WHERE vendor_id=:id");
   $statement->bindValue(":location",$area);
   $statement->bindValue(":id",$_SESSION["vid"]);
   
    try{
        $statement->execute();
        header("Refresh:0");
    }
    catch (PDOException $exception) {
        $error = $exception->getMessage();
        exit;
    }
}

?>

<body class="sb-nav-fixed">
       <?php include_once "includes/top.php"?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
       <?php include_once "includes/side.php";?>
            <div id="layoutSidenav_content">
                <main>
    <div class="container px-4">
    <div class="container px-4">             
        <section class="intro py-3">
                <div class="bg-image-vertical h-100" style="background-color: #FFF">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="card-body p-2">
                                <h3 class="mb-3 text-center form-text">Add New Country <br> <span class="fas fa-paper fa-2x"></span></h3>
                                
                                <form enctype= multipart/form-data name="myform" action= "" class="row g-3"  method="POST">
                                    <hr class="border-5 border-top border-secondary">
                                    
                                    <div class="col-md-12">
                                        <label class="form-label">Country</label>
                                        <input disabled type="text" class="form-control" value="<?php echo $area["Country_name"] ?? ""?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">County</label>
                                        <input disabled type="text" class="form-control" value="<?php echo $area["County_name"] ??""?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Town</label>
                                        <input disabled type="text" class="form-control" value="<?php echo $area["Town_name"] ??"" ?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="area" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $area["Area_name"] ?? ""?></option>
                                        <?php foreach($locations as $location):{?>
                                        <option value="<?php echo $location["Area_id"]?>"><?php echo $location["Area_name"]?></option>
                                    <?php }endforeach;?>
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <button class="btn btn-warning" type="submit">Update</button>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                            </div>
                                </section>
                                </div>
                                    </main>
                                    <?php include_once "includes/footer.php"?>