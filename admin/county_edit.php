<?php 

include_once "includes/header.php"; 
require_once "../engine/dbh.inc.php";
$mess=$_GET["mess"] ?? null;
$id = $_GET["cid"];
$pid= $_GET["pid"];
$statement = $pdo->prepare("SELECT * FROM county WHERE County_id=:id");
$statement->bindValue(":id",$id);
$statement->execute();
$country = $statement->fetch(PDO::FETCH_ASSOC);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $statement = $pdo->prepare("UPDATE county SET County_name=:name,County_desc=:desc WHERE County_id=:id");
    $statement->bindValue(":name",$name);
    $statement->bindValue(":desc",$desc);
    $statement->bindValue(":id",$id);
    $statement->execute();
    header("Location: county.php?mess=updated&id=$pid");

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
                                <h3 class="mb-3 text-center form-text">Edit county <br> <span class="fas fa-paper fa-2x"></span></h3>
                                
                                <form enctype= multipart/form-data name="myform" action= "" class="row g-3"  method="POST">
                                    <hr class="border-5 border-top border-secondary">
                                    
                                    <div class="col-md-12">
                                        <label class="form-label">County Name</label>
                                        <input name="name" type="text" class="form-control" value="<?php echo $country["County_name"]?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea rows="6" name="desc" style="resize:none; " type="text" class="form-control" id="" required><?php echo $country["County_desc"]?></textarea>
                                    </div>
                                    
                                    <div class="d-grid gap-2 col-10 mx-auto">
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