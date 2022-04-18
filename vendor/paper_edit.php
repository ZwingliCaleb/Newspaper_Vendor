<?php 
include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$pid = $_GET["id"];
$statement=$pdo->prepare("SELECT * FROM newspapers WHERE Newspaper_id=:id");
$statement->bindValue(":id",$pid);
$statement->execute();
$paper = $statement->fetch(PDO::FETCH_ASSOC);
$name = $paper["newspapers_Name"];
$headline = $paper["newspapers_Headline"];
$current = $paper["newspapers_Image"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $image = $_FILES["img"];
    $headline = $_POST["headline"];
    if(!is_dir('images')){
        mkdir('images');
    }
    $image_path=$current;
    if($image && $image['tmp_name']){
        if($current){
            unlink($paper["newspapers_Image"]);
        }
        $image_path = 'images/'. bin2hex(random_bytes(10)).'/'.$image['name'];
        mkdir(dirname($image_path));
        move_uploaded_file($image['tmp_name'],$image_path);
    }
    $statement = $pdo->prepare('UPDATE newspapers SET newspapers_Image=:img,newspapers_Name=:name,newspapers_Headline=:headline WHERE Newspaper_id=:id');
    $statement->bindValue(":img",$image_path);
    $statement->bindValue(":name",$name);
    $statement->bindValue(":headline",$headline);
    $statement->bindValue(":id",$pid);
    try{
        $statement->execute();
        header("Location: newspapers.php?mess=updated");
    }
    catch (PDOException $exception) {
        $error = $exception->getMessage();
        echo "error";
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
                                        <label for="validationServer01" class="form-label">Newspaper Name</label>
                                        <input name="name" type="text" class="form-control" id="fname" value="<?php echo $name?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Image</label>
                                        <input name="img" type="file" class="form-control" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Headline</label>
                                        <textarea rows="6" name="headline" style="resize:none; " type="text" class="form-control" id="" value="" required><?php echo $headline?></textarea>
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