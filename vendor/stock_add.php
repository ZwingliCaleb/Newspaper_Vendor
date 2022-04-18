<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $sold =$_POST["sold"];
    $balance = $_POST["balance"];
    $statement = $pdo->prepare("INSERT INTO stock(Stock_newspaper_id,Stock_date,Stock_amount,Stock_sold,Stock_balance,Stock_vendor_id) VALUES(:pid,:date,:amount,:sold,:balance,:vid)");
    $statement->bindValue(":pid",$_GET["id"]);
    $statement->bindValue(":date",$date);
    $statement->bindValue(":amount",$amount);
    $statement->bindValue(":sold",$sold);
    $statement->bindValue(":balance",$balance);
    $statement->bindValue(":vid",$_SESSION["vid"]);

    try{
        $statement->execute();
        header("Location: newspapers.php?mess=added");
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
                                <h3 class="mb-3 text-center form-text">Add stock information<br> <span class="fas fa-paper fa-2x"></span></h3>
                                
                                <form enctype= multipart/form-data name="myform" action= "" class="row g-3"  method="POST">
                                    <hr class="border-5 border-top border-secondary">
                                    <div class="col-md-6">
                                        <label class="form-label">Stock Date</label>
                                        <input name="date" type="date" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationServer01" class="form-label">Stock Amount</label>
                                        <input name="amount" type="text" class="form-control" id="fname" value="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Stock sold</label>
                                        <input name="sold" type="text" class="form-control" value="" required>
                                    </div>     
                                    <div class="col-md-6">
                                        <label class="form-label">Stock balance</label>
                                        <input name="balance" type="text" class="form-control" value="" required>
                                    </div>                                 
                                    
                                    <div class="d-grid gap-2 col-10 mx-auto">
                                        <button class="btn btn-success" type="submit">Stock</button>
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