<?php 

include_once "includes/header.php"; 
require_once "../engine/dbh.inc.php";
$mess=$_GET["mess"] ?? null;

$statement=$pdo->prepare("SELECT * FROM vendor WHERE location=:id");
$statement->bindValue(":id",$_GET["id"]);
$statement->execute();
$vendors = $statement->fetchAll(PDO::FETCH_ASSOC);

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
                        <h1 class="mt-4">Vendors</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Below is a list of vendors</li>
                        </ol>          
                      
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
                                            <th>Mobile</th>
                                            <th>E-mail</th>
                                            <th>Action</th>
                                        </tr>
                                           
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>E-mail</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($vendors as $i=>$vendor):{ ?>
                                        <tr>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $vendor["vendor_name"]?></td>
                                            <td><?php echo $vendor["vendor_mobile_no"]?></td>
                                            <td><?php echo $vendor["vendor_email"]?></td>
                                            <td>
                                            <a href="vendor_edit.php?id=<?php echo $vendor["vendor_id"]?>&pid=<?php echo $_GET["id"]?>" class="btn btn-primary">Edit</a> 
                                            <a href="vendor_del.php?id=<?php echo $vendor["vendor_id"]?>&pid=<?php echo $_GET["id"]?>" class="btn btn-danger">Delete</a> 
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