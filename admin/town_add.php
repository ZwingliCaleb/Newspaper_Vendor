<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$cid = $_GET["id"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST["name"];
    $description = $_POST["desc"];
    $statement=$pdo->prepare("INSERT INTO town(Town_name,Town_desc,Town_county_id) VALUES(:name,:desc,:cid)");
    $statement->bindValue(":name",$title);
    $statement->bindValue(":desc",$description);
    $statement->bindValue(":cid",$cid);
    try{
        $statement->execute();
        header("Location: town.php?mess=added&id=$cid");
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
                                        <label class="form-label">Town Name</label>
                                        <input name="name" type="text" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea rows="6" name="desc" style="resize:none; " type="text" class="form-control" id="" value="" required></textarea>
                                    </div>
                                    
                                    <div class="d-grid gap-2 col-10 mx-auto">
                                        <button class="btn btn-success" type="submit">Add</button>
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