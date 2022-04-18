<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$nid = $_GET["id"] ?? "";

$statement = $pdo->prepare("SELECT * FROM stock WHERE Stock_newspaper_id=:id");
$statement->bindValue(":id",$nid);
$statement->execute();
$stock = $statement->fetch(PDO::FETCH_ASSOC);
unset($statement);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $amount = $_POST["amount"];
    $sold = $_POST["sold"];
    $balance = $_POST["balance"];
    $statement = $pdo->prepare("UPDATE stock SET Stock_amount=:amount,Stock_sold=:sold,Stock_balance=:balance WHERE Stock_newspaper_id=:id");
    $statement->bindValue(":amount",$amount);
    $statement->bindValue(":sold",$sold);
    $statement->bindValue(":balance",$balance);
    $statement->bindValue(":id",$_GET["id"]);
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
                                        <label class="form-label">Date stocked</label>
                                        <input disabled type="text" class="form-control" value="<?php echo $stock["Stock_date"] ?? ""?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Stock amount</label>
                                        <input  name="amount" type="text" class="form-control" value="<?php echo $stock["Stock_amount"] ??""?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Stock sold</label>
                                        <input name="sold" type="text" class="form-control" value="<?php echo $stock["Stock_sold"] ??"" ?>" placeholder="Update location" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Stock balance</label>
                                        <input name="balance" type="text" class="form-control" value="<?php echo $stock["Stock_balance"] ??"" ?>" placeholder="Update location" required>
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