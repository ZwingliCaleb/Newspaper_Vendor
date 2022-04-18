<?php 

include_once "includes/header.php"; 
require_once "../engine/dbh.inc.php";
$mess=$_GET["mess"] ?? null;

$statement=$pdo->prepare("SELECT * FROM town WHERE Town_county_id=:id");
$statement->bindValue(":id",$_GET["id"]);
$statement->execute();
$towns = $statement->fetchAll(PDO::FETCH_ASSOC);

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
                        <h1 class="mt-4">Towns</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Below is a list of Towns</li>
                        </ol>          
                        <a data-toggle="tooltip" data-placement="top" title="Add new Town" href="town_add.php?id=<?php echo $_GET["id"]?>" class="btn btn-success my-2 px-5"> <span class="fas fa-plus"></span> </a>              
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
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($towns as $i=>$town):{ ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $town["Town_name"]?></td>
                                            <td><?php echo $town["Town_desc"]?></td>
                                            <td class="col-md-2">
                                            <a href="area.php?id=<?php echo $town["Town_id"]?>" data-toggle="tooltip" data-placement="top" title="Edit paper" class="px-4 btn btn-outline-success  fw-bolder" class=""><i class="fas fa-eye"></i></a>
                                            <a href="town_edit.php?tid=<?php echo $town["Town_id"]?>&pid=<?php echo $_GET['id']?>" data-toggle="tooltip" data-placement="top" title="Edit paper" class="px-4 btn btn-outline-warning  fw-bolder" class=""><i class="fas fa-edit"></i></a>
                                       
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