<?php 

include_once "includes/header.php"; 
require_once "../engine/dbh.inc.php";
$mess=$_GET["mess"] ?? null;

$statement=$pdo->prepare("SELECT * FROM area WHERE Area_town_id=:id");
$statement->bindValue(":id",$_GET["id"]);
$statement->execute();
$areas = $statement->fetchAll(PDO::FETCH_ASSOC);

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
                        <h1 class="mt-4">Areas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Below is a list of Areas</li>
                        </ol>          
                        <a data-toggle="tooltip" data-placement="top" title="Add new Area" href=area_add.php?id=<?php echo $_GET["id"]?> class="btn btn-success my-2 px-5"> <span class="fas fa-plus"></span> </a>              
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-person-booth"></i>
                               
                            </div>
                            <div class="card-body">
                               
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                           
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($areas as $i=>$area):{ ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $area["Area_name"]?></td>
                                            <td><?php echo $area["Area_desc"]?></td>
                                            <td>
                                            <a href="vendors.php?id=<?php echo $area["Area_id"]?>"class="px-4 btn btn-primary">View vendors</a> 
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