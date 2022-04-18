<?php 

include_once "includes/header.php"; 
require_once "../engine/dbh.inc.php";
$mess=$_GET["mess"] ?? null;
$statement=$pdo->prepare("SELECT * FROM newspapers  WHERE newspapers_vendor_id=:id");
$statement->bindValue(":id",$_SESSION["vid"]);
$statement->execute();
$newspapers = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
    <body class="sb-nav-fixed">
       <?php include_once "includes/top.php";?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
       <?php include_once "includes/side.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                  <?php include_once "includes/message.php";?>
                        <h1 class="mt-4">Newspapers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Below is a list of newspapers</li>
                        </ol>
                 
                        <a data-toggle="tooltip" data-placement="top" title="Add new Newspaper" href="paper_add.php" class="btn btn-success my-2 px-5"> <span class="fas fa-plus"></span> </a>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-person-booth"></i>
                               
                            </div>
                            <div class="card-body">
                               
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Headline</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Headline</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($newspapers as $i=>$newspaper):{ ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><img style = "height:100px; width:100px; border-radius:100px;" src="<?php echo $newspaper["newspapers_Image"]?>" alt="" srcset=""></td>
                                            <td><?php echo $newspaper["newspapers_Name"]?></td>
                                            <td><?php echo $newspaper["newspapers_Headline"]?></td>
                                            <td class="col-md-3">
                                            <a href="stock_info.php?id=<?php echo $newspaper["Newspaper_id"]?>" data-toggle="tooltip" data-placement="top" title="Stock information" class="px-4 btn btn-outline-primary  fw-bolder" class=""><i class="fas fa-eye"></i></a>
                                            <a href="paper_edit.php?id=<?php echo $newspaper["Newspaper_id"]?>" data-toggle="tooltip" data-placement="top" title="Edit paper" class="px-4 btn btn-outline-success  fw-bolder" class=""><i class="fas fa-edit"></i></a>
                                            <a href="paper_del.php?id=<?php echo $newspaper["Newspaper_id"]?>" data-toggle="tooltip" data-placement="top" title="Delete record" class="px-4 btn btn-outline-danger  fw-bolder" class=""><i class="fas fa-trash"></i></a>                                           
                                        </td>
                                        </tr>
                                       <?php } endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once "../admin/includes/footer.php"?>