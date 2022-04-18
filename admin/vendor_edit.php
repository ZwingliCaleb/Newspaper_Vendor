<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$pid = $_GET["id"] ?? "";

$statement=$pdo->prepare("SELECT * FROM vendor WHERE vendor_id=:id");
$statement->bindValue(":id",$pid);
$statement->execute();
$vendor = $statement->fetch(PDO::FETCH_ASSOC);

$name = $vendor["vendor_name"];
$mobile= $vendor["vendor_mobile_no"];
$email = $vendor["vendor_email"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $statement = $pdo->prepare("UPDATE vendor SET vendor_name=:name,vendor_mobile_no=:phone,vendor_email=:email WHERE vendor_id=:id");
    $statement->bindValue(":name",$name);
    $statement->bindValue(":phone",$phone);
    $statement->bindValue(":email",$email);
    $statement->bindValue(":id",$_GET["id"]);
    $pid = $_GET["pid"];
    try{
        $statement->execute();
        header("Location: vendors.php?mess=updated&id=$pid");
    }
    catch (PDOException $exception) {
        $error = $exception->getMessage();
        echo $error;
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
                                <h3 class="mb-3 text-center form-text">Add New Newspaper <br> <span class="fas fa-paper fa-2x"></span></h3>
                                
                                <form enctype= multipart/form-data name="myform" action= "" class="row g-3"  method="POST">
                                    <hr class="border-5 border-top border-secondary">
                                    <div class="col-md-6">
                                        <label for="validationServer01" class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" id="fname" value="<?php echo $name?>" required>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label for="validationServer01" class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control" id="fname" value="<?php echo $email?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationServer01" class="form-label">Phone</label>
                                        <input name="phone" type="text" class="form-control" id="fname" value="<?php echo $mobile?>" required>
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